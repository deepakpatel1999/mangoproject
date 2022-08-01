<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShowCartUstora extends JsonResource
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
      'product_name' => $this->product_name,
      'banner' => asset('/images/' . $this->image),
      'price' => $this->price,
      
      'quant' => $this->quant,
      'cart_id' => $this->cart_id,

      // 'created_at' => $this->created_at,
      // 'updated_at' => $this->updated_at ,
    ];
  }
}
