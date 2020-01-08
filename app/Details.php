<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Details extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference_code', 'full_name', 'address', 'phone', 'email',
        'date_receipt', 'time_receipt'
    ];
}
