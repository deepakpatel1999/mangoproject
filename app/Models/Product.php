<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  use HasFactory;
  protected $fillable = [
    'cat_id', 'product_name', 'quantity', 'image', 'price', 'is_features', 'is_recommanded', 'Web_ID', 'Availability', 'Condition', 'Brand', 'details'
  ];

  public function ShopCategory()
  {
    return $this->belongsTo(ShopCategory::class, 'cat_id', 'id');
  }
}
