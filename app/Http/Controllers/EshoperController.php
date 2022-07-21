<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\E_ShoperBanner;
use App\Models\Product;
use App\Models\ShopCategory;


use DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Log;

class EshoperController extends Controller
{
  //==================  more_to_explore data display===================//
  public function e_shopper_banner()
  {

    return view('admin.e_shopper_banner');
  }
  //==================  add_shop_baner===================//
  public function add_shop_baner()
  {

    return view('admin.add_shop_baner');
  }


  //  //==================insert_shop_banner===================//
  public function  insert_shop_banner(Request $request)
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
    $data = E_ShoperBanner::insert(['title' => $request->title, 'description' => $request->description, 'banner' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('e-shopper-banner')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('e-shopper-banner')->with('failed', 'Something wrong.');
    }
  }
  //  //==================Update  e_shop_banner_update==================//
  public function  e_shop_banner_update(Request $request)
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
      $data = E_ShoperBanner::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'banner' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = E_ShoperBanner::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data    Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }
  //  //=============== shopper_banner_delete =====================//
  public function e_shopper_banner_delete(Request $request)
  {
    $id = $request->id;
    $data = E_ShoperBanner::find($id);

    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = E_ShoperBanner::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
  //==================  product_list data display===================//
  public function product_list()
  {

    $product = Product::with('ShopCategory')->get();
    // $product = Subscription::with('user')->whereRelation('user', 'first_name', 'like', '%' . $request->status . '%')->orWhereRelation('user', 'last_name', 'like', '%' . $request->status . '%')->get();

    // print_r($product);
    return view('admin.product_list', compact('product'));
  }

  //==================  add_product ===================//
  public function add_product()
  {
    $ShopCategory = ShopCategory::get();
    return view('admin.add_product', compact('ShopCategory'));
  }
  //==================store_product===================//
  public function  product_store(Request $request)
  {
    // dd($request->all());
    $request->validate(
      [
        'cat_id' => 'required',
        'product_name' => 'required',
        'quantity' => 'required',
        'files' => 'required',
        'price' => 'required',
        'Web_ID' => 'required',
        'Availability' => 'required',
        'Condition' => 'required',
        'Brand' => 'required',
        'details' => 'required'

      ],
      [
        'cat_id.required' => 'Category is required',
        'product_name.required' => 'Product Name is required',
        'quantity.required' => 'Quantity is required',
        'files.required' => 'Image is required',
        'price.required' => 'Price is required',
        'Web_ID.required' => 'Web ID is required',
        'Availability.required' => 'Availability  is required',
        'Condition.required' => 'Condition is required',
        'Brand.required' => 'Brand is required',
        'details.required' => 'details is required'
      ]
    );

    if ($request->is_features == 'on') {
      $is_features = 1;
    } else {
      $is_features = 0;
    }
    if ($request->is_recommanded == 'on') {
      $is_recommanded = 1;
    } else {
      $is_recommanded = 0;
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
    $data = Product::insert(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'image' => $imageName, 'price' => $request->price, 'Web_ID' => $request->Web_ID, 'Availability' => $request->Availability, 'Condition' => $request->Condition, 'Brand' => $request->Brand, 'details' => $request->details,'is_features' => $is_features, 'is_recommanded' => $is_recommanded,  'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('product-list')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('product-list')->with('failed', 'Something wrong.');
    }
  }
  //=============== product_delete =====================//
  public function product_delete($id)
  {
    $id = $id;
    $data = Product::find($id);
    if ($data) {
      $image = $data->image;
      if ($image != '') {
        $path = public_path() . "/images/" . $image;
        unlink($path);
      }
    }
    $data = Product::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
  //==================  product_edit ===================//
  public function product_edit($id)
  {
    $ShopCategory = ShopCategory::get();
    $Product = Product::find($id);
    return view('admin.product_edit', compact('Product', 'ShopCategory'));
  }

  //==================Update  product_update==================//
  public function  product_update(Request $request)
  {

    $request->validate(
      [
        'cat_id' => 'required',
        'product_name' => 'required',
        'quantity' => 'required',
        'price' => 'required',
        'Web_ID' => 'required',
        'Availability' => 'required',
        'Condition' => 'required',
        'Brand' => 'required',
        'details' => 'required'
      ],
      [
        'cat_id.required' => 'Category is required',
        'product_name.required' => 'Product Name is required',
        'quantity.required' => 'Quantity is required',
        'price.required' => 'Price is required',
        'Web_ID.required' => 'Web ID is required',
        'Availability.required' => 'Availability is required',
        'Condition.required' => 'Condition is required',
        'Brand.required' => 'Brand is required',
        'details.required' => 'details is required'
      ]
    );
    $id = $request->id;
    if ($request->is_features == 'on') {
      $is_features = 1;
    } else {
      $is_features = 0;
    }
    if ($request->is_recommanded == 'on') {
      $is_recommanded = 1;
    } else {
      $is_recommanded = 0;
    }
    $updated_at = date("Y-m-d H:i:s");
    if ($request->file('files')) {
      $imagePath = $request->file('files');
      $imageName = time() . '.' . $imagePath->getClientOriginalName();
      $destinationPath = public_path('/images');
      $imagePath->move($destinationPath, $imageName);
      $data = Product::where('id', $id)->update(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'price' => $request->price, 'Web_ID' => $request->Web_ID, 'Availability' => $request->Availability, 'Condition' => $request->Condition, 'Brand' => $request->Brand, 'details' => $request->details, 'is_features' => $is_features, 'is_recommanded' => $is_recommanded, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = Product::where('id', $id)->update(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'price' => $request->price, 'Web_ID' => $request->Web_ID, 'Availability' => $request->Availability, 'Condition' => $request->Condition, 'Brand' => $request->Brand, 'details' => $request->details, 'is_features' => $is_features, 'is_recommanded' => $is_recommanded, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return redirect()->route('product-list')->with('update-success', 'Data Update Successfully.');
    } else {
      return redirect()->route('product-list')->with('failed', 'Something wrong.');
    }
  }
  //==================  category_list ===================//
  public function category_list()
  {
    return view('admin.category_list');
  }
  //==================  add_category ===================//
  public function add_category()
  {
    return view('admin.add_category');
  }
  //==================categrory_store===================//
  public function  categrory_store(Request $request)
  {
    // dd($request->all());
    $request->validate(
      [
        'cat_name' => 'required',

      ],
      [
        'cat_name.required' => 'Category is required'

      ]
    );

    $created_at = date("Y-m-d H:i:s");
    $data = ShopCategory::insert(['cat_name' => $request->cat_name, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('category-list')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('category-list')->with('failed', 'Something wrong.');
    }
  }
  //==================Update  category_update==================//
  public function  category_update(Request $request)
  {

    $request->validate(
      [
        'cat_name' => 'required'

      ],
      [
        'cat_name.required' => 'Category is required'
      ]
    );
    $id = $request->id;
    $updated_at = date("Y-m-d H:i:s");
    $data = ShopCategory::where('id', $id)->update(['cat_name' => $request->cat_name, 'updated_at' => $updated_at]);

    if ($data) {
      return redirect()->route('category-list')->with('update-success', 'Data Update Successfully.');
    } else {
      return redirect()->route('category-list')->with('failed', 'Something wrong.');
    }
  }
  //=============== category_delete =====================//
  public function category_delete(Request $request)
  {
    $id = $request->id;
    $data = ShopCategory::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
}
