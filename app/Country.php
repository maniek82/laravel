<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    public function posts() {
        return $this->hasManyThrough('App\Post','App\User');
        //szuka country_id in users
        //szuka user_id w posts
    }
}
