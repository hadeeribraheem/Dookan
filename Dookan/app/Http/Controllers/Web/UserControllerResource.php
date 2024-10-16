<?php

namespace App\Http\Controllers\Web;

use App\Filters\RoleFilter;
use App\Filters\StatusFilter;
use App\Http\Controllers\Controller;
use App\Http\Requests\SaveUserInfoFormRequest;
use App\Models\User;
use App\Services\Users\UserRegistrationService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\DB;

class UserControllerResource extends Controller
{
    protected $userRegistrationService;

    public function __construct(UserRegistrationService $userRegistrationService)
    {
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

        return view('admin.tables.users', compact('usersByRole'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = ['admin', 'customer','seller'];
        $statuses = ['active', 'inactive'];
        return view('admin.insert_data.add_user', compact('roles', 'statuses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SaveUserInfoFormRequest $request)
    {
        $data = $request->validated();
        //dd($data);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
        } else {
            $file = null;
        }

        $this->userRegistrationService->registerNewUser($data, $file);
        //dd($user);
        Flasher::addSuccess(__('keywords.user_create_success'));
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        dd('test show user');

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::query()->find($id);
        $roles = ['admin', 'customer','seller'];
        $statuses = ['active', 'inactive'];
        return view('admin.edit.edit_user', compact('user', 'roles', 'statuses'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SaveUserInfoFormRequest $request, string $id)
    {
        //dd('test update user');

        $data = $request->all();
        $user = User::query()->find($id);

        $file = $request->hasFile('personal_image') ? $request->file('personal_image') : null;

        $user = $this->userRegistrationService->updateExistingUser($data, $file, $user->id);

        Flasher::addSuccess(__('keywords.user_update_success'));
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();
        Flasher::addSuccess('User deleted successfully');
        return redirect()->back();
    }

}
