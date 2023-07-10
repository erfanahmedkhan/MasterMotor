<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_users extends Model
{
    use HasFactory;
    protected $table = "tbl_users";
    protected $fillable = ['name', 'email', 'password', 'phone', 'role', 'status', 'username'];
    public $timestamps = false;
}
