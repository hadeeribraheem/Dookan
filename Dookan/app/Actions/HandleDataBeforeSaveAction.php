<?php

namespace App\Actions;

use App\Models\languages;
use Illuminate\Support\Str;

class HandleDataBeforeSaveAction
{
    public static function handle($data)
    {
        /*
        * name = [
        *    'ar' => '',
        *    'en' => ''
        * ]
        * output[name]
        */

        $languages = languages::query()->pluck('prefix'); // ['ar', 'en']

        //$data['price']=100;
        $output = [];

        // Loop through the provided data
        foreach($data as $key => $value) { //ar_name , en_name

            $lang_exist_in_input = 0; // if input has lang

            foreach($languages as $language) {

                //  if the key contains ar_name)
                if (Str::contains($key, $language.'_')) {

                    $input_name = Str::replace($language, '', $key); //  'ar_name' -> '_name'

                    $input_name = Str::replace( '_', '', $input_name); //  '_name' -> 'name'


                    //dd($output[$input_name]);

                    if (!isset($output[$input_name]) || !is_array($output[$input_name])) {
                        $output[$input_name] = [];
                    }

                    $output[$input_name][$language] = $value; // ['name']['ar'] = value

                    $lang_exist_in_input = 1;
                }
            }
            if($lang_exist_in_input == 0) {
                $output[$key] = $value;
            }
        }
        //dd( $output);

        foreach($output as $key => $value) {
            if(is_array($value)) {

                $output[$key] = json_encode($value, flags: JSON_UNESCAPED_UNICODE);

            }
        }
    return $output;
    }
}
