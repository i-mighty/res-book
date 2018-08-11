<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model{
    //
    protected $fillable = [
        'type', 'table_number', 'people_number', 'date_time', 'end',
    ];
    public function person(){
        return $this->belongsTo('App\Model\Person');
    }
}
