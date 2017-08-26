<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LtcWallet extends Model
{
    //specifies the fields that can be mass assigned.
    protected $fillable = ['user_id', 'pub_key'];
    protected $hidden = ['x_pub_key', 'priv_key'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}