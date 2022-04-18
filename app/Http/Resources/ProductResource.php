<?php

namespace App\Http\Resources;

class ProductResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->whenPresent('id'),
            'sku' => $this->whenPresent('uuid'),
            'name' => $this->whenPresent('name'),
            'quantity' => $this->whenPresent('quantity'),
            'history' => $this->whenPresent('history'),
        ];
    }
}
