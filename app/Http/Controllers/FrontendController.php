<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Inspiration;

class FrontendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function edit_profile()
    {

        return view('edit-profile');
    }
    public function event_details()
    {

        return view('event_details');
    }

    public function event_listing()
    {

        return view('event_listing');
    }


    public function how_to_score_points()
    {

        return view('how-to-score-points');
    }


    public function kids()
    {

        return view('kids');
    }

    public function my_favourite()
    {

        return view('my-favourite');
    }

    public function search_results()
    {

        return view('search-results');
    }
    public function user_profile()
    {

        return view('user-profile');
    }

    //================== Inspiration GET DATA===================//  
    public function  inspirations_data($id)
    {
        $data = Inspiration::find($id);

        return view('inspirations_data', compact('data'));
    }
    //================== Inspiration GET ALL DATA===================//  
    public function  inspirations_all_data()
    {
        $data = Inspiration::orderBy('id', 'desc')->get();

        return view('inspirations_all_data', compact('data'));
    }

    //================== Category GET DATA===================//  
    public function  category_data($id)
    {
        $data = Category::find($id);;

        return view('category_data', compact('data'));
    }
}
