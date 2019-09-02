<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = ['user_id', 'estate_id', 'body'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function estate(){
        return $this->belongsTo('App\Estate');
    }
}
