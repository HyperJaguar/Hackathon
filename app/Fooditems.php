<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Fooditems extends Model {
    //set table name
    protected $table ='food_items';
    //set primary key
    protected $primaryKey = 'item_id';
    public $timestamps = false;

    protected $fillable = [
        'item_id',
        'item_name',
        'unit_price',
        'unit_type',
        'available_quantity',
        'item_image_path',
        'is_remove',
        'created_at',
        'updated_at'

    ];


}
