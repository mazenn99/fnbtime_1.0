<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;


class ContractRestaurant extends Model
{
    
    protected $fillable = ['hash' , 'res_id' , 'approve_at' , 'signed_name'];
    public $timestamps  = FALSE;
    
    public function restaurant() {
        return $this->belongsTo(Restaurant::class , 'res_id');
    }
}
