<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name' , 'country_id' , 'city_id' , 'type_food' , 'number' , 'manager_email' , 'manager_number' , 'description' , 'menu' , 'map_url' , 'created_at' , 'updated_at'];
    protected $hidden = ['created_at' , 'updated_at'];

    ########## Relation get country of restaurant #############
    public function country() {
        return $this->belongsTo(Country::class , 'country_id');
    }
    ########## Relation get city of restaurant #############
    public function city() {
        return $this->belongsTo(City::class , 'city_id');
    }
    ######### relation of restaurant have apps delivery ########
    public function appsDelivery() {
        return $this->hasOne(AppsDelivery::class , 'res_id');
    }

    public function Booking() {
        return $this->hasOne(Booking::class , 'res_id');
    }

    public function scopeSelection() {
        return $this->select(['name' , 'city_id' , 'country_id' , 'number']);
    }
    
    public function contract() {
        return $this->hasOne(ContractRestaurant::class , 'res_id');
    }
    
    public function usersRestaurant() {
        return $this->belongsToMany(\App\User::class , 'users_restaurants' , 'res_id' , 'users_id');
    }


}
