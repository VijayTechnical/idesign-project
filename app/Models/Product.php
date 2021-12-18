<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function tag()
    {
        return $this->belongsTo(Tag::class,'tag_id');
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class,'product_id');
    }

    public function subCategories()
    {
        return $this->belongsTo(subcategory::class,'subcategory_id');
    }
    public function childCategories()
    {
        return $this->belongsTo(ChildCategory::class,'child_category_id');
    }

    public function attributeValues()
    {
        return $this->hasMany(AttributeValue::class,'product_id');
    }
}
