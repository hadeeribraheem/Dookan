<?php

namespace App\Http\Controllers\Web;

use App\Actions\HandleDataBeforeSaveAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryFormRequest;
use App\Http\Resources\CategoriesResource;
use App\Models\Categories;
use App\Repositories\CategoriesRepository;
use App\Services\TranslationKeyJsonService;
use App\Services\TranslationService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Validator;

class CategoryControllerResource extends Controller
{
    // here still show dont be implemented
    protected $categoryRepository;

    public function __construct(CategoriesRepository $categoryRepository)
    {
        $this->middleware(['auth', 'role:seller,admin'])->except(['index', 'show']);
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = $this->categoryRepository->getAllCategories();
        $categories = CategoriesResource::collection($data)->resolve();
        return view('admin.tables.categories',  compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.insert_data.add_category');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $this->categoryRepository->saveCategory($data);
        return redirect()->back();
        /*$nameTranslations = $keyMap->KeyMapTranslations($data['name']);
        $data['ar_name'] = $nameTranslations['ar'];
        $data['en_name'] = $nameTranslations['en'];

        $descriptionTranslations = $keyMap->KeyMapTranslations($data['description'] ?? '');
        $data['ar_description'] = $descriptionTranslations['ar'];
        $data['en_description'] = $descriptionTranslations['en'];


        $duplicateCategory = Categories::where('name->en', $data['en_name'])->first();

        if ($duplicateCategory) {
            return redirect()->back()->withErrors(['name' => 'A category with this name already exists.']);
        }

        $processedData = HandleDataBeforeSaveAction::handle($data);
        //dd($processedData);
        return $this->save($processedData);*/

    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoryToEdit = $this->categoryRepository->getCategoryById($id);
        $category = CategoriesResource::make($categoryToEdit)->resolve();
        //dd($category);
        return view('admin.edit.edit_category', compact('category'));
    }

    public function update(CategoryFormRequest $request, string $id)
    {
        $data = $request->validated();
        $data['id'] = $id;
        //dd($data);
        $this->categoryRepository->saveCategory($data);
        return redirect()->back();
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
