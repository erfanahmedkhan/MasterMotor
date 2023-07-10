<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complaint_Follow_Up extends Model
{
    use HasFactory;
    protected $table = "tbl_follow_up";
    protected $fillable = [
        'date',
        'source',
        'agent',
        'complaint_status',
        'notes',
        'complain_id',
        'complain_number'
    ];
    public $timestamps = false;
}
