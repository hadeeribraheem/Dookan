<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Models\User;
use App\Services\API\Messages;
use App\Services\Users\UserRegistrationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    protected $userUpdateService;

    public function __construct(UserRegistrationService $userUpdateService)
    {
        $this->userUpdateService = $userUpdateService;
    }

    public function update_user(Request $request,$id)
    {
        $data = $request->all();
        $authUser = Auth::user();
        $user = User::find($id);

        if ($authUser->id !== $user->id && $authUser->role !== 'admin') {
            return Messages::error(__('keywords.unauthorized_action'), 403); // Unauthorized action
        }

        $file = $request->hasFile('personal_image') ? $request->file('personal_image') : null;

        $updatedUser  = $this->userUpdateService->updateExistingUser($data, $file, $user->id);

        if ($updatedUser) {
            return Messages::success($updatedUser, __('keywords.user_updated_success'));
        } else {
            return Messages::error(__('keywords.user_update_failed'));
        }
    }
}
