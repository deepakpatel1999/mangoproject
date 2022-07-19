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
use App\Models\Subscription;
use App\Models\MostLoveBy;
use App\Models\EditerPic;
use App\Models\MoreToExplore;
use App\Models\BrowseByCategory;
use App\Models\Setting;
use App\Models\Banner;

use Validator;

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
    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
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
    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
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
    $rules = [
      'title' => 'required',
      'files' => 'required',

    ];

    $input     = $request->all();
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      return response()->json(['errors' => $validator->errors()->all()]);
    }
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

    return response()->json(['success' => 'Record is successfully added']);
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
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = Inspiration::find($id)->delete();
    return json_encode(array(
      "statusCode" => 200
    ));
  }

  //============== User Subcriptipon List========================//
  public function user_Subcription_list()
  {
    $Subcription_list = Subscription::with('user')->paginate(5);
    // echo '<pre>';
    // print_r($Subcription_list);
    // echo'</pre>';

    return view('admin.user_Subcription_list', compact('Subcription_list'));
  }
  //===================filter data =========================//
  public function filterdata(Request $request)
  {
    if ($request->status == 'active') {

      $Subcription_list = Subscription::with('user')->where('stripe_status', 'active')->get();
    } else if ($request->status == 'cancelled') {

      $Subcription_list = Subscription::with('user')->where('stripe_status', 'canceled')->get();
    } else if ($request->status == 'all') {

      $Subcription_list = Subscription::with('user')->get();
    } else if ($request->status == 'onload') {

      $Subcription_list = Subscription::with('user')->get();
    } else {

      //$Subcription_list = Subscription::with('user')->where('user.email', 'LIKE', '%'.$request->status. '%')->get();
      $Subcription_list = Subscription::with('user')->whereRelation('user', 'first_name', 'like', '%' . $request->status . '%')->orWhereRelation('user', 'last_name', 'like', '%' . $request->status . '%')->get();
    }

    return json_encode(array('data' => $Subcription_list));
  }

  //================== most love by Parents===================//
  public function most_love_by()
  {

    return view('admin.most_love_by');
  }

  //==================Insert Most Love by===================//
  public function  add_most_love(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'files' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'files.required' => 'Image is required',
        'description.required' => 'Discription is required'
      ]
    );
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = MostLoveBy::insert(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return back()->with('success', 'Data Insert Successfully.');
    } else {
      return back()->with('failed', 'Something wrong.');
    }
  }
  //==================Update Most Love BY===================//
  public function  most_love_update(Request $request)
  {
    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = MostLoveBy::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = MostLoveBy::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {
      dd('ok');
      return back()->with('failed', 'Something wrong.');
    }
  }
  //===============Delete Data Most Love=====================//
  public function most_love_delete(Request $request)
  {
    $id = $request->id;
    $data = MostLoveBy::find($id);
    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = MostLoveBy::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
  //================== Editors picks data display===================//
  public function editor_picks()
  {

    return view('admin.editor_picks');
  }
  //================== Create picks data display===================//
  public function create_editor_picks()
  {

    return view('admin.create_editor_picks');
  }
  //==================Insert Editor Picks===================//
  public function  create_editor(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'files' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'files.required' => 'Image is required',
        'description.required' => 'Discription is required'
      ]
    );
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = EditerPic::insert(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('editor-picks')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('editor-picks')->with('failed', 'Something wrong.');
    }
  }

  //==================Update  editor_picks===================//
  public function  editor_picks_update(Request $request)
  {
    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = EditerPic::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = EditerPic::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //=============== editor_picks_elete =====================//
  public function editor_picks_elete(Request $request)
  {
    $id = $request->id;
    $data = EditerPic::find($id);

    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = EditerPic::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
  //==================  more_to_explore data display===================//
  public function more_to_explore()
  {

    return view('admin.more_to_explore');
  }
  //================== Create create_more_to_explore===================//
  public function create_more_to_explore()
  {

    return view('admin.create_more_to_explore');
  }


  //==================Insert  create_more_to===================//
  public function  create_more_to(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'files' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'files.required' => 'Image is required',
        'description.required' => 'Discription is required'
      ]
    );
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = MoreToExplore::insert(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('more-to-explore')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('more-to-explore')->with('failed', 'Something wrong.');
    }
  }
  //==================Update  more_to_update==================//
  public function  more_to_update(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = MoreToExplore::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = MoreToExplore::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //=============== more_to_delete =====================//
  public function more_to_delete(Request $request)
  {
    $id = $request->id;
    $data = MoreToExplore::find($id);

    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = MoreToExplore::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }

  //==================  browse_by_category data display===================//
  public function browse_by_category()
  {

    return view('admin.browse_by_category');
  }

  //================== Create create_more_to_explore===================//
  public function create_browse_by_category()
  {

    return view('admin.create_browse_by_category');
  }

  //==================Insert browse_by===================//
  public function  insert_browse_by(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'files' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'files.required' => 'Image is required',
        'description.required' => 'Discription is required'
      ]
    );
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = BrowseByCategory::insert(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('browse-by-category')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('browse-by-category')->with('failed', 'Something wrong.');
    }
  }

  //==================Update  browse_to_category==================//
  public function  browse_to_category_update(Request $request)
  {

    $request->validate(
      [
        'title' => 'required',
        'description' => 'required'
      ],
      [
        'title.required' => 'Title is required',
        'description.required' => 'Discription is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = BrowseByCategory::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = BrowseByCategory::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //=============== browse_by_delete =====================//
  public function browse_by_delete(Request $request)
  {
    $id = $request->id;
    $data = BrowseByCategory::find($id);

    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = BrowseByCategory::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
  //==================  browse_by_category data display===================//
  public function setting_display()
  {

    return view('admin.setting_display');
  }
  //==================Update  setting_data==================//
  public function  setting_data_update(Request $request)
  {

    $request->validate(
      [
        'address' => 'required',
        'contact' => 'required',
        'email' => 'required',
        'about_us' => 'required'
      ],
      [
        'address.required' => 'Address is required',
        'contact.required' => 'Contact is required',
        'email.required' => 'Email is required',
        'about_us.required' => 'About is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('logo')) {
      $imagePath = $request->file('logo');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = Setting::where('id', $id)->update(['address' => $request->address, 'contact' => $request->contact, 'email' => $request->email, 'about_us' => $request->about_us, 'logo' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = Setting::where('id', $id)->update(['address' => $request->address, 'contact' => $request->contact, 'email' => $request->email, 'about_us' => $request->about_us,  'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //==================  banner data display===================//
  public function banner_display()
  {

    return view('admin.banner_display');
  }
  //================== Create create_more_to_explore===================//
  public function banner_create_data()
  {

    return view('admin.banner_create_data');
  }
  //==================Insert baner_data===================//
  public function  insert_baner_data(Request $request)
  {

    $request->validate(
      [

        'banner' => 'required'

      ],
      [

        'banner.required' => 'Banner is required'

      ]
    );
    if ($request->file('banner')) {
      $imagePath = $request->file('banner');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();

      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
    } else {
      $imageName = 'test.png';
    }
    $created_at = date("Y-m-d H:i:s");
    $data = Banner::insert(['banner' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('banner-display')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('banner-display')->with('failed', 'Something wrong.');
    }
  }
  //==================Update  banner_data==================//
  public function  banner_data_update(Request $request)
  {

    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('banner')) {
      $imagePath = $request->file('banner');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = Banner::where('id', $id)->update(['banner' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = Banner::where('id', $id)->update(['updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //=============== more_to_delete =====================//
  public function banner_data_delete(Request $request)
  {
    $id = $request->id;
    $data = Banner::find($id);

    $image = $data->banner;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = Banner::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
}
