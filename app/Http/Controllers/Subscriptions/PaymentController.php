<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Plans;
use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PaymentController extends Controller
{
  public function index()
  {

    $data = [
      'intent' => auth()->user()->createSetupIntent()
    ];

    return view('subscriptions.payment')->with($data);
  }

  public function store(Request $request)
  { 
   $plan = $request->plan;
  // dd($request);  
   $user = Auth::user();
   $subscriptions = Subscription::Where('user_id', $user->id)->WhereNull('ends_at')->first();
   if ($subscriptions) {
     $id = $subscriptions->id;
     $plan_name = $subscriptions->name;
     $stripe_price = $subscriptions->stripe_price;
     
     if ($user->subscribed($plan_name)) {
      $user->subscription($plan_name)->swap($plan);
     // $user->subscription('default')->noProrate()->removePrice($plan_name);
      $name_update = Subscription::where("id", $id)->update(["name" => $plan]);
      
      return redirect()->back()->with('success', 'subscriptions upgrade');

    }
  }
    // $user = Auth::user();
    // $subscriptions = Subscription::Where('user_id', $user->id)->WhereNull('ends_at')->first();
    // if ($subscriptions) {
    //   return redirect()->back()->with('success', 'subscriptions have a already');
    // }

  $this->validate($request, [
    'token' => 'required'
  ]);
  //dd('helo');
  $plan = Plans::where('identifier', $request->plan)
  ->orWhere('identifier', 'basic')
  ->first();

  $request->user()->newSubscription($request->plan, $plan->stripe_id)->create($request->token);

  return redirect('/plans')->with('create-success', 'subscriptions Create Successfully!');
}
public function upgrade_subcription($id)
{

  $data = [
    'intent' => auth()->user()->createSetupIntent()
  ];

  return view('subscriptions.payment')->with($data, $id);
}
}
