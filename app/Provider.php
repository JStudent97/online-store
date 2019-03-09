<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    // Table Name
    protected $table = 'provider';
    // Primary Key
    public $primaryKey = 'id';
    // Timestamps
    public $timestamps = true;

    public function products(){
        return $this->hasMany('App\Product');
    }
}
