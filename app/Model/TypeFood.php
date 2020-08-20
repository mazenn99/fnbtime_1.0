<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class TypeFood extends Model
{
    protected $table = 'type_food';
    protected $fillable = ['id' , 'name'];
}
