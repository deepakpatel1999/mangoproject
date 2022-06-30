<?php

namespace App\Http\Controllers;

use App\Models\TrySomething;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Models\User;
use Validator;

class TrySomethingController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function __construct()
  {
    //$this->middleware('auth');
  }
  //================== try_something New===================//
  public function try_something()
  {
    return view('admin.try_something');
  }

  //==================create_try_somthing===================//
  public function create_try_somthing()
  {
    return view('admin.create_try_somthing');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  //==================Insert Editor Picks===================//
  public function  create_try(Request $request)
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
    $data = TrySomething::insert(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'created_at' => $created_at]);
    if ($data) {
      return redirect()->route('try-something')->with('success', 'Data Insert Successfully.');
    } else {
      return redirect()->route('try-something')->with('failed', 'Something wrong.');
    }
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\TrySomething  $trySomething
   * @return \Illuminate\Http\Response
   */
  public function try_something_update(Request $request)
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
      $data = TrySomething::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'image' => $imageName, 'updated_at' => $updated_at]);
    } else {
      $data = TrySomething::where('id', $id)->update(['title' => $request->title, 'description' => $request->description, 'updated_at' => $updated_at]);
    }
    if ($data) {
      return back()->with('update-success', 'Data Update Successfully.');
    } else {

      return back()->with('failed', 'Something wrong.');
    }
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\TrySomething  $trySomething
   * @return \Illuminate\Http\Response
   */
  //=============== editor_picks_elete =====================//
  public function try_something_delete(Request $request)
  {
    $id = $request->id;
    $data = TrySomething::find($id);

    $image = $data->image;
    if ($image != '') {
      $path = public_path() . "/images/" . $image;
      unlink($path);
    }
    $data = TrySomething::find($id)->delete();
    if ($data) {
      return back()->with('delete-success', 'Delete Successfuly.');
    } else {
      return back()->with('delete-failed', 'Something wrong.');
    }
  }
}
