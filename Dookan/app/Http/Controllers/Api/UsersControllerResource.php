<?php

namespace App\Http\Controllers\Api;

use App\Filters\RoleFilter;
use App\Filters\StatusFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Models\User;
use App\Services\API\Messages;
use App\Services\Users\UserRegistrationService;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class UsersControllerResource extends Controller
{
    protected $userRegistrationService;

    public function __construct(UserRegistrationService $userRegistrationService)
    {
        $this->middleware(['auth:sanctum', 'role:admin']);
        $this->userRegistrationService = $userRegistrationService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::query()
            ->orderBy('id', 'DESC');

        $usersByRole = app(Pipeline::class)
            ->send($data)
            ->through([
                RoleFilter::class,
                StatusFilter::class,
            ])
            ->thenReturn()
            ->get();

        return $usersByRole;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUserInfoFormRequest $request)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
        } else {
            $file = null;
        }

        $newUser = $this->userRegistrationService->registerNewUser($data, $file);
        return Messages::success($newUser,__('keywords.user_create_success'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserInfoFormRequest $request, string $id)
    {
        $data = $request->all();
        $user = User::query()->find($id);

        $file = $request->hasFile('personal_image') ? $request->file('personal_image') : null;

        $user = $this->userRegistrationService->updateExistingUser($data, $file, $user->id);
        return Messages::success($user,__('keywords.user_update_success'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
