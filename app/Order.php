<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model {

    protected  $table = 'Orders';
    protected $primaryKey = 'order_id';
    public $timestamps = false;

}
