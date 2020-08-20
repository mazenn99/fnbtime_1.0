<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class AppsDelivery extends Model
{
    protected $table = 'apps_deliveries';
    protected $fillable = ['res_id' , 'mrsool' , 'logmaty' , 'hungerStation' , 'jahiz' , 'careemNow'];
    protected $hidden = ['created_at' , 'updated_at'];
    public $timestamps = false;


    ######### relation of restaurant have apps delivery ########
    public function restaurant() {
        return $this->belongsTo(Restaurant::class , 'res_id');
    }
}
