<?php

namespace App\Http\Controllers\API;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Store;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function store(Request $request)
    {
        try {
            // validasi user 
            $user = auth()->id();
            $store = Store::where('user_id', $user)->first();

            if ($store) {
                return ResponseFormatter::error([
                    $store,
                ], 'User already has a store', 404);
            }
            Store::create([
                'user_id' => auth()->id(),
                'name' => $request->name,
                'email' => $request->name,
                'phone_no' => $request->phone_no,
                'bank_name' => $request->bank_name,
                'bank_no' => $request->bank_no,
                'account_name' => $request->account_name,
                'address' => $request->address,
                'city' => $request->city,
                'province' => $request->province,
                'postal_code' => $request->postal_code,
            ]);

            $store = Store::where('user_id', auth()->id())->first();
            // dd($store);
            return ResponseFormatter::success($store->toArray(), 'Store Created');

        } catch (\Exception $error) {
            // dd($error);
            return ResponseFormatter::error([
                'message' => 'something went wrong',
                'error' => $error,
            ], 'Authentication Failed', 500);
        }
    }


    public function all(Request $request, Store $store)
    {
        try {
            $user = auth()->user();
            $store = $user->store;
    
            if ($store) {
                return ResponseFormatter::success($store, 'Store data loaded');
            } else {
                return ResponseFormatter::error([
                    'message' => 'Store not found',
                ], 'Store not found', 404);
            }
    
        } catch (\Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
            ], 'Internal Server Error', 500);
        }
    }
}
