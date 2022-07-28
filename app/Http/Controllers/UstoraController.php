<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\E_ShoperBanner;
use App\Models\Product;
use App\Models\ShopCategory;
use App\Models\ProductUstora;
use App\Models\CategoryUstora;

use DB;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Facades\Log;

class UstoraController extends Controller
{

    //==================  ustora_product_list data display===================//
    public function ustora_product_list()
    {

        $product = ProductUstora::with('CategoryUstora')->get();

        return view('admin.ProductUstora_list', compact('product'));
    }

    //==================  add_ustora_product ===================//
    public function add_ustora_product()
    {
        $ShopCategory = CategoryUstora::get();
        return view('admin.add_ustora_product', compact('ShopCategory'));
    }
    //==================ustora_product_store===================//
    public function  ustora_product_store(Request $request)
    {
        // dd($request->all());
        $request->validate(
            [
                'cat_id' => 'required',
                'product_name' => 'required',
                'quantity' => 'required',
                'files' => 'required',
                'discount_price' => 'required',
                'price' => 'required',

                'details' => 'required'

            ],
            [
                'cat_id.required' => 'Brand is required',
                'product_name.required' => 'Product Name is required',
                'quantity.required' => 'Quantity is required',
                'files.required' => 'Image is required',
                'discount_price.required' => 'discount price is required',
                'price.required' => 'Price is required',

                'details.required' => 'details is required'
            ]
        );

        if ($request->top_seller == 'on') {
            $top_seller = 1;
        } else {
            $top_seller = 0;
        }
        if ($request->recently_view == 'on') {
            $recently_view = 1;
        } else {
            $recently_view = 0;
        }
        if ($request->top_new == 'on') {
            $top_new = 1;
        } else {
            $top_new = 0;
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
        $data = ProductUstora::insert(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'image' => $imageName, 'discount_price' => $request->discount_price, 'price' => $request->price,  'details' => $request->details, 'top_seller' => $top_seller, 'recently_view' => $recently_view, 'top_new' => $top_new,  'created_at' => $created_at]);
        if ($data) {
            return redirect()->route('ustora-product-list')->with('success', 'Data Insert Successfully.');
        } else {
            return redirect()->route('ustora-product-list')->with('failed', 'Something wrong.');
        }
    }
    //=============== ustoraproduct_delete =====================//
    public function ustoraproduct_delete($id)
    {
        $id = $id;
        $data = ProductUstora::find($id);
        if ($data) {
            $image = $data->image;
            if ($image != '') {
                $path = public_path() . "/images/" . $image;
                unlink($path);
            }
        }
        $data = ProductUstora::find($id)->delete();
        if ($data) {
            return back()->with('delete-success', 'Delete Successfuly.');
        } else {
            return back()->with('delete-failed', 'Something wrong.');
        }
    }
    //==================  product_edit ===================//
    // public function product_edit($id)
    //   {
    //     $ShopCategory = ShopCategory::get();
    //     $Product = Product::find($id);
    //     return view('admin.product_edit', compact('Product', 'ShopCategory'));
    //   }

    //==================Update  product_update==================//
    //   public function  product_update(Request $request)
    //   {

    //     $request->validate(
    //       [
    //         'cat_id' => 'required',
    //         'product_name' => 'required',
    //         'quantity' => 'required',
    //         'price' => 'required',
    //         'Web_ID' => 'required',
    //         'Availability' => 'required',
    //         'Condition' => 'required',
    //         'Brand' => 'required',
    //         'details' => 'required'
    //       ],
    //       [
    //         'cat_id.required' => 'Category is required',
    //         'product_name.required' => 'Product Name is required',
    //         'quantity.required' => 'Quantity is required',
    //         'price.required' => 'Price is required',
    //         'Web_ID.required' => 'Web ID is required',
    //         'Availability.required' => 'Availability is required',
    //         'Condition.required' => 'Condition is required',
    //         'Brand.required' => 'Brand is required',
    //         'details.required' => 'details is required'
    //       ]
    //     );
    //     $id = $request->id;
    //     if ($request->is_features == 'on') {
    //       $is_features = 1;
    //     } else {
    //       $is_features = 0;
    //     }
    //     if ($request->is_recommanded == 'on') {
    //       $is_recommanded = 1;
    //     } else {
    //       $is_recommanded = 0;
    //     }
    //     $updated_at = date("Y-m-d H:i:s");
    //     if ($request->file('files')) {
    //       $imagePath = $request->file('files');
    //       $imageName = time() . '.' . $imagePath->getClientOriginalName();
    //       $destinationPath = public_path('/images');
    //       $imagePath->move($destinationPath, $imageName);
    //       $data = Product::where('id', $id)->update(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'price' => $request->price, 'Web_ID' => $request->Web_ID, 'Availability' => $request->Availability, 'Condition' => $request->Condition, 'Brand' => $request->Brand, 'details' => $request->details, 'is_features' => $is_features, 'is_recommanded' => $is_recommanded, 'image' => $imageName, 'updated_at' => $updated_at]);
    //     } else {
    //       $data = Product::where('id', $id)->update(['cat_id' => $request->cat_id, 'product_name' => $request->product_name, 'quantity' => $request->quantity, 'price' => $request->price, 'Web_ID' => $request->Web_ID, 'Availability' => $request->Availability, 'Condition' => $request->Condition, 'Brand' => $request->Brand, 'details' => $request->details, 'is_features' => $is_features, 'is_recommanded' => $is_recommanded, 'updated_at' => $updated_at]);
    //     }
    //     if ($data) {
    //       return redirect()->route('product-list')->with('update-success', 'Data Update Successfully.');
    //     } else {
    //       return redirect()->route('product-list')->with('failed', 'Something wrong.');
    //     }
    //   }
    //==================  category_list ===================//
    //   public function category_list()
    //   {
    //     return view('admin.category_list');
    //   }
    //   //==================  add_category ===================//
    //   public function add_category()
    //   {
    //     return view('admin.add_category');
    //   }
    //   //==================categrory_store===================//
    //   public function  categrory_store(Request $request)
    //   {
    //     // dd($request->all());
    //     $request->validate(
    //       [
    //         'cat_name' => 'required',

    //       ],
    //       [
    //         'cat_name.required' => 'Category is required'

    //       ]
    //     );

    //     $created_at = date("Y-m-d H:i:s");
    //     $data = ShopCategory::insert(['cat_name' => $request->cat_name, 'created_at' => $created_at]);
    //     if ($data) {
    //       return redirect()->route('category-list')->with('success', 'Data Insert Successfully.');
    //     } else {
    //       return redirect()->route('category-list')->with('failed', 'Something wrong.');
    //     }
    //   }
    //   //==================Update  category_update==================//
    //   public function  category_update(Request $request)
    //   {

    //     $request->validate(
    //       [
    //         'cat_name' => 'required'

    //       ],
    //       [
    //         'cat_name.required' => 'Category is required'
    //       ]
    //     );
    //     $id = $request->id;
    //     $updated_at = date("Y-m-d H:i:s");
    //     $data = ShopCategory::where('id', $id)->update(['cat_name' => $request->cat_name, 'updated_at' => $updated_at]);

    //     if ($data) {
    //       return redirect()->route('category-list')->with('update-success', 'Data Update Successfully.');
    //     } else {
    //       return redirect()->route('category-list')->with('failed', 'Something wrong.');
    //     }
    //   }
    //   //=============== category_delete =====================//
    //   public function category_delete(Request $request)
    //   {
    //     $id = $request->id;
    //     $data = ShopCategory::find($id)->delete();
    //     if ($data) {
    //       return back()->with('delete-success', 'Delete Successfuly.');
    //     } else {
    //       return back()->with('delete-failed', 'Something wrong.');
    //     }
    //   }
}
