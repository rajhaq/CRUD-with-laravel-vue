<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table ='items';
    protected $fillable=['item_title','item_price','item_info'];

}
