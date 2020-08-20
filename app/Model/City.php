<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $fillable = ['id' , 'name' , 'country_id'];
    protected $hidden = ['updated_at' , 'created_at'];

    public function restaurant() {
        return $this->hasOne(Restaurant::class , 'city_id');
    }

    public function country() {
        return $this->hasOne(Country::class , 'country_id');
    }
}
