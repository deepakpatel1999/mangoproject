<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderListUstora extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
   */
  public function toArray($request)
  {
    //return parent::toArray($request);
    return [
      'id' => $this->id,
      'cat_id' => $this->cat_id,
      'product_name' => $this->product_name,
      'banner' => asset('/images/' . $this->image),
      'quantity' => $this->quantity,
      'price' => $this->price,
    
      'top_seller' => $this->top_seller,
      'recently_view' => $this->recently_view,
      'top_new' => $this->top_new,
      'details' => $this->details,

      
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at,

      'product_id' => $this->product_id,
      'payment_status' => $this->payment_status,
      'status' => $this->status,
      'address' => $this->address,
    ];
  }
}
