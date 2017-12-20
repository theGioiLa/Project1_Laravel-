<?php

namespace Store\Providers;

use Illuminate\Support\ServiceProvider;
use Store\ProductType;
use Store\Cart;
use Session;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        view()->composer('header', function($view) {
          $loaisp = ProductType::all();
          
          $view->with(['loaisp'=>$loaisp]);

        });
        view()->composer(['header', 'page.checkout'], function ($view) {
            if (Session::has('cart')) {
                $oldCart = Session::get('cart');
                $cart = new Cart($oldCart);
                $view->with([
                    'cart'         => Session::get('cart'), 
                    'product_cart' => $cart->items, 
                    'totalPrice'   => $cart->totalPrice, 
                    'totalQty'     => $cart->totalQty      
                ]);
            }
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
