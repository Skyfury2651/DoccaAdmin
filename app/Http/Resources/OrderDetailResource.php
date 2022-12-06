<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderDetailResource extends JsonResource
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
            'id' => $this->id,
            'total_amount' => $this->total_amount,
            'shipper' => new UserResource($this->shipper),
            'user' => new UserResource($this->user),
            'status' => $this->status,
            'order_products' => OrderProductResource::collection($this->orderProducts),
        ];
    }
}
