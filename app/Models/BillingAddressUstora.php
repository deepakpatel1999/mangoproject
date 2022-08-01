<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingAddressUstora extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id', 'compony_name', 'email',  'first_name', 'last_name', 'address1', 'address2', 'city','zip_code', 'state','country', 'phone', 'optional_address'
      ];
}
