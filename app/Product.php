<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function get_single_product( $product_name )
 	{
 		$product = Product::where( 'name', $product_name )->get();

 		if ( count( $product->toArray() ) == 0 ) {

 			return false;
 		}

 		return $product[0];
 	}

 	public function orders()
    {
        return $this->hasMany( Order::class );
    }

    public function serials()
    {
        return $this->hasMany( Serial::class );
    }

    public function variations()
    {
        return $this->hasMany( Variation::class );
    }
}
