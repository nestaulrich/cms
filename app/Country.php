<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    public function posts() {

        // the last 2 parameters aren't necessary in this case because we're following convention
        // posts table has a user_id
        // users table has a country_id
        return $this->hasManyThrough('App\Post', 'App\User', 'country_id', 'user_id');

    }
}
