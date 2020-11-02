<?php

namespace App;

use App\Model\City;
use App\Model\Country;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'phone', 'interested' , 'country_id', 'city_id', 'subscription'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'interested' => 'array'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    /*
     * get collection of data for user
     */

    public function scopeSelection($query)
    {
        return $query->select(['id', 'email', 'password', 'name', 'phone', 'country_id', 'city_id' , 'email_verified_at' , 'subscription', 'created_at']);
    }

    /*
     * get Status of User subscription
     */
    public function getSubscription()
    {
        return $this->subscription == 1 ? "<button class='btn btn-success' disabled>subscribed</button>" : "<button class='btn btn-danger' disabled>not subscribed</button>";
    }

    public function getVerified()
    {
        return is_null($this->email_verified_at) ?
            "<button class='btn btn-danger' disabled>not verified</button>" :
            "<button class='btn btn-success' disabled>verified</button>";
    }
    
    public function usersRestaurant() {
        return $this->belongsToMany(\App\Model\Restaurant::class , 'users_restaurants' , 'users_id' , 'res_id');
    }

}
