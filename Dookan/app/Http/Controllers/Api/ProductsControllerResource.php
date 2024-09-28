<?php

namespace App\Http\Controllers\Api;

use App\Events\ProductsImagesSaveEvent;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Http\Resources\ApiProductResource;
use App\Http\Resources\ProductsResource;
use App\Repositories\ProductsRepository;
use App\Services\API\Messages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductsControllerResource extends Controller
{
    protected $productRepository;

    public function __construct(ProductsRepository $productRepository)
    {
        $this->middleware(['auth:sanctum', 'role:seller,admin'])->except(['index', 'show']);
        $this->productRepository = $productRepository;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = $this->productRepository->getAllProducts();
        return ApiProductResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductFormRequest $request)
    {
        DB::beginTransaction();
        $data = $request->validated();
        $data['user_id'] = Auth::id();

        $result = $this->productRepository->saveProduct($data);

        if (!$result) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => __('keywords.product_save_error'),
            ], 500);
        }

        event(new ProductsImagesSaveEvent($result, $request->file('images') ?? []));
        DB::commit();

        return Messages::success(new ProductsResource($result), __('keywords.product_add_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $productrowdata = $this->productRepository->getProductById($id);

        if (!$productrowdata) {
            Messages::error(__('keywords.product_not_found'));
        }
        $product = ApiProductResource::make($productrowdata);
        return $product;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductFormRequest $request, string $id)
    {
        DB::beginTransaction();
        $result = $this->productRepository->updateProduct($id, $request->except('images'), $request->file('images') ?? []);
        if (!$result || (isset($result['status']) && $result['status'] === 'error')) {
            DB::rollBack();
            Messages::error(__('keywords.product_update_error'));
        }
        DB::commit();
        //dd('here');
        Messages::success([], __('keywords.product_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
