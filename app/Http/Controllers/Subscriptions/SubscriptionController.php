<?php

namespace App\Http\Controllers\Subscriptions;

use App\Models\Plans;
use App\Models\Subscription;
use DB;
use App\Http\Controllers\Controller;
use Auth;

class SubscriptionController extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $subscriptions = Subscription::Where('user_id', $user->id)->WhereNull('ends_at')->first();
    if ($subscriptions) {
      $plan = $subscriptions->name;

      $plans = Plans::where('identifier', '!=', $plan)->get();
    } else {

      $plans = Plans::get();
    }

    return view('subscriptions.plans', compact('plans', 'subscriptions'));
  }

  public function subscriptions_list()
  {
    $id = Auth::user()->id;

    $subscription = DB::table('subscriptions')->where('user_id', $id)->orderBy('id', 'DESC')->get();

    return view('subscriptions.subscriptions_list', compact('subscription'));
  }

  public function canceled()
  {
    $user = Auth::user();
    $subscriptions = Subscription::Where('user_id', $user->id)->WhereNull('ends_at')->first();
    if ($subscriptions) {
      $plan_name = $subscriptions->name;
      if ($user->subscribed($plan_name)) {
        $user->subscription($plan_name)->cancelNow();
      }
    }
    return redirect('/plans')->with('cancel', 'subscriptions Cancel Successfully!');
  }

  public function upgrate($id)
  {
    $subscription_id = $id;
    $plans = Plans::get();
    return view('subscriptions.plans', compact('plans', 'subscription_id'));
  }
}
