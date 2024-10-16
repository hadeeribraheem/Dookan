<?php

namespace App\Http\Resources;

use App\Actions\DisplayDataWithCurrentLang;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
            'name' => DisplayDataWithCurrentLang::display($this->name),
            'description' => DisplayDataWithCurrentLang::display($this->description),
            'icon'=>$this->icon,
            'products'=>ApiProductResource::collection($this->whenLoaded('products')),
            //'products'=>$this->whenLoaded('products'),
            'created_at' => $this->created_at->diffForHumans(),
            ];
        return $arr;
    }
}
