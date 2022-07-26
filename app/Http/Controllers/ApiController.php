<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use App\Models\User;
use App\Models\Category;
use App\Models\Inspiration;
use App\Models\MostLoveBy;
use App\Models\EditerPic;
use App\Models\TrySomething;
use App\Models\MoreToExplore;
use App\Models\BrowseByCategory;
use App\Models\Setting;
use App\Models\Banner;
use App\Models\E_ShoperBanner;
use App\Models\FeaturItem;
use App\Models\Reccommeded;
use App\Models\T_Shirt;
use App\Models\Blazers;
use App\Models\Sunglass;
use App\Models\KidsData;
use App\Models\PoloShirt;
use App\Models\ShopCategory;
use App\Models\Product;
use App\Models\AddToCard;
use App\Models\Order;
use App\Models\BillingAddress;
use App\Models\PaymentDetail;
use App\Models\WishList;

use Illuminate\Validation\Rule;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Validator;
use App\Http\Resources\Category as CategoryResource;
use App\Http\Resources\Inspiration as InspirationResource;
use App\Http\Resources\MostLove as MostLoveResource;
use App\Http\Resources\Editor_picks as Editor_picksResource;
use App\Http\Resources\TrySomething as TrySomethingResource;
use App\Http\Resources\BrowseByCategory as BrowseByCategoryResource;
use App\Http\Resources\Setting as SettingResource;
use App\Http\Resources\Banner as BannerResource;
use App\Http\Resources\FeaturItem as FeaterItemResource;
use App\Http\Resources\ShopCategories as ShopCategoryResource;
use App\Http\Resources\Shop_banner_show as Shop_banner_showResource;
use App\Http\Resources\Show_banner as Show_bannerResource;
use App\Http\Resources\AllProductShow as AllProductShowResource;
use App\Http\Resources\ShowCart as ShowCartResource;
use App\Http\Resources\WishList as WishListResource;
use App\Http\Resources\OrderList as OrderListResource;


class ApiController extends BaseController
{
  //================ Login =================//
  public function login(Request $request)
  {
    $rules = [
      'email' => 'required',
      'password' => 'required',

    ];

    $input  = $request->all();
    $validator = Validator::make($input, $rules);
    if ($validator->fails()) {
      $result['id'] = '';
      $result['email'] = '';
      //return response()->json(['success' => 'false', 'data' => $result, 'message' => "Please enter all fields"]);
      return $this->sendError('Please enter all fields.', $validator->errors());
      die();
    }

    if (!auth()->attempt($request->all())) {
      $result['id'] = '';
      $result['email'] = '';
      //return response(['status' => 'false', 'data' => $result, 'message' => 'Invalid Credentials']);
      return $this->sendError('Invalid Credentials.', $validator->errors());
      die();
    }

    $user = User::Select('id', 'email', 'name')->where('email', $request->email)->orwhere('password', $request->password)->first();
    $id = $user->id;
    $user = Auth::user();
    $dataa['token'] = Auth::user()->createToken('auth_token')->plainTextToken;
    $dataa['id'] = "$id";
    $dataa['email'] = $user->email;
    $dataa['username'] = $user->name;
    // echo json_encode(array('status' => 'true', 'data' => $dataa, 'message' => 'User Login Successfully'));
    return $this->sendResponse($dataa, 'User Login successfully.');
    die();
  }

  //================ sIGN UP====================//
  public function signup(Request $request)
  {

    $rules = [

      'first_name' => 'required',
      'last_name' => 'required',
      'email'    => 'unique:users|required',
      'password' => 'unique:users|required',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);



    $dataa['first_name'] = '';

    $dataa['last_name'] = '';

    $dataa['email'] = '';

    $dataa['password'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      //return response()->json(['status' => 'false', 'data' => $dataa, 'message' => $error_msg]);
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    $response_data = array('first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'password' => bcrypt($data['password']));

    $data_user = array('name' => $data['first_name'], 'first_name' => $data['first_name'], 'last_name' => $data['last_name'], 'email' => $data['email'], 'password' => bcrypt($data['password']));

    $user = User::create($data_user);
    // $token = $user()->createToken('auth_token')->plainTextToken;
    //$role = DB::table('roles')->insertGetId[' name' => $data['first_name'],'display_name' => $data['first_name']]);

    if ($user) {

      //return response()->json(array('status' => 'true', 'data' => $token, 'message' => 'User Register Successfully'));
      return $this->sendResponse($response_data, 'User register successfully.');
      die();
    } else {

      //return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
  }

  //================ inspiration get data====================//
  public function inspiration_get_data(Request $request)
  {

    $data = Inspiration::orderBy('id', 'desc')->get();
    if ($data) {
      //return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'successfully get data'));
      return $this->sendResponse(InspirationResource::collection($data), 'data retrieved successfully.');
      die();
    } else {
      return response()->json(array('status' => 'false', 'data' => '', 'message' => 'not found data'));

      die();
    }
  }

  //================ inspiration Insert data====================//
  public function inspiration_insert_data(Request $request)
  {
    $rules = [
      'title' => 'required',
      'files'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['files'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      //return response()->json(['status' => 'false', 'data' => $dataa, 'message' => $error_msg]);
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = 'test.png';
    }
    $datas['title'] = $request->title;
    $datas['files'] = $image;
    $data_user = array('title' => $data['title'], 'image' => $image);

    $user = Inspiration::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));
      //return $this->sendResponse(new InspirationResource($data_user), 'Inspiration created successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //=================== edit ========================//
  public function Inspiration_edit($id)
  {
    $data = Inspiration::find($id);

    if (is_null($data)) {
      return $this->sendError('data not found.');
    }

    return $this->sendResponse(new InspirationResource($data), 'data retrieved successfully.');
  }
  //================ inspiration UPDATE data====================//
  public function inspiration_update_data(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',

    ];

    $data['title'] = $request->title;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      //return response()->json(['status' => 'false', 'data' => $dataa, 'message' => $error_msg]);
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = Inspiration::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'updated_at' => $request->updated_at]);
    } else {

      $user = Inspiration::where('id', $id)->update(['title' => $request->title, 'updated_at' => $request->updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));
      //return $this->sendResponse(new InspirationResource($data), 'Inspiration created successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //===============Delete Data=====================//
  public function inspiration_delete_data(Request $request)
  {
    $id = $request->id;
    $data = Inspiration::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = Inspiration::find($id)->delete();

    if ($data) {

      //return response()->json(array('status' => 'true', 'message' => 'Data Delete Successfully'));
      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }



  //================ Category get data====================//
  public function category_get_data()
  {
    $data = Category::orderBy('id', 'desc')->get();
    if ($data) {
      //return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'successfully get data'));
      return $this->sendResponse(CategoryResource::collection($data), 'Posts fetched.');
      die();
    } else {
      //return response()->json(array('status' => 'false', 'data' => '', 'message' => 'not found data'));
      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ Category delete data====================//
  public function category_delete_data(Request $request)
  {
    $id = $request->id;

    $data = Category::find($id)->delete();

    if ($data) {

      //return response()->json(array('status' => 'true', 'message' => 'Data Delete Successfully'));
      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      //return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));
      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================== Category Insert =========================//
  public function category_insert_data(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description'    =>  'required',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      //return response()->json(['status' => 'false', 'data' => $dataa, 'message' => $error_msg]);
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }

    $datas['title'] = $request->title;
    $datas['description'] =  $request->description;
    $data_user = array('title' => $data['title'], 'description' => $data['description']);

    $user = Category::create($data_user);

    if ($user) {

      //return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));
      return $this->sendResponse(new Category($data_user), 'category created successfully.');
      die();
    } else {

      //return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
  }
  //================ Category Edit data====================//
  public function Category_show($id)
  {
    $Category = Category::find($id);

    if (is_null($Category)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new CategoryResource($Category), 'Product retrieved successfully.');
  }
  //================ Category UPDATE data====================//
  public function category_update_data(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',

    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return response()->json(['status' => 'false', 'data' => $dataa, 'message' => $error_msg]);

      die();
    }

    $cataegory = Category::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $request->updated_at]);

    if ($cataegory) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //================ most_love_by_get====================//
  public function most_love_by_get()
  {

    $data = most_love_by();
    if ($data) {

      return $this->sendResponse(MostLoveResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ most love Insert data====================//
  public function most_loved_insert(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['files'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'image' => $image);

    $user = MostLoveBy::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //=================== most love edit ========================//
  public function most_love_edit($id)
  {
    $data = MostLoveBy::find($id);

    if (is_null($data)) {
      return $this->sendError('data not found.');
    }

    return $this->sendResponse(new MostLoveResource($data), 'data retrieved successfully.');
  }
  //================ most_love_update data====================//
  public function most_love_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = MostLoveBy::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = MostLoveBy::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //===============Delete Data=====================//
  public function most_loved_delete($id)
  {
    $id = $id;
    $data = MostLoveBy::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = MostLoveBy::find($id)->delete();

    if ($data) {


      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //================ editor picks_ display====================//
  public function editor_picks_display()
  {

    $data = editor_picks_data();
    if ($data) {

      return $this->sendResponse(Editor_picksResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ Edito Insert data====================//
  public function editor_picks_insert(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'image' => $image);

    $user = EditerPic::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));
      //return $this->sendResponse(new Editor_picksResource($data_user), 'Data created successfully.');

      die();
    } else {

      //return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));
      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }

  //================ editor_picks_ Edit data====================//
  public function editor_picks_edit($id)
  {
    $edit_pic = EditerPic::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new Editor_picksResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ editors_update data====================//
  public function editors_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = EditerPic::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = EditerPic::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //===============Delete Data=====================//
  public function editors_delete($id)
  {
    $id = $id;
    $data = EditerPic::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = EditerPic::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }


  //================  try_something display====================//
  public function get_try_something()
  {

    $data = try_somthing();
    if ($data) {

      return $this->sendResponse(TrySomethingResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }



  //================ try something insert====================//
  public function try_something_insert(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'image' => $image);

    $user = TrySomething::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ try_something Edit data====================//
  public function try_something_edit($id)
  {
    $edit_pic = TrySomething::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new Editor_picksResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ try_update data====================//
  public function try_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = TrySomething::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = TrySomething::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //===============Delete Data=====================//
  public function try_delete($id)
  {
    $id = $id;
    $data = TrySomething::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = TrySomething::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  get_more_to_explore display====================//
  public function get_more_to_explore()
  {

    $data = more_to_explore();
    if ($data) {

      return $this->sendResponse(TrySomethingResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ more_to   insert====================//
  public function more_to_insert(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'image' => $image);

    $user = MoreToExplore::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ more_to_explore Edit data====================//
  public function more_to_explore_edit($id)
  {
    $edit_pic = MoreToExplore::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new Editor_picksResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ more_to_explore_update data====================//
  public function more_to_explore_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = MoreToExplore::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = MoreToExplore::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //===============more_to_explore_delete Data=====================//
  public function more_to_explore_delete($id)
  {
    $id = $id;
    $data = MoreToExplore::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = MoreToExplore::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //================  browse_by_category display====================//
  public function browse_by_category_get()
  {

    $data = Browse_By_Category();
    if ($data) {

      return $this->sendResponse(BrowseByCategoryResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ browse_by_category insert====================//
  public function browse_by_category_insert(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'image' => $image);

    $user = BrowseByCategory::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ browse_by_category Edit data====================//
  public function browse_by_category_edit($id)
  {
    $edit_pic = BrowseByCategory::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new BrowseByCategoryResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ browse_by_category_update data====================//
  public function browse_by_category_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = BrowseByCategory::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = BrowseByCategory::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //===============browse_by_category_delete Data=====================//
  public function browse_by_category_delete($id)
  {
    $id = $id;
    $data = BrowseByCategory::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = BrowseByCategory::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  browse_by_category display====================//
  public function setting()
  {

    $data = Settings();
    if ($data) {

      return $this->sendResponse(SettingResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ setting Edit data====================//
  public function setting_edit($id)
  {
    $edit_pic = Setting::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new SettingResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ setting_update data====================//
  public function setting_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'address' => 'required',
      'contact' => 'required',
      'email' => 'required',
      'about_us' => 'required',

    ];

    $data['address'] = $request->address;
    $data['contact'] = $request->contact;
    $data['email'] = $request->email;
    $data['about_us'] = $request->about_us;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['address'] = '';
    $dataa['contact'] = '';
    $dataa['email'] = '';
    $dataa['about_us'] = '';


    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('logo')) {
      $imagePath = $request->file('logo');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = Setting::where('id', $id)->update(['address' => $request->address, 'contact' => $request->contact, 'email' => $request->email, 'about_us' => $request->about_us, 'updated_at' => $updated_at]);
    } else {

      $user = Setting::where('id', $id)->update(['address' => $request->address, 'contact' => $request->contact, 'email' => $request->email, 'about_us' => $request->about_us, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  banner display====================//
  public function banner()
  {

    $data = Banners();
    if ($data) {

      return $this->sendResponse(BannerResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ banner insert====================//
  public function banner_insert(Request $request)
  {
    $rules = [

      'banner'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);


    $dataa['banner'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('banner')) {
      $imagePath = $request->file('banner');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }

    $datas['banner'] = $image;

    $data_user = array('banner' => $image);

    $user = Banner::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data_user, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ banner Edit data====================//
  public function banner_edit($id)
  {
    $edit_pic = Banner::find($id);

    if (is_null($edit_pic)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new BannerResource($edit_pic), 'Product retrieved successfully.');
  }
  //================ banner_update data====================//
  public function banner_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");

    if ($request->file('banner')) {
      $imagePath = $request->file('banner');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['banner'] = $image;
      $user = Banner::where('id', $id)->update(['banner' => $image, 'updated_at' => $updated_at]);
    } else {

      $user = Banner::where('id', $id)->update(['updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //===============banner_delete Data=====================//
  public function banner_delete($id)
  {
    $id = $id;
    $data = Banner::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = Banner::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  shop_banner display====================//
  public function shop_banner_show()
  {

    $data = e_shopper_banner();

    if ($data) {

      return $this->sendResponse(Shop_banner_showResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ create_shop_banner insert====================//
  public function create_shop_banner(Request $request)
  {
    $rules = [
      'title' => 'required',
      'description' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['description'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['description'] = $request->description;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'description' => $data['description'], 'banner' => $image);

    $user = E_ShoperBanner::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ shop_banner Edit data====================//
  public function shop_banner_edit($id)
  {
    $data = E_ShoperBanner::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new BrowseByCategoryResource($data), 'Product retrieved successfully.');
  }
  //================ shop_banner_update data====================//
  public function shop_banner_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'description' => 'required',
    ];

    $data['title'] = $request->title;
    $data['description'] = $request->description;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['description'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = E_ShoperBanner::where('id', $id)->update(['title' => $request->title, 'banner' => $image, 'description' => $request->description, 'updated_at' => $updated_at]);
    } else {

      $user = E_ShoperBanner::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  public function shope_banner_delete($id)
  {
    $id = $id;
    $data = E_ShoperBanner::find($id);
    if ($data) {
      $image = $data->banner;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = E_ShoperBanner::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  featue_item_show display====================//
  public function featur_item_show()
  {

    $data = FeaturItem();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ featur_item_create  ====================//
  public function featur_item_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = FeaturItem::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ featur_item_edit Edit data====================//
  public function featur_item_edit($id)
  {
    $data = FeaturItem::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ featue_item_update data====================//
  public function featue_item_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = FeaturItem::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = FeaturItem::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  public function featur_item_delete($id)
  {
    $id = $id;
    $data = FeaturItem::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = FeaturItem::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }

  //================  recommended_item_show display====================//
  public function recommended_item_show()
  {

    $data = recommended_show();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }

  //================ recommended_item_create  ====================//
  public function recommended_item_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = Reccommeded::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ recommended_item Edit data====================//
  public function recommended_item_edit($id)
  {
    $data = Reccommeded::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ recommended_item_update data====================//
  public function recommended_item_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = Reccommeded::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = Reccommeded::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ recommended Delete=============//
  public function recommended_item_delete($id)
  {
    $id = $id;
    $data = Reccommeded::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }
    $data = Reccommeded::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  t_shirt_show display====================//
  public function t_shirt_show()
  {

    $data = T_Shirt();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ t_shirt_create  ====================//
  public function t_shirt_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = T_Shirt::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }

  //================ t_shirt Edit data====================//
  public function t_shirt_edit($id)
  {
    $data = T_Shirt::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ t_shirt_update data====================//
  public function t_shirt_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = T_Shirt::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = T_Shirt::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ t_shirt Delete=============//
  public function t_shirt_delete($id)
  {
    $id = $id;
    $data = T_Shirt::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }

    $data = T_Shirt::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  blazers-show display====================//
  public function blazers_how()
  {

    $data = Blazer();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ blazers_create  ====================//
  public function blazers_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = Blazers::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }

  //================ blazers Edit data====================//
  public function blazers_edit($id)
  {
    $data = Blazers::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ blazers_update data====================//
  public function blazers_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = Blazers::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = Blazers::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ blazers_delete Delete=============//
  public function blazers_delete($id)
  {
    $id = $id;
    $data = Blazers::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }

    $data = T_Shirt::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  sunglass-show display====================//
  public function sunglass_show()
  {

    $data = Sunglasses();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ sunglass_create  ====================//
  public function sunglass_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = Sunglass::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }

  //================ sunglass_edit Edit data====================//
  public function sunglass_edit($id)
  {
    $data = Sunglass::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }

  //================ sunglass_update data====================//
  public function sunglass_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = Sunglass::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = Sunglass::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ sunglass_delete Delete=============//
  public function sunglass_delete($id)
  {
    $id = $id;
    $data = Sunglass::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }

    $data = Sunglass::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  kids_data_show display====================//
  public function kids_data_show()
  {

    $data = KidsData();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ kids_data_create  ====================//
  public function kids_data_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = KidsData::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ kids_data_Edit data====================//
  public function kids_data_edit($id)
  {
    $data = KidsData::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ kids_data_update data====================//
  public function kids_data_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = KidsData::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = KidsData::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ kids_data Delete=============//
  public function kids_data_delete($id)
  {
    $id = $id;
    $data = KidsData::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    } else {
      return response()->json(array('status' => 'false', 'message' => 'Not data found'));
    }

    $data = KidsData::find($id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Data deleted successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  polo_shirt_show display====================//
  public function polo_shirt_show()
  {

    $data = PoloShirt();

    if ($data) {

      return $this->sendResponse(FeaterItemResource::collection($data), 'Posts fetched.');
      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());
      die();
    }
  }
  //================ polo_shirt_create  ====================//
  public function polo_shirt_create(Request $request)
  {
    $rules = [
      'title' => 'required',
      'price' => 'required',
      'image'    =>  'required|image|mimes:jpeg,png,jpg|max:2048',

    ];

    $data = $request->all();

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';

    $dataa['price'] = '';

    $dataa['image'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
    } else {
      $image = '1656318034.image_02.jpg';
    }
    $datas['title'] = $request->title;
    $datas['price'] = $request->price;
    $datas['image'] = $image;
    $data_user = array('title' => $data['title'], 'price' => $data['price'], 'image' => $image);

    $user = PoloShirt::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $datas, 'message' => 'Data Register Successfully'));

      die();
    } else {

      return $this->sendError('Error validation', $validator->errors());

      die();
    }
  }
  //================ polo_shirt_edit data====================//
  public function polo_shirt_edit($id)
  {
    $data = PoloShirt::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }

    return $this->sendResponse(new FeaterItemResource($data), 'Product retrieved successfully.');
  }
  //================ polo_shirt_update data====================//
  public function polo_shirt_update(Request $request)
  {
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $rules = [
      'title' => 'required',
      'price' => 'required',
    ];

    $data['title'] = $request->title;
    $data['price'] = $request->price;
    $data['id'] = $request->id;

    $validator = Validator::make($data, $rules);

    $dataa['title'] = '';
    $dataa['price'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {


      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    if ($request->file('image')) {
      $imagePath = $request->file('image');
      $image = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $image);
      $data['files'] = $image;
      $user = PoloShirt::where('id', $id)->update(['title' => $request->title, 'image' => $image, 'price' => $request->price, 'updated_at' => $updated_at]);
    } else {

      $user = PoloShirt::where('id', $id)->update(['title' => $request->title, 'price' => $request->price, 'updated_at' => $updated_at]);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Update Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => $dataa, 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  shop_category display====================//
  public function shop_category()
  {

    $data = show_category();

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(ShopCategoryResource::collection($data), 'Posts fetched.');
    die();
  }
  //================  all_product display====================//
  public function all_product()
  {
    $data = Product::get();

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(AllProductShowResource::collection($data), 'Posts fetched.');
    die();
  }

  //================  features_filter_product display====================//
  public function features_filter_product()
  {

    $data = Product::get()->where('is_features', 1);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(AllProductShowResource::collection($data), 'Posts fetched.');
    die();
  }
  //================  category_filter_product display====================//
  public function category_filter_product($id)
  {

    $data = Product::get()->where('cat_id', $id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(AllProductShowResource::collection($data), 'Posts fetched.');
  }
  //================  recommended_filter_product display====================//
  public function recommended_filter_product()
  {

    $data = Product::get()->where('is_recommanded', 1);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(AllProductShowResource::collection($data), 'Posts fetched.');
    die();
  }
  //================  product_details display====================//
  public function product_details($id)
  {


    $data = Product::find($id);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(new AllProductShowResource($data), 'Product retrieved successfully.');
  }

  //================ add_to_card data====================//
  public function add_to_card(Request $request)
  {
    $rules = [
      'user_id' => 'required',
      'product_id' => 'required',
      'web_id' => 'required',
      'quant' => 'required',
    ];

    $data['user_id'] = $request->user_id;
    $data['product_id'] = $request->product_id;
    $data['web_id'] = $request->web_id;
    $data['quant'] = $request->quant;

    $validator = Validator::make($data, $rules);

    $dataa['user_id'] = '';
    $dataa['product_id'] = '';

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    $product = Product::where('id', $request->product_id)->first();
    $quantity = $product->quantity;
    if ($quantity < $request->quant) {
      return response()->json(array('status' => 'false', 'data' => $quantity, 'message' => 'Your product quantity only' .    $quantity));
    }

    $AddToCard = AddToCard::where([['product_id', $request->product_id], ['user_id', $request->product_id]])->first();
    if ($AddToCard != '') {
      if ($request->quant_minus != '') {
        $quantt = $AddToCard->quant;
        $quanti = $request->quant;
        $quant = $quantt - $quanti;
        $user = AddToCard::where([['product_id', $request->product_id], ['user_id', $request->product_id]])->update(['quant' => $quant]);
        $quantdata = AddToCard::where([['product_id', $request->product_id], ['user_id', $request->product_id]])->first();
        return response()->json(array('status' => 'true', 'data' => $quantdata, 'message' => 'Data Add To Card Successfully'));
      }
    }
    if ($AddToCard != '') {
      $quantt = $AddToCard->quant;
      $quanti = $request->quant;
      $quant = $quantt + $quanti;
      $user = AddToCard::where([['product_id', $request->product_id], ['user_id', $request->product_id]])->update(['quant' => $quant]);
      $quantdata = AddToCard::where([['product_id', $request->product_id], ['user_id', $request->product_id]])->first();

      return response()->json(array('status' => 'true', 'data' => $quantdata, 'message' => 'Data Add To Card Successfully'));
    } else {
      $data_user = array('user_id' => $request->user_id, 'product_id' => $request->product_id, 'web_id' => $request->web_id, 'quant' => $request->quant);
      $user = AddToCard::create($data_user);
    }

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Add To Card Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => '', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ checkout data====================//
  public function checkout(Request $request)
  {

    $rules = [
      'user_id' => 'required',
      'address1' => 'required',

    ];

    $data['user_id'] = $request->user_id;
    $data['address1'] = $request->address1;
    $data['payment_status'] = 'panding';
    $data['status'] = 'panding';

    $data['compony_name'] = $request->compony_name;
    $data['email'] = $request->email;
    $data['title'] =  $request->title;
    $data['first_name'] = $request->first_name;
    $data['middle_name'] = $request->middle_name;
    $data['last_name'] = $request->last_name;
    $data['address1'] = $request->address1;
    $data['address2'] = $request->address2;
    $data['zip_code'] = $request->zip_code;
    $data['country'] = $request->country;
    $data['state'] = $request->state;
    $data['phone'] = $request->phone;
    $data['mobile'] = $request->mobile;
    $data['optional_address'] = $request->optional_address;

    $validator = Validator::make($data, $rules);

    // $data['user_id'] = '';
    // $data['address1'] = '';
    // $data['payment_status'] = '';
    // $data['status'] = '';
    // $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    $cart = AddToCard::where('user_id', $request->user_id)->get();
    foreach ($cart as $carts) {
      $user_id = $carts->user_id;
      $product_id = $carts->product_id;
      $cart_id = $carts->id;

      $data_user = array('user_id' => $user_id, 'product_id' => $product_id, 'cart_id' => $cart_id, 'address' => $request->address1, 'payment_status' => 'panding', 'status' => 'panding');
      $user = Order::create($data_user);
    }
    if ($request->optional_address != '') {
      $data_user = array('user_id' => $request->user_id, 'compony_name' => $request->compony_name, 'email' => $request->email, 'title' => $request->title, 'first_name' => $request->first_name, 'middle_name' => $request->middle_name, 'last_name' => $request->last_name, 'address1' => $request->address1, 'address2' => $request->address2, 'zip_code' => $request->zip_code, 'country' => $request->country, 'state' => $request->state, 'phone' => $request->phone, 'mobile' => $request->mobile, 'optional_address' => $request->optional_address);
      $user = BillingAddress::create($data_user);
    } else {
      $data_user = array('user_id' => $request->user_id, 'compony_name' => $request->compony_name, 'email' => $request->email, 'title' => $request->title, 'first_name' => $request->first_name, 'middle_name' => $request->middle_name, 'last_name' => $request->last_name, 'address1' => $request->address1, 'address2' => $request->address2, 'zip_code' => $request->zip_code, 'country' => $request->country, 'state' => $request->state, 'phone' => $request->phone, 'mobile' => $request->mobile);
      BillingAddress::create($data_user);
    }
    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Checkout Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => '', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ payment_details data====================//
  public function payment_details(Request $request)
  {

    $rules = [
      'user_id' => 'required',
      'card_name' => 'required',
      'total_amount' => 'required',

    ];

    $data['user_id'] = $request->user_id;
    $data['card_name'] = $request->card_name;
    $data['total_amount'] = $request->total_amount;;

    $validator = Validator::make($data, $rules);
    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {
      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }
    $cart = AddToCard::where('user_id', $request->user_id)->get();
    foreach ($cart as $carts) {
      $user_id = $carts->user_id;
      $product_id = $carts->product_id;
      $cart_id = $carts->cart_id;
      $cart_id = $carts->id;

      $data_user = array('payment_status' => 'online', 'status' => 'confirm');
      $user = Order::where([['cart_id', $cart_id], ['user_id', $user_id]])->update($data_user);
      AddToCard::where('id', $cart_id)->delete();
    }
    $data_user = array('user_id' => $request->user_id, 'card_name' => $request->card_name, 'payment_status' => 'online', 'total_amount' => $request->total_amount);
    $user = PaymentDetail::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data Checkout Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => '', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  card_display display====================//
  public function card_display(Request $request)
  {
    $user_id = $request->user_id;

    $data = AddToCard::join('products', 'add_to_cards.product_id', '=', 'products.id')->where('user_id', $user_id)->get(['products.*', 'add_to_cards.*']);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(ShowCartResource::collection($data), 'Posts fetched.');
    die();
  }
  //================ cart_remove Delete=============//
  public function cart_remove($id)
  {
    $id = $id;

    $data = AddToCard::where('cart_id', $id)->delete();

    if ($data) {

      return $this->sendResponse([], 'Cart Remove successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================ wishlist data====================//
  public function wishlist(Request $request)
  {
    $rules = [
      'user_id' => 'required',
      'product_id' => 'required',

    ];

    $data['user_id'] = $request->user_id;
    $data['product_id'] = $request->product_id;

    $validator = Validator::make($data, $rules);

    $error_msg = '';

    $error_msg = $validator->errors()->first();

    if ($validator->fails()) {

      return $this->sendError('Validation Error.', $validator->errors());
      die();
    }

    $data_user = array('user_id' => $request->user_id, 'product_id' => $request->product_id);
    $user = WishList::create($data_user);

    if ($user) {

      return response()->json(array('status' => 'true', 'data' => $data, 'message' => 'Data WishLIst add Successfully'));

      die();
    } else {

      return response()->json(array('status' => 'false', 'data' => '', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  wishlist_display ====================//
  public function wishlist_display(Request $request)
  {
    $user_id = $request->user_id;

    $data = WishList::join('products', 'wish_lists.product_id', '=', 'products.id')->where('user_id', $user_id)->get(['products.*', 'wish_lists.*']);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(WishListResource::collection($data), 'Posts fetched.');
    die();
  }
  //================ wishlist_remove Delete=============//
  public function wishlist_remove($id)
  {
    $id = $id;

    $data = WishList::where('wishlist_id', $id)->delete();

    if ($data) {

      return $this->sendResponse([], 'WishList Remove successfully.');
      die();
    } else {

      return response()->json(array('status' => 'false', 'message' => 'Somthing went wrong'));

      die();
    }
  }
  //================  order_list ====================//
  public function order_list(Request $request)
  {
    $user_id = $request->user_id;

    $data = Order::join('products', 'orders.product_id', '=', 'products.id')->where('user_id', $user_id)->get(['products.*', 'orders.*']);

    if (is_null($data)) {
      return $this->sendError('Product not found.');
    }
    return $this->sendResponse(OrderListResource::collection($data), 'Posts fetched.');
    die();
  }
}
