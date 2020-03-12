<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use Illuminate\Http\Request;

class PhoneListController extends Controller
{
    /**
     * Return all users with phone.
     *
     * @return \Illuminate\Http\Response
     */
    public function getPhoneList()
    {
        try {
            $phoneList = User::with('phones', 'company')->get()
            ->makeHidden(['id', 'email_verified_at', 'admin', 'created_at', 'updated_at', 'company_id'])
            ->each(function($user) {
                $user->phones->makeHidden(['id', 'user_id', 'created_at', 'updated_at']);
                $user->company->makeHidden(['id', 'created_at', 'updated_at']);
            });

            return response()->json([
                'success' => true,
                'phone_list' => $phoneList,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => $th->getMessage(),
            ]);
        }

    }
}
