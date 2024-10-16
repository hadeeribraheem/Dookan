<?php

namespace App\Http\Controllers\Web;

use App\Actions\HandleDataBeforeSaveAction;
use App\Events\ProductsImagesSaveEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Http\Resources\CategoriesResource;
use App\Http\Resources\ProductsResource;
use App\Models\Category;
use App\Models\Products;
use App\Repositories\ProductsRepository;
use App\Services\TranslationKeyJsonService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsControllerResource extends Controller
{
    protected $productRepository;

    public function __construct(ProductsRepository $productRepository)
    {
        $this->middleware(['auth', 'role:seller,admin'])->except(['index', 'show']);
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        $productsResource = ProductsResource::collection($products)->resolve();
        if (auth()->check()) {
            if (auth()->user()->role === 'admin') {
                return view('admin.tables.products', compact('productsResource'));
            }
        }
            return view('Home.all_products', compact('productsResource'));


        /*$data = Products::query()->orderBy('id','DESC')
            ->get();

        $products = ProductsResource::collection($data)->resolve();
        return view('admin.tables.products',  compact('products'));*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       // dd(auth()->user());

        $data = Category::all();
        $categories = CategoriesResource::collection($data)->resolve();
        //dd($categories);
        if (auth()->user()->role === 'seller') {
            return view('seller.insert.add_product', compact('categories'));
        }
        return view('admin.insert_data.add_product',compact('categories'));
    }
   /* public function save($data)
    {
        $result = $this->productRepository->saveProduct($data);
        //dd($result);
        if(!$result){
            Flasher::addError('You have already added this product.');
            return redirect()->back();

        }
        /* if ($result['status'] === 'duplicate') {
             //dd('duplicated');
             Flasher::addError($result['message']);
             return redirect()->back();
         }*/
        //dd('check u aaree here');
        //eturn $result;

        /*$product = Products::updateOrCreate(
            ['id' => $data['id'] ?? null],
            $data
        );

        if ($product->wasRecentlyCreated) {
            Flasher::addSuccess('Product has been successfully added!');
        } else {
            Flasher::addSuccess('Product has been successfully updated!');
        }

        return redirect()->back();
    }*/
    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['user_id'] = Auth::id();
        //dd($data);
        $result = $this->productRepository->saveProduct($data);

        if (!$result) {
            DB::rollBack();
            Flasher::addError(__('keywords.product_save_error'));
            return redirect()->back();
        }
        event(new ProductsImagesSaveEvent($result, $request->file('images') ?? []));

        DB::commit();


        return redirect()->back();

       /* $data = $request->validated();
        $result = $this->save($data);
       /* if ($result['status'] === 'success') {
            event(new ProductsImagesSaveEvent($result['product'], $request->file('images') ?? []));
        }
        if($result){
            event(new ProductsImagesSaveEvent($result['product'], $request->file('images') ?? []));
        }
        return redirect()->back();*/

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productrowdata = $this->productRepository->getProductById($id);
        $product = ProductsResource::make($productrowdata)->resolve();

       //dd($product);
        return view('Home.show_product',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Category::all();
        $categories = CategoriesResource::collection($data)->resolve();

        $productToEdit = $this->productRepository->getProductById($id);
        $product = ProductsResource::make($productToEdit)->resolve();

        if (auth()->user()->role === 'seller') {
            return view('seller.edit.edit_product', compact('product','categories'));
        }
        //dd($product['image']);
        //dd($product['image'][0]['id']);
        return view('admin.edit.edit_product', compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
        DB::beginTransaction();
        $result = $this->productRepository->updateProduct($id, $request->except('images'), $request->file('images') ?? []);

        if (!$result || (isset($result['status']) && $result['status'] === 'error')) {
            DB::rollBack();  //failed
            Flasher::addError($result['message'] ?? __('keywords.product_update_error'));
            return redirect()->back();
        }

        DB::commit();

        Flasher::addSuccess(__('keywords.product_update_success'));
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
