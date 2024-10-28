<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'order_id' => $this->id,
            'user_id' => $this->user_id,
            'user_name' => $this->user ? $this->user->name : null,
            'status' => $this->status,
            'total_price' => $this->total_price,
            'created_at' => $this->created_at->diffForHumans(),
            'shipping_address' => DisplayDataWithCurrentLang::display($this->address->address),
            'order_items' => OrderItemResource::collection($this->whenLoaded('items'))->toArray($request), // use to array to return data as arr not object to make it easy to access
        ];
    }
}
