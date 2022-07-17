<?php

use App\Models\User;
use App\Models\MostLoveBy;
use App\Models\EditerPic;
use App\Models\TrySomething;
use App\Models\MoreToExplore;
use App\Models\BrowseByCategory;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\E_ShoperBanner;
use App\Models\FeaturItem;

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
    $var = MostLoveBy::orderBy('id', 'desc')->get();
    return $var;
  }
}

if (!function_exists('editor_picks_data')) {
  function editor_picks_data()
  {
    $var = EditerPic::orderBy('id', 'desc')->get();
    return $var;
  }
}

if (!function_exists('try_somthing')) {
  function try_somthing()
  {
    $var = TrySomething::orderBy('id', 'desc')->get();
    return $var;
  }
}

if (!function_exists('more_to_explore')) {
  function more_to_explore()
  {
    $var = MoreToExplore::orderBy('id', 'desc')->get();
    return $var;
  }
}
if (!function_exists('Browse_By_Category')) {
  function Browse_By_Category()
  {
    $var = BrowseByCategory::orderBy('id', 'desc')->get();
    return $var;
  }
}
if (!function_exists('Settings')) {
  function Settings()
  {
    $var = Setting::orderBy('id', 'desc')->get();
    return $var;
  }
}
if (!function_exists('Banners')) {
  function Banners()
  {
    $var = Banner::orderBy('id', 'desc')->get();
    return $var;
  }
}
if (!function_exists('e_shopper_banner')) {
  function e_shopper_banner()
  {
    $var = E_ShoperBanner::orderBy('id', 'desc')->get();
    return $var;
  }
}

if (!function_exists('FeaturItem')) {
  function FeaturItem()
  {
    $var = FeaturItem::orderBy('id', 'desc')->get();
    return $var;
  }
}
?>
