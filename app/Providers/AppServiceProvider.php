<?php

namespace CodeShopping\Providers;

use Illuminate\Support\ServiceProvider;
use CodeShopping\Models\ProductOutput;
use CodeShopping\Models\ProductInput;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Schema::defaultStringLength(191);
        
        ProductInput::created(function($input){
            $product = $input->product;
            $product->stock += $input->amount;
            $product->save();        
        });

        //ProductOutput::created(function($output){
        //    $product = $output->product;
        //    $product->stock -= $output->amount;
        //    if($product->stock < 0){
        //        throw new \Exception("Estoque de Produto {$product->name} nao pode ser negativo");
        //    }
        //    $product->save();
        //});
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
