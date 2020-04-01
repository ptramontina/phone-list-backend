<?php

namespace App\Http\Controllers;

use App\Phone;
use App\User;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return response()->json([
            'success' => true,
            'user' => $user,
            'phones' => Phone::where('user_id', $user->id)->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, Request $request)
    {
        try {
            $request['user_id'] = $user->id;

            $phone = Phone::create($request->all());

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(User $user, Phone $phone)
    {
        return response()->json([
            'success' => true,
            'phone'   => $phone,
            'user'   => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, Phone $phone)
    {
        try {
            $phone->update($request->all());

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Phone $phone)
    {
        try {
            $phone->delete();

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }
}
