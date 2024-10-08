<?php

namespace App\Http\Controllers;

use App\Actions\DeleteFileFromPublicAction;
use App\Models\Images;
use App\Services\API\Messages;
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
        if (request('model_name') == 'Images') {
            $image = Images::query()->find(request('id'));
            $image->delete();
            DeleteFileFromPublicAction::delete('images', $image->name);
        } else {
            $modelClass = 'App\Models\\' . request('model_name');
            $item = $modelClass::query()->find(request('id'));
            if ($item){
                $item->delete();
                //DB::select('DELETE FROM '.request('model_name').' WHERE id='.request('id'));
            }
        }

        $is_api_request = $request->route()->getPrefix() === 'api';
        if ($is_api_request) {
            return Messages::success('', __('keywords.deleted_successfully'));
        }
        else{
            //return redirect()->back()->with('success', __('messages.deleted_successfully'));
            Flasher::addSuccess(__('messages.deleted_successfully'));
            return redirect()->back();
        }

    }
}
