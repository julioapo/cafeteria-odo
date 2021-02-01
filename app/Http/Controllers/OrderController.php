<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\DetailOrder;
use Illuminate\Support\Facades\DB;
use Auth;

use Cart;

class OrderController extends Controller
{
    public function index(){

        $products = Product::query()
            ->select('id_product','name_product','amount_product','photo_file','commentary')
            ->get();

        return view('order.index',compact('products'));

    }

    public function generate(){        
        return view('order.generate');
    }

    public function process_order(Request $request)
    {
        if(Cart::getContent()->count()>0){
            $change_temp = $request->change;
            if($change_temp){
                $change_temp = str_replace('.','',$change_temp);
                $change_temp = str_replace(',','.',$change_temp);
            }else{
                $change_temp = 0;
            }
            $time = date('Y-m-d');
            $time = $time.' '.$request->time_delivery;            
            $order = new Order();
            $order->customer_id = Auth::user()->id_user;
            $order->address = $request->addres;
            $order->amount_order = Cart::getSubTotal();
            $order->deliver_date = $time;
            $order->way_to_pay = $request->way_to_pay;
            $order->change = $change_temp;
            $order->status = '0';
            $order->observation_order = $request->observation;
            $order->save();
            foreach (Cart::getContent() as $d):
                $detail_order = new DetailOrder();
                $detail_order->order_id = $order->id_order;
                $detail_order->product_id = $d->id;
                $detail_order->amount_product = $d->price;
                $detail_order->quantity = $d->quantity;
                $detail_order->total_amount = ($d->price*$d->quantity);
                $detail_order->observation_product = $d->attributes->co.' '.$d->attributes->details;
                $detail_order->save();
            endforeach;
            Cart::clear();            
            return redirect('/');
        }else{
            return redirect('home');
        }        
    }
    
    public function order(){
        
        //$product = Order::with('companions')->where('id_product','=',$id)->get();

        $orders = DB::table('orders')
            ->join('detail_orders', 'orders.id_order', '=', 'detail_orders.order_id')
            ->join('products', 'detail_orders.product_id', '=', 'products.id_product')
            ->select('orders.*', 'detail_orders.*', 'products.name_product')
            ->where('orders.customer_id', '=', Auth::user()->id_user)
            ->groupBy('detail_orders.product_id','orders.id_order','detail_orders.id','products.name_product')            
            ->get();        

        return view('order.order',compact(['orders']));
    }
}