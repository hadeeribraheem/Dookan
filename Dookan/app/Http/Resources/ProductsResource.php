<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $arr = [
            'id' => $this->id,
            'sku'=> $this->sku,

            'user_name' => $this->whenLoaded('user', function () {
                return $this->user->name;
            }),
            'category_name' => $this->whenLoaded('category', function () {
                return DisplayDataWithCurrentLang::display($this->category->name);
            }),

            'image' => ImageResource::make($this->whenLoaded('images')),

            'name' => DisplayDataWithCurrentLang::display($this->name),
            'description' => DisplayDataWithCurrentLang::display($this->description),

            'price'=>$this->price,
            'quantity'=>$this->quantity,
            'created_at' => $this->created_at->diffForHumans(),
        ];
        if (request()->hasHeader('lang')&& request()->header('lang') !='all'){
            $arr['name'] = DisplayDataWithCurrentLang::display($this->name);
            $arr ['description'] = DisplayDataWithCurrentLang::display($this->description);
        }

        return $arr;
    }
}
