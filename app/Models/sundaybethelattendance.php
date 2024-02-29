<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sundaybethelattendance extends Model
{
    use HasFactory;
    protected $primaryKey='id';
    protected $table='sundaybethelattendance';
    protected $fillable=['men','women','children','guests','converts','total','message','minister','date'];
}