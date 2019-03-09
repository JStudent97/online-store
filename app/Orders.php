<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    // Table Name
    protected $table = 'orders';
    // Timestamps
    public $timestamps = true;
}
