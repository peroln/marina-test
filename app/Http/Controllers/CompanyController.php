<?php

namespace App\Http\Controllers;

use App\Company;
use App\Http\Requests\StoreCompany;
use App\Http\Requests\UpdateCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;
use Yajra\DataTables\Facades\DataTables;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Company::all();
        return view('company.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCompany $request, Company $company)
    {
        $company->fill($request->all());
        if (request()->hasFile('logo'))
        {
            $company->logo = Company::saveLogo();
        }
        try{
            $company->save();
            return redirect()->route('company.index');
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('company.edit', compact(['company']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompany $request, Company $company)
    {
        $company->fill($request->all());
        if (request()->hasFile('logo'))
        {
           $company->logo = Company::saveLogo();
        }

        try{
            $company->save();
            return redirect()->route('company.index');
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
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
        try{
            $company->delete();
            return back();
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    public static function boot() {
        parent::boot();

        static::created(function($item) {

            Event::fire('item.created', $item);

        });

    }
}
