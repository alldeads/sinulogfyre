<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'method_id', 'user_id', 'details_id', 'order_id', 'status'
    ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    public function order()
    {
        return $this->belongsTo( Order::class );
    }

    public function method()
    {
        return $this->belongsTo( Method::class );
    }

    public function details()
    {
        return $this->belongsTo( Details::class );
    }
}
