<?php

namespace App\Http\ViewComposers;

use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class OrderCartComposer
{
    public function compose(View $view)
    {        
        if(Auth::check()){
            
            $ordenes_activas = DB::table('orders')->where('customer_id',Auth::user()->id_user)->where('status',0)->count();
            
        }else{
            $ordenes_activas = 0;
        }
        
        $view->with(['order_active'=>$ordenes_activas]);
    }
}