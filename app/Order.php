<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_number', 'product_id', 'quantity', 'total_price'
    ];

    public function payment()
    {
        return $this->hasOne( Payment::class );
    }

    public function product()
    {
        return $this->belongsTo( Product::class );
    }
}
