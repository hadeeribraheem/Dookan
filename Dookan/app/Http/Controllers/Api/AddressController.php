<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainUserAddressRequest;
use App\Http\Requests\UserAddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;
use App\Services\AddressService;
use App\Services\API\Messages;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }
    public function index()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $addressesResource = UserAddressResource::collection($addresses)->resolve();

        return Messages::success($addressesResource, __('keywords.address_fetched_successfully'));
    }
    public function store(UserAddressRequest $request)
    {
        $data = $request->validated();

        $savedAddress = $this->addressService->storeAddress($data, auth()->id());

        return Messages::success($savedAddress, __('keywords.address_success'));
    }
    public function select(MainUserAddressRequest $request)
    {
        $selectedAddressId = $request->validated();

        $selectedAddressId = (int)$selectedAddressId['selected_address'];
        $address = UserAddress::find($selectedAddressId);

        if ($address->user_id == auth()->id()) {
            $user = auth()->user();
            $user->default_address_id = $selectedAddressId;
            $user->save();

            return Messages::success($user, __('keywords.address_default_success'));
        }
        return Messages::error(__('keywords.unauthorized'));
    }


}
