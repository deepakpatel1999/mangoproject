<?php

use App\Models\User;
use App\Models\MostLoveBy;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;




if (!function_exists('most_love_by')) {
  function most_love_by()
  {
    $var = MostLoveBy::get();
    return $var;
  }
}

?>
