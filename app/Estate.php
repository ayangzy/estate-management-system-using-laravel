<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estate extends Model
{
    //
    protected $fillable = ['user_id','apartmentname','price','location','description', 'picture'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function comments(){
        return $this->hasMany('App\Comment');
    }
}
