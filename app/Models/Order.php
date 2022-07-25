<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded =[];

    public function user(){
        return $this->belongsTo(User::class );
    }

    public function OrderItem(){
        return $this->hasMany(OrderItem::class);
    }

    public function products(){
        return $this->belongsToMany(Product::class,'order_items');
    }
}
