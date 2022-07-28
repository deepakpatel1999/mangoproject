<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductUstora extends Model
{
  use HasFactory;
  protected $fillable = [
    'cat_id', 'product_name', 'quantity', 'image', 'discount_price', 'price', 'details', 'top_seller', 'recently_view', 'top_new'
  ];
  public function CategoryUstora()
  {
    return $this->belongsTo(CategoryUstora::class, 'cat_id', 'id');
  }
}
