<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class myblogregister extends Model
{ 
    use HasFactory;
    public $connection = "mysql_angular12";
    public $table = "myblog_register_tbl";
}
