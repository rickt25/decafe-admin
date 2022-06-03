<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function menus()
    {
        return $this->hasMany(Menu::class)->orderBy('name');
    }

    public function orderDetails(){
        return $this->hasMany(OrderDetail::class);
    }
}
