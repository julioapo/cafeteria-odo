<?php

use App\Http\Controllers\ContactusController;
use Illuminate\Routing\Route as RoutingRoute;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Routing\Router;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\SendOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('order', [OrderController::class, 'index'])->name('order.index');

Route::post('order/process_order', [OrderController::class, 'process_order'])->name('order.process_order')->middleware('auth');

Route::get('order/generate', [OrderController::class, 'generate'])->name('order.generate');

Route::get('order/order', [OrderController::class, 'order'])->name('order.order')->middleware('auth');

/*
* ACA CONTROLAMOS ACCIONES DEL CARRITO DE PEDIDO
*/
Route::get('shoppingcart', [ShoppingCartController::class, 'showproduct'])->name('shoppingcart.showproduct');
Route::get('shoppingcart/{id}/qu/{qu}/de/{de}/{co?}', [ShoppingCartController::class, 'addproduct'])->name('shoppingcart.addproduct');
Route::get('shoppingcart/delproduct/{id}', [ShoppingCartController::class, 'delproduct'])->name('shoppingcart.delproduct');
Route::get('shoppingcart/emptyproduct', [ShoppingCartController::class, 'emptyproduct'])->name('shoppingcart.emptyproduct');
/*
* HASTA ACA CONTROLAMOS ACCIONES DEL CARRITO DE PEDIDO
*/
Route::get('customers', function () {
    //return view('welcome');
    return 'Bienvenido a la pagina de Clientes';
});

Route::get('customers/create', function () {
    return 'Aqui prodriamos crear un Cliente';
});

Route::get('customers/{customer}', function ($customer) {    
    return "Bienvenido a la pagina del cliente: $customer";
});

Route::get('products/showProOrd/{id}', [ProductController::class, 'showProOrd'])->name('products.showProOrd');

Route::resource('products', ProductController::class);

Route::view('us_page', 'welcome')->name('us');

Route::get('contactus', [ContactusController::class, 'index'])->name('contactus.index');

Route::post('contactus', [ContactusController::class, 'store'])->name('contactus.store');
