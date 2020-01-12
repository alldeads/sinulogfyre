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

    public static function getSuccessfulPayments()
    {
        $payments = auth()->user()->payments()->where('status', 'paid')->get();

        return $payments;
    }

    public static function getUnsuccessfulPayments()
    {
        $payments = auth()->user()->payments()->where('status', '!=', 'paid')->get();

        return $payments;
    }

    public static function availableCash()
    {
        $payments = Payment::getSuccessfulPayments();
        $total    = 0;

        foreach ( $payments as $payment ) {
            
            if ( $payment->order->product->id == 1 ) {

                $total += ($payment->order->quantity * 1500) * .10;
            } else {
                $total += ($payment->order->quantity * 900) * .10;
            }
        }

        return $total;
    }

    public static function pendingCash()
    {
        $payments = Payment::getUnsuccessfulPayments();
        $total    = 0;

        foreach ( $payments as $payment ) {
            
            if ( $payment->order->product->id == 1 ) {

                $total += ($payment->order->quantity * 1500) * .10;
            } else {
                $total += ($payment->order->quantity * 900) * .10;
            }
        }

        return $total;
    }

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

    public function serials()
    {
        return $this->hasMany( Serial::class );
    }
}
