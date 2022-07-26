<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Shop_banner_show extends JsonResource
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
      'title' => $this->title,
      'description' => $this->description,
      'banner' => asset('/images/' .$this->banner),
      // 'created_at' => $this->created_at->format('m/d/Y'),
      // 'updated_at' => $this->updated_at->format('m/d/Y'),
    ];
  }
}