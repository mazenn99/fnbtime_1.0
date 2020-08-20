<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = ['id' , 'name' , 'code'];
    protected $hidden = ['created_at' , 'updated_at'];


    /*
     * this relation of country of users
     */
    public function users() {
        return $this->hasOne(User::class , 'country_id');
    }

    ############# Relation of country to restaurant #############
    public function restaurant() {
        return $this->hasMany(Restaurant::class , 'country_id');
    }

    public function city() {
        return $this->hasMany(City::class , 'country_id');
    }
}
