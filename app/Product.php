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
}
