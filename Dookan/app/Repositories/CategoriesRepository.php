<?php

namespace App\Repositories;

use App\Actions\HandleDataBeforeSaveAction;
use App\Models\Categories;
use App\Services\TranslationKeyJsonService;
use App\Services\TranslationService;
use Flasher\Laravel\Facade\Flasher;

class CategoriesRepository
{
     protected $translateservice;

     public function __construct(TranslationKeyJsonService  $translateservice)
     {
            $this->translateservice = $translateservice;
     }
     public function getAllCategories(){
            return Categories::query()->orderBy('id', 'DESC')->get();
     }
     public function getCategoryById($id){
         return Categories::query()->find($id);
     }
     public function saveCategory($data)
     {
         // translations
         $nameTranslations = $this->translateservice->KeyMapTranslations($data['name']);
         $data['ar_name'] = $nameTranslations['ar'];
         $data['en_name'] = $nameTranslations['en'];

         $descriptionTranslations = $this->translateservice->KeyMapTranslations($data['description'] ?? '');
         $data['ar_description'] = $descriptionTranslations['ar'];
         $data['en_description'] = $descriptionTranslations['en'];

         // duplicate category
         $duplicateCategory = $this->findByName($data['en_name']);
         if ($duplicateCategory&& !(isset($data['id']))) {
             Flasher::addError(__('keywords.category_exists_error'));
             return redirect()->back();
         }
         return $this->updateOrCreate($data, $data['id'] ?? null);
     }

     public function updateOrcreate($data, $id){
         $processedData = HandleDataBeforeSaveAction::handle($data);
         $category = Categories::updateOrCreate(
             ['id' => $processedData['id'] ?? null],
             $processedData
         );

         if ($category->wasRecentlyCreated) {
             Flasher::addSuccess(__('keywords.category_added_success'));
         } else {
             Flasher::addSuccess(__('keywords.category_updated_success'));
         }

         return $category;
     }
    public function findByName($name)
    {
        return Categories::where('name->en', $name)
            ->orWhere('name->ar', $name)
            ->first();
    }
}
