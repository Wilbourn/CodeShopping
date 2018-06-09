<?php

namespace CodeShopping\Models;

use Illuminate\Database\Eloquent\Model;

class ProductOutput extends Model
{
    protected $fillable = ['amount','product_id'];

    public static function boot()
    {   
        parent::boot();

        self::created(function($output){
            $product = $output->product;
            $product->stock -= $output->amount;
            if($product->stock < 0){
                throw new \Exception("Estoque de Produto {$product->name} nao pode ser negativo");
            }
            $product->save();
       });
    }
    
    public function product(){
        return $this->belongsTo(Product::class);
    }

    

}
