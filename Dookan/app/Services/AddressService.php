<?php

namespace App\Services;

use App\Models\UserAddress;

class AddressService
{
    public function storeAddress(array $data, int $userId): UserAddress
    {
       // dd($userId);
        $address = [
            'en' => $data['address_en'],
            'ar' => $data['address_ar'],
        ];

        // save in JSON
        return UserAddress::create([
            'user_id' => $userId,
            'address' => json_encode($address,JSON_UNESCAPED_UNICODE),
        ]);
    }
}
