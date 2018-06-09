<?php

use Illuminate\Database\Seeder;
use CodeShopping\Models\ProductOutput;

class ProductOutputTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = \CodeShopping\Models\Product::all();
        factory(ProductOutput::class,10)
            ->make()
            ->each(function($output) use($products){
                $product=$products->random();
                $output->product_id = $product->id;
                $output->save();

            });
    }
}
