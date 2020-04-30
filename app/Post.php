<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    // These are not necessary unless you change the name of your table or primary key
    // protected $table = 'posts';
    // protected $primaryKey = 'id'; 


    //Mass assignment for creating data. Allows multiple columns to be created
    protected $fillable = [
        'title', 
        'body'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }


    
}
