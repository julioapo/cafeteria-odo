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

//Route::get('/', HomeController::class)->name('home');

/*Route::get('/', HomeController::class)->name('home');*/

//Route::resource('products', ProductController::class);

/* Route::resource('preorder', PreOrderController::class)->except(['edit','destroy']); */

Route::get('order', [OrderController::class, 'index'])->name('order.index');

Route::get('sendorder', [SendOrderController::class, 'index'])->name('sendorder.index');

/* Route::get('order/generate', [OrderController::class, 'generate'])->name('order.generate');
 */
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

/* Route::get('customers/{customer}/{type?}', function ($customer, $type = null) {

    if($type){
        return "Se visualizan los productos: $customer de la categoria $type";
    }else{
        return "Bienvenido a la pagina del cliente: $customer";
    }
    
}); */

// ESTAS LINEAS DE ABAJO SON PARA LLAMAR RUTAS DE ACCIONES EN UNA APLICACION PERO NO SON LAS OPTIMAS
/* Route::get('products', [ProductController::class,'index'])->name('products.index');

Route::get('products/create', [ProductController::class,'create'])->name('products.create');

Route::post('products', [ProductController::class,'store'])->name('products.store');

Route::get('products/{product}', [ProductController::class,'show'])->name('products.show');

Route::get('products/{product}/edit', [ProductController::class,'edit'])->name('products.edit');

Route::put('products/{product}', [ProductController::class,'update'])->name('products.update');

Route::delete('products/{product}', [ProductController::class,'destroy'])->name('products.destroy'); */

//LINEAS OPTIMAS PÀRA CREAR RUTAS DE ACCION EN UNA APLICACION

/* ESTA LINEA ES PARA VER COMO PUEDO CAMBIAR LOS NOMBRES DE LAS URL Y LOS PARAMETROS
DEBES VER EN "PARAMETERS" Y EN "NAMES" */

//Route::resource('productos', ProductController::class)->parameters(['productos' => 'product'])->names('products');

Route::get('products/showProOrd/{id}', [ProductController::class, 'showProOrd'])->name('products.showProOrd');

Route::resource('products', ProductController::class);

Route::view('us_page', 'welcome')->name('us');

Route::get('contactus', [ContactusController::class, 'index'])->name('contactus.index');

Route::post('contactus', [ContactusController::class, 'store'])->name('contactus.store');
