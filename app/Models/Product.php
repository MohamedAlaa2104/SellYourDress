<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Product extends Model implements HasMedia
{
    use InteractsWithMedia;
    use HasFactory;

    protected $fillable = ['name_en', 'name_ar', 'category_id', 'description_en', 'description_ar', 'active', 'featured', 'price', 'sell_type'];

    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
}
