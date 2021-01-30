<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Cart;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['order.order'],'App\Http\ViewComposers\OrderCartComposer');

        //esto deberia mostrar el estado del carrito
        View::composer('order.state', function($wiev){
            $wiev->with('shoppingcartCount',Cart::getContent()->count());
        });

        //esto deberia mostrar el estado lo que hay dentro del carrito
        View::composer('order.summary', function($wiev){
            $wiev->with('shoppingcartCount',Cart::getContent()->count());
        });

    }
}
