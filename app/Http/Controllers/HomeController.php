<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Inspiration;


class HomeController extends Controller
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }

  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Contracts\Support\Renderable
   */

  //================USER DASHBOARD====================//   
  public function index()
  {
    return view('users.user_dashboard');
    //return view('home');
  }

  //=================ADMIN DASHBOARD=====================//
  public function adminHome()
  {
    return view('admin.admin_dashboard');
    //return view('admin_home');
  }


  //==================UPDATE PROFILE===================//  
  public function edit_profile(Request $request)
  {
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required',
      'password' => 'required'
    ]);
    $id = $request->id;
    $name = $request->name;
    $email = $request->email;
    $password = bcrypt($request->password);
    $remember_token = $request->_token;
    $updated_at = date("Y-m-d H:i:s");
    $user = DB::table('users')->where('id', $id)->update(['name' => $name, 'email' => $email, 'password' => $password, 'updated_at' => $updated_at, 'remember_token' => $remember_token]);
    if ($user) {
      return redirect()->back()->with('success', "Profile Update successfully");
    } else {
      return redirect()->back()->with('uffaile', "somthing wrong");
    }
  }

  //==================Google Login===================//  
  public function redirectToGoogle()
  {
    return Socialite::driver('google')->redirect();
  }

  public function handleGoogleCallback()
  {
    //try {

    //$user = Socialite::driver('google')->user();
    $user = Socialite::driver('google')->stateless()->user();
    //dd($user);
    $finduser = User::where('google_id', $user->id)->first();

    if ($finduser) {

      Auth::login($finduser);

      return redirect('/home');
    } else {

      $newUser = User::create([
        'name' => $user->name,
        'email' => $user->email,
        'google_id' => $user->id,
        'password' => encrypt('123456dummy')
      ]);

      Auth::login($newUser);

      return redirect('/home');
    }

    // } catch (Exception $e) {
    //     dd($e->getMessage());
    // }
  }


  //==================Display Category===================//  
  public function category()
  {

    $data['category'] = Category::orderBy('id', 'desc')->get();

    return view('admin.category', $data);
  }


  //==================Add Category===================//  
  public function add_catagory(Request $request)
  {
    $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);

    $category = Category::create($request->all());
    if ($category) {
      return redirect()->back()->with('success', 'insert successfully');
    } else {

      return redirect()->back()->with('failed', 'something wrong');
    }
  }

  //==================Delete Category===================//  
  public function categories_delete(Request $request)
  {

    $id = $request->id;
    $category = Category::find($id)->delete();
    if ($category) {
      return redirect()->back()->with('delete-success', 'delete successfully');
    } else {

      return redirect()->back()->with('delete-failed', 'something wrong');
    }
  }

  //==================UPDATE Category===================//  
  public function category_update(Request $request)
  {
    $id = $request->id;
    $request->validate([
      'title' => 'required',
      'description' => 'required',
    ]);

    $category = Category::find($id);
    $category->title = $request->title;
    $category->description = $request->description;
    $category->save();
    return redirect()->back()->with('update-success', 'update successfully');
  }

  //==================Display Inspiration===================//  
  public function inspiration()
  {

    $data['Inspiration'] = Inspiration::orderBy('id', 'desc')->get();

    return view('admin.Inspiration', $data);
  }

  //==================Create Inspiration===================//  
  public function create()
  {

    return view('admin.create');
  }

  //==================Insert Inspiration===================//  
  public function  create_data(Request $request)
  {
    $request->validate([
      'title' => 'required',

    ]);
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = Inspiration::insert(['title' => $request->title, 'image' => $imageName, 'created_at' => $created_at]);

    return json_encode(array(
      "statusCode" => 200
    ));
  }
  //==================Edit Inspiration===================//  
  public function  edit_data($id)
  {
    $data = Inspiration::find($id);
    return view('admin.edit', compact('data'));
  }

  //==================Update Inspiration===================//  
  public function  update_data(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = Inspiration::where('id', $id)->update(['title' => $request->title, 'image' => $imageName, 'updated_at' => $request->updated_at]);
    } else {
      $data = Inspiration::where('id', $id)->update(['title' => $request->title, 'updated_at' => $request->updated_at]);
    }
    return json_encode(array(
      "statusCode" => 200
    ));
  }

  //===============Delete Data=====================//
  public function delete_data(Request $request)
  {
    $id = $request->id;
    $data = Inspiration::find($id);
    $image = $data->image;
    $path = public_path() . "/images/" . $image;
    unlink($path);
    $data = Inspiration::find($id)->delete();
    return json_encode(array(
      "statusCode" => 200
    ));
  }
}
