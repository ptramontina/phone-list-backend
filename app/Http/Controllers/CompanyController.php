<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
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
            'companies' => Company::all(),
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
            $company = Company::create($request->all());

            return response()->json([
                'success' => true,
                'company'   => $company,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return response()->json([
            'success' => true,
            'company'   => $company,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        try {
            $company->update($request->all());

            return response()->json([
                'success' => true,
                'company'   => $company,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        try {
            $company->delete();

            return response()->json([
                'success' => true,
                'company'   => $company,
            ]);
        } catch (\Throwable $th) {
            return response()->json([ 'success' => true, 'message' => $th->getMessage() ]);
        }
    }
}
