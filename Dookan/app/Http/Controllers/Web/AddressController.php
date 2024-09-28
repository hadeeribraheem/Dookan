<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\MainUserAddressRequest;
use App\Http\Requests\UserAddressRequest;
use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;
use App\Services\AddressService;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    protected $addressService;

    public function __construct(AddressService $addressService)
    {
        $this->addressService = $addressService;
    }

    public function create()
    {
        $addresses = UserAddress::where('user_id', auth()->id())->get();
        $addressesResource = UserAddressResource::collection($addresses)->resolve();

        return view('Home.customer_profile.address', compact('addressesResource'));
    }

    public function store(UserAddressRequest $request)
    {
        $data = $request->validated();

        $savedAddress = $this->addressService->storeAddress($data, auth()->id());

        Flasher::addSuccess(__('keywords.address_success'));

        return redirect()->back()->with(compact('savedAddress'));
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

            Flasher::addSuccess(__('keywords.address_default_success'));
            return redirect()->back();
        }

        Flasher::addError(__('keywords.unauthorized'));
        return redirect()->back();
    }
}
