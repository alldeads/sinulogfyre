<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serial extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'payment_id', 'number', 'status'
    ];

    public function payment()
    {
        return $this->hasOne( Payment::class );
    }

    public static function update_serial_status( $status, $quantity, $payment )
    {
    	$serials = Serial::where('status', 'available')->take($quantity)->get();
    	$data = [];

    	if ( count( $serials->toArray() ) > 0 ) {

    		foreach ( $serials as $serial ) {
    			
    			$s = Serial::find($serial->id);

    			if ( count( $s->toArray() ) > 0 ) {

    				$s->status     = $status;
    				$s->payment_id = $payment->id;
    				$s->save();

    				$data[] = $s->number;
    			}
    		}
    	}

    	return $data;
    }

    public static function generate_serial_number()
    {
    	// Array of uppercase alphabets from A-Z
        $alphabets = [
            'B','D','U','S','Y',
            'F','H','I','J','W',
            'L','A','P','Q','R',
            'V','C','G','E',
            'X','Z','K','T','M',
            'N',
        ];

        // Array of numbers from zero to nine
        $numbers = [
            '3','6','0','9','4',
            '8','7','1','5','2'
        ];

        $alphanumeric = array_merge( $alphabets, $numbers );

        $first   = $alphanumeric[ rand( 0, count( $alphanumeric ) - 1 ) ];
        $second  = $alphanumeric[ rand( 0, count( $alphanumeric ) - 1 ) ] . '-';
        $third   = $alphabets[ rand( 0, count( $alphabets ) - 1 ) ];
        $fourth  = $numbers[ rand( 0, count( $numbers ) - 1 ) ];
        $fifth   = $alphanumeric[ rand( 0, count( $alphanumeric ) - 1 ) ];
        $sixth   = $alphabets[ rand( 0, count( $alphabets ) - 1 ) ] . '-';
        $seventh = $numbers[ rand( 0, count( $numbers ) - 1 ) ];

        $serial = $first . $second . $third . $fourth . $fifth . $sixth . $seventh;

        return $serial;
    }
}
