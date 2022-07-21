<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AllProductShow extends JsonResource
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
      'banner' => asset('/images/' .$this->image),
      'quantity' => $this->quantity,
      'price' => $this->price,
      'Web_ID' => $this->Web_ID,
      'Availability' => $this->Availability,
      'Condition' => $this->Condition,
      'Brand' => $this->Brand,
      'details' => $this->details,
      
      'is_features' => $this->is_features,
      'is_recommanded' => $this->is_recommanded,
      'created_at' => $this->created_at,
      'updated_at' => $this->updated_at ,
    ];
  }
}
