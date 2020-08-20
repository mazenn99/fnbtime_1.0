<?php

namespace App\Model;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id' , 'res_id' , 'booking_number' , 'name' ,'phone_costumer' , 'person_number' , 'time' , 'date_booking' , 'occasion_date' , 'status'
    ];
    protected $hidden = ['created_at' , 'updated_at'];


    public function Restaurant() {
        return $this->belongsTo(Restaurant::class , 'res_id');
    }

    public function getStatus() {
        switch ($this->status) {
            case 0 : return "<button class='btn btn-warning text-capitalize' disabled>pending</button>";
            break;
            case 1 : return "<button class='btn btn-success text-capitalize' disabled>Approved</button>";
            break;
            case 2 : return "<button class='btn btn-danger text-capitalize' disabled>Canceled</button>";
            break;
        }
    }

    public function user() {
        return $this->belongsTo(User::class , 'user_id');
    }

}
