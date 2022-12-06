<?php

namespace App\Http\Resources;

use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
 * Class ProductResource
 * @package App\Http\Resources\Product
 *
 * @mixin Product
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'category' => new CategoryResource($this->category),
            'images' => ProductImageResource::collection($this->images),
            'name' => $this->name,
            'price' => $this->price,
            'unit' => $this->unit,
            'quantity' => $this->quantity,
            'description' => $this->description,
            'status' => $this->status,
            'slug' => $this->slug,
        ];
    }
}
