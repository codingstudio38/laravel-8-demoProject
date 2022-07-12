<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class register extends Model
{
    use HasFactory;
    public $connection = "mysql";
    public $table = "admin_table";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'password'
    ]; 
    // protected function name():Attribute 
    // {
    //     // return new Attribute(
            // get: fn($value) => strtoupper($value),
            // set: fn($value) => [
            //     'name'=>$value,
            //     'slug'=>Str::slug($value),
            // ]lower
        // );
    // }

}
