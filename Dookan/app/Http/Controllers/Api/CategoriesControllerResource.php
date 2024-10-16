<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Resources\CategoriesResource;
use App\Repositories\CategoriesRepository;
use App\Services\API\Messages;
use Illuminate\Http\Request;

class CategoriesControllerResource extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoryRepository)
    {
        $this->middleware(['auth:sanctum', 'role:seller,admin'])->except(['index', 'show']);
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoryRepository->getAllCategories();
        $categories = CategoriesResource::collection($data)->resolve();
        return $categories;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $new_category = $this->categoryRepository->saveCategory($data);
        return Messages::success($new_category,__('keywords.category_added_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoryById = $this->categoryRepository->getCategoryById($id);
        $category = CategoriesResource::make($categoryById)->resolve();
        //dd($category['products']);

        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryFormRequest $request, string $id)
    {
        $data = $request->validated();
        $data['id'] = $id;
        $category = $this->categoryRepository->saveCategory($data);
        if (!($category->wasRecentlyCreated)) {
            return Messages::success($category, __('keywords.category_updated_success'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
