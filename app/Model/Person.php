<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Person extends Model{
    //
    protected $fillable = [
        'name', 'email'
    ];

    protected $primaryKey = 'email';
    public $incrementing = false;

    public function reservations(){
        return $this->hasMany('App\Model\Reservation');
    }
}
