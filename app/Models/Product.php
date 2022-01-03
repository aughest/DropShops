<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $primaryKey = 'id';

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function shop(){
        return $this->belongsTo(Shop::class, 'shop_id', 'id');
    }

    public function cart(){
        return $this->belongsTo(Cart::class, 'id', 'product_id');
    }

    public function transaction_detail(){
        return $this->belongsToMany(TransactionDetail::class, 'id', 'product_id');
    }
}
