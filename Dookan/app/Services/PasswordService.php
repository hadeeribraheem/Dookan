<?php

namespace App\Services;

use Illuminate\Support\Facades\Hash;

class PasswordService
{
    // Handle password hashing
    // Handle password hashing
    public function handlePassword($pass)
    {
        if (!empty($data['password'])) {
            return(Hash::make($pass));
        } else {
            // If the password field is empty, remove it from the $data array
           unset($pass);
        }
    }
}
