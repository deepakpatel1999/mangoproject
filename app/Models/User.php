<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use Laravel\Fortify\TwoFactorAuthenticatable;
use Laratrust\Traits\LaratrustUserTrait;
// use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
//use Laratrust\Traits\LaratrustUserTrait;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
  use LaratrustUserTrait;
  use HasFactory, Notifiable, HasApiTokens, Billable;

  //use TwoFactorAuthenticatable;
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'name', 'email','first_name', 'last_name', 'password', 'is_admin', 'google_id',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'password', 'remember_token',

  ];


  /**
   * The attributes that should be cast to native types.
   *
   * @var array
   */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];
  // public function subscription()
  // {
  //   return $this->hasMany(Subscription::class);
  // }
}
