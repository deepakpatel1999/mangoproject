<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddress extends Model
{
  use HasFactory;
  protected $fillable = [
    'user_id', 'compony_name', 'email', 'title', 'first_name', 'middle_name', 'last_name', 'address1', 'address2', 'zip_code', 'country', 'state', 'phone', 'mobile', 'optional_address'
  ];
}
