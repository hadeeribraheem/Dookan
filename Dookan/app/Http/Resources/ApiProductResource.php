<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $arr =  [
            'id' => $this->id,
            'status' => $this->status,
            'sku' => $this->sku,
            'user_name' => $this->whenLoaded('user', function () {
                return $this->user->name;
            }),
            'category_name' => $this->whenLoaded('category', function () {
                return DisplayDataWithCurrentLang::display($this->category->name);
            }),
            // collection of image
            'image' => ImageResource::collection($this->whenLoaded('images')),
            'name' => DisplayDataWithCurrentLang::display($this->name),
            'description' => DisplayDataWithCurrentLang::display($this->description),
            'price' => $this->price,
            'quantity' => $this->quantity,
            'created_at' => $this->created_at->diffForHumans(),
        ];

        return $arr;
    }
}
