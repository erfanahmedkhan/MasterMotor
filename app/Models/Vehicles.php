<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicles extends Model
{
    use HasFactory;

    protected $table = "vehicles";
    protected $fillable = [ 'car_company','car_model','car_model_year','date','chases_number','color','customer_id','status' ];
    public $timestamps = false;
}
