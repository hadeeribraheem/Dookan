<?php

namespace App\Repositories\Auth;

use App\Models\User;

class RegisterRepository
{
    // Method to find a user by ID
    public function findUserById($id)
    {
        return User::find($id);
    }

    // Method to create or update user
    public function saveUser(array $data, $id = null)
    {


        return User::query()->updateOrCreate(
            ['id' => $id],
            $data
        );
    }
}
