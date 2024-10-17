<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Services\Users\UserRegistrationService;

class RegisterController extends Controller
{
    protected $userRegistrationService;

    public function __construct(UserRegistrationService $userRegistrationService)
    {
        $this->userRegistrationService = $userRegistrationService;
    }

    public function index(){
        return view('auth.register');
    }

    public function save(SaveUserInfoFormRequest $request){
        $data = $request->validated();
        $data['role'] = 'customer';
        $data['status'] = 'active';
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        } else {
            $file = null;
        }

        $user = $this->userRegistrationService->registerNewUser($data, $file);
        //dd($user);
        return redirect()->route('login', ['lang' => app()->getLocale()])->with('success', __('keywords.user_created_successfully'));

    }


}
