<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Keywords extends Model
{
    protected $fillable = ['res_id' , 'name'];
    public $timestamps = false;

    public function Restaurant() {
        return $this->belongsToMany(Restaurant::class , 'keyword_restaurant'  , 'keyword_id' , 'restaurant_id');
    }
}
