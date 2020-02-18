<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 *
 * @property mixed $name
 */
class Guest extends Model
{
    protected $table = 'guests';
    protected $fillable = [
        'name', 'document', 'telephone'
    ];
}
