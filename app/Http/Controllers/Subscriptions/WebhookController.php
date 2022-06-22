<?php

namespace App\Http\Controllers\Subscriptions;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Http\Controllers\WebhookController as CashierController;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Subscription;
use Illuminate\Support\Facades\Auth;
use Laravel\Cashier\Cashier;

class WebhookController extends CashierController
{
  /**
   * Handle customer subscription updated.
   *
   * @param  array  $payload
   * @return \Symfony\Component\HttpFoundation\Response
   */
  protected function handleCustomerSubscriptionCreated(array $payload)
  {
    $customer = $payload['data']['object']['customer'];

    // handle the incoming event...

    return new Response('Webhook Handled', 200);
  }

  protected function handleCustomerSubscriptionUpdated(array $payload)
  {

    $customer = $payload['data']['object']['customer'];

    // handle the incoming event...

    return new Response('Webhook Handled', 200);
  }

  protected function handleCustomerSubscriptionDeleted(array $payload)
  {
    $customer = $payload['data']['object']['customer'];

    $user = Cashier::findBillable($customer);
    Log::info($user);
    if ($user) {
      $id = $user->id;
      $ends_at = date("Y-m-d h:i:s");
      Log::info($ends_at);

      $update = Subscription::where([['user_id', '=', $id], ['stripe_status', '=', 'active']])->update(["ends_at" => $ends_at, "stripe_status" => 'canceled']);
      Log::info($update);
    }
    return new Response('Webhook Handled', 200);
  }
}
