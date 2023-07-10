<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer_Logs extends Model
{
    use HasFactory;

    protected $table = "tbl_customers_logs";
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'address',
        'city',
        'country',
        'cnic',
        'channel',
        'date',
        'customer_type',
        'dealership',
        'created_by'
    ];
    public $timestamps = false;
}
