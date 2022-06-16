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

    $user = Auth::user();
    $subscriptions = Subscription::Where('user_id', $user->id)->WhereNull('ends_at')->first();
    if ($subscriptions) {
      return redirect()->back()->with('success', 'subscriptions have a already');
    }

    $this->validate($request, [
      'token' => 'required'
    ]);

    $plan = Plans::where('identifier', $request->plan)
      ->orWhere('identifier', 'basic')
      ->first();

    $request->user()->newSubscription($request->plan, $plan->stripe_id)->create($request->token);

    //return redirect()->back()->with('create-success', 'subscriptions Create Successfully');
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
