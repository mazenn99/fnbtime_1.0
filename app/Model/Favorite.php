<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id' , 'res_id'];
    public $timestamps = false;

    public function usersFavorite() {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function restaurant() {
        return $this->belongsTo(Restaurant::class , 'res_id');
    }
}
