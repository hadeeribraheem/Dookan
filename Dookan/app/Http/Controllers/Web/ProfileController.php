<?php

namespace App\Http\Controllers\Web;

use App\Actions\ImageModalSave;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Models\User;
use App\Services\Users\SaveUserInfoService;
use App\Services\Users\UserRegistrationService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $userUpdateService;

    public function __construct(UserRegistrationService $userUpdateService)
    {
        $this->userUpdateService = $userUpdateService;
    }

    public function index(){
        if (auth()->user()->role === 'admin') {
            return view('admin.profile.index');
        }
        elseif (auth()->user()->role === 'seller') {
            return view('seller.profile.index');
        }
        return view('Home.customer_profile.index');
    }

    public function update_user(SaveUserInfoFormRequest $request)
    {
        $data = $request->all();
        $user = Auth::user();

        $file = $request->hasFile('personal_image') ? $request->file('personal_image') : null;

        $user = $this->userUpdateService->updateExistingUser($data, $file, $user->id);

        Flasher::addSuccess('Updated successfully!');
        return redirect()->back();
    }
}
/*
$data = $request->validated();
        $file = request()->file('image');

        // Use the service to register the user
        $this->userRegistrationService->registerUser($data, $file);

        return redirect()->route('login')->with('success', 'User registered successfully');
*/
