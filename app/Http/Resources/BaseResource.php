<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * @param $attribute
     * @return \Illuminate\Http\Resources\MissingValue|mixed
     */
    public function whenPresent($attribute)
    {
        return $this->when($this->$attribute !== null, $this->$attribute);
    }
}
