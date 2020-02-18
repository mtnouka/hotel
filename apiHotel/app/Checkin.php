<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Checkin extends Model
{
    protected $table = 'checkins';
    protected $fillable = [
        'entranceDate', 'exitDate', 'aditionalVehicle', 'fkGuest'
    ];
}
