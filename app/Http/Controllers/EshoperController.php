<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\E_ShoperBanner;
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
     return back()->with('update-success', 'Data Update Successfully.');
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

}
