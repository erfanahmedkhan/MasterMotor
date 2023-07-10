<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $connection = 'mysql2';
    protected $table = 'blogs';
    protected $fillable = [ 'name','email','mobile' ];
    public $timestamps = false;
}
