<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model {

    protected  $table = 'OrderItem';
    protected $primaryKey = 'id';
    public $timestamps = false;
}
