<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class WishlistResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $arr = [
            'id'=> $this->id,
            'category_name' => $this->whenLoaded('product', function () {
                return DisplayDataWithCurrentLang::display(($this->product->category)->name);
            }),
            'image' => ImageResource::collection($this->whenLoaded('product', function () {
                return $this->product->images;
            })),
            'product_id'=> (($this->product)->id),
            'name' => DisplayDataWithCurrentLang::display(($this->product)->name),
            'price'=> ($this->product)->price,
            'status'=>($this->product)->status,
        ];

        return $arr;
    }
}
