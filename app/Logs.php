<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    //

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
