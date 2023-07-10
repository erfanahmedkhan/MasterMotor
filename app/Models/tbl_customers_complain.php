<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_customers_complain extends Model
{
    use HasFactory;
    protected $table = "tbl_customers_complains";
    protected $fillable = [ 'voc','dealership','complaint_type','owner_vehicle','complaint_priority','notes','document','customer_id','created_by' ];
}
