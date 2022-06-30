<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
  /**
   * Handle received Stripe webhooks.
   *
   * @param  \Laravel\Cashier\Events\WebhookReceived  $event
   * @return void
   */
  public function handle(WebhookReceived $event)
  {  
    
    if ($event->payload['type'] === 'invoice.payment_succeeded') {
      // Handle the incoming event...
    }
  }
}
