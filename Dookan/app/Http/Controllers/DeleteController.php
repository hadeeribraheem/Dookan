<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {

        //dd($request->all());
        // Check if the model is 'images'
        if (request('model_name') == 'Images') {
            //dd('u here');
            $image = Images::query()->find(request('id'));
            $image->delete();
            DeleteFileFromPublicAction::delete('images', $image->name);

        } else {
            //dd(request('model_name'));
            //dd(request('id'));
            $modelClass = 'App\Models\\' . request('model_name');
            //dd($modelClass);
            $item = $modelClass::query()->find(request('id'));
            //dd($item);
            if ($item){
                $item->delete();
                //DB::select('DELETE FROM '.request('model_name').' WHERE id='.request('id'));

            }

        }


        $is_api_request = $request->route()->getPrefix() === 'api';
        if ($is_api_request) {
            /*        return Messages::success('', __('messages.deleted_successfully'));*/

        }
        else{
            //return redirect()->back()->with('success', __('messages.deleted_successfully'));
            Flasher::addSuccess('successfully deleted!');
            return redirect()->back();
        }

    }
}
