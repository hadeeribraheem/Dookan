<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderItemResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->order_id,
            'product_id' => $this->product_id,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'created_at' => $this->created_at->toDateString(),
            'created_at_human' => $this->created_at->diffForHumans(),
            'product' => ApiProductResource::make($this->whenLoaded('product'))->toArray($request), //every order item has 1 product so we use make
        ];
    }
}
