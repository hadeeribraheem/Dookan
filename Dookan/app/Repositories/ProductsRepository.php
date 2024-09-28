<?php

namespace App\Repositories;

use App\Actions\HandleDataBeforeSaveAction;
use App\Events\ProductsImagesSaveEvent;
use App\Models\Products;
use App\Services\TranslationKeyJsonService;
use Flasher\Laravel\Facade\Flasher;

class ProductsRepository
{
    protected $translateservice;

    public function __construct(TranslationKeyJsonService  $translateservice)
    {
        $this->translateservice = $translateservice;
    }

    public function getAllProducts()
    {
        return Products::with(['user','category','images'])
                        ->orderBy('id','DESC')
                        ->get();

        //return Products::query()->orderBy('id', 'DESC')->get();
    }

    public function getProductById($id){
        return Products::with(['user','category','images'])->find($id);
    }
    public function saveProduct($data)
    {
        $duplicateProduct = Products::where('user_id', auth()->id())
            ->where('sku', $data['sku'])
            ->exists();

        if ($duplicateProduct && !isset($data['id'])) {
            Flasher::addError('You have already added this product.');
            return false;
        }

        $nameTranslations = $this->translateservice->KeyMapTranslations($data['name']);
        $data['ar_name'] = $nameTranslations['ar'];
        $data['en_name'] = $nameTranslations['en'];

        $descriptionTranslations = $this->translateservice->KeyMapTranslations($data['description'] ?? '');
        $data['ar_description'] = $descriptionTranslations['ar'];
        $data['en_description'] = $descriptionTranslations['en'];

        return $this->updateOrcreate($data, $data['id'] ?? null);
    }
    public function updateOrcreate($data, $id){
        $processedData = HandleDataBeforeSaveAction::handle($data);
        //dd($processedData);
        $Product = Products::updateOrCreate(
            ['id' => $processedData['id'] ?? null],
            $processedData
        );

        if ($Product->wasRecentlyCreated) {
            Flasher::addSuccess(__('keywords.product_add_success'));
        } else {
            Flasher::addSuccess(__('keywords.product_update_success'));
        }

        return $Product;
    }
    public function updateProduct($id, $data, $images = [])
    {
        $product = $this->getProductById($id);

        if (sizeof($product->images) == 0 && empty($images)) {
            return [
                'status' => 'error',
                'message' => 'You should upload at least one image'
            ];
        }

        $data['id'] = $id;
        $data['user_id'] = $product->user_id;

        $savedProduct = $this->updateOrCreateProduct($data);

        if ($savedProduct) {
            event(new ProductsImagesSaveEvent($savedProduct, $images));
        }

        return $savedProduct;
    }

    private function updateOrCreateProduct($data)
    {
        $nameTranslations = $this->translateservice->KeyMapTranslations($data['name']);
        $data['ar_name'] = $nameTranslations['ar'];
        $data['en_name'] = $nameTranslations['en'];

        $descriptionTranslations = $this->translateservice->KeyMapTranslations($data['description'] ?? '');
        $data['ar_description'] = $descriptionTranslations['ar'];
        $data['en_description'] = $descriptionTranslations['en'];

        // Process the data before saving
        $processedData = HandleDataBeforeSaveAction::handle($data);
        $processedData['user_id'] = auth()->id();

        // Save the product
        return Products::updateOrCreate(
            ['id' => $processedData['id'] ?? null],
            $processedData
        );
    }

}
/**public function saveProduct($data)
{
// Check if the product already exists for the user
$duplicateProduct = Products::where('user_id', auth()->id())
->where('sku', $data['sku'])
->exists();
//dd($duplicateProduct);
// I use boolean, but it doesn't work -> when update a product, user cant keep the product's same sku
/* if ($duplicateProduct) {
return false;
}*/

/******************************************************************************************************/
/*
 * check if the duplicated product from the same user(same user cant add same product twice)
 * check if this update / create
 *
 * update: (!isset($data['id']) || $duplicateProduct->id != $data['id'])
 *      1- check if the data entered have id -> update
 *      2- if user update product created before, with name exist in db 'this is duplicated too' -> prevent update
 * create:
 *      1- entered data don't have id
 *      2- $duplicateProduct->true
 * */
/******************************************************************************************************/
/*if ($duplicateProduct) {
    return false;
}*/
/*if ($duplicateProduct && (!isset($data['id']) || $duplicateProduct->id != $data['id'])) {
    return [
        'status' => 'duplicate',
        'message' => 'You have already added this product.'
    ];
}*/

// translations
/* $nameTranslations = $this->translateservice->KeyMapTranslations($data['name']);
 $data['ar_name'] = $nameTranslations['ar'];
 $data['en_name'] = $nameTranslations['en'];

 $descriptionTranslations = $this->translateservice->KeyMapTranslations($data['description'] ?? '');
 $data['ar_description'] = $descriptionTranslations['ar'];
 $data['en_description'] = $descriptionTranslations['en'];

 $processedData = HandleDataBeforeSaveAction::handle($data);
 $processedData['user_id'] = auth()->id();

 // Save the product
 $product = Products::updateOrCreate(
     ['id' => $processedData['id'] ?? null],
     $processedData
 );*/

/* if ($product->wasRecentlyCreated) {
     Flasher::addSuccess('Product has been successfully added!');
 } else {
     Flasher::addSuccess('Product has been successfully updated!');
 }

 /*return [
     'status' => 'success',
     'product' => $product
 ];*/
/*        return $product;*/
/*    }*/
