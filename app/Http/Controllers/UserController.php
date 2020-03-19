<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'users' => User::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $request['password'] = Hash::make($request['password']);

            $user = User::create($request->all());

            return response()->json([
                'success' => true,
                'user'   => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return response()->json([
            'success' => true,
            'user'   => $user,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        try {
            $user->update($request->except('password'));
            
            if ($request->password != null) {
                $password = Hash::make($request->password);
                $user->password = $password;
                $user->save();
            } 

            return response()->json([
                'success' => true,
                'user'   => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        try {
            $user->delete();

            return response()->json([
                'success' => true,
                'user'   => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => false, 'message' => $th->getMessage() ]);
        }
    }
}
