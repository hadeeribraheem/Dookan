<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\ApiProductResource;
use App\Http\Resources\CategoriesResource;
use App\Models\Category;
use App\Models\languages;
use App\Models\Products;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $query = $request->input('query');
        $languages = languages::all();

        // Search in categories
        $blade_categories = Category::query();
        foreach ($languages as $language) {
            $blade_categories->orWhere("name->{$language->prefix}", 'like', "%{$query}%")
                ->orWhere("description->{$language->prefix}", 'like', "%{$query}%");
        }
        $categories = CategoriesResource::collection($blade_categories->get())->resolve();

        // Search in products
        $blade_products = Products::with(['user', 'category', 'images']);
        foreach ($languages as $language) {
            $blade_products->orWhere("name->{$language->prefix}", 'like', "%{$query}%")
                ->orWhere("description->{$language->prefix}", 'like', "%{$query}%");
        }
        $products = ApiProductResource::collection($blade_products->get())->resolve();

        // Search in sellers
        $sellers = User::where('role', 'seller')->where(function ($q) use ($query) {
            $q->where('name', 'like', "%{$query}%");
        })->get();

        return view('Home/search_results', compact('categories', 'products', 'sellers'));
    }}
