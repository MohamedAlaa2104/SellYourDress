<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'phone', 'status', 'product_id'];

    public function Product()
    {
        $this->belongsTo(Product::class, 'product_id');
    }
}
