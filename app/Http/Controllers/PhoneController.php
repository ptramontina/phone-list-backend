<?php

namespace App\Http\Controllers;

use App\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
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
            'phones' => Phone::all(),
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
            $phone = Phone::create($request->all());

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function show(Phone $phone)
    {
        return response()->json([
            'success' => true,
            'phone'   => $phone,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Phone $phone)
    {
        try {
            $phone->update($request->all());

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Phone  $phone
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        try {
            $phone->delete();

            return response()->json([
                'success' => true,
                'phone'   => $phone,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }
}
