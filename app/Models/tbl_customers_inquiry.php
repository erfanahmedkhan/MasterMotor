<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_customers_inquiry extends Model
{
     use HasFactory;
    protected $table = 'tbl_customers_inquiries';
    protected $fillable = [
         'inquiry_details','inquiry_type','inquiry_number','dealership','start_date','end_date','source','customer_type','existing_vehicle','interested_vehicle','city','status','status_remarks','other_reason','next_follow_up','remarks','notes','customer_id','created_by'
        ];
    public $timestamps = false;
}
