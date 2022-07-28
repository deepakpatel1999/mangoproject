<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryUstora extends Model
{
  use HasFactory;
  protected $fillable = [
    'cat_name', 'image'
  ];
  public function ProductUstora()
    {
        return $this->hasMany(ProductUstora::class);
    }
}
