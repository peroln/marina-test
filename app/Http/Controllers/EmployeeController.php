<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\Http\Requests\StoreEmployee;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateEmployee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Employee::with('company')->get();

        return view('employee.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Company::pluck('name','id');
        return view('employee.create', compact(['companies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployee $request, Employee $employee)
    {

        $employee->fill($request->all());
        try{
            $employee->save();
            return redirect()->route('employee.index');
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        $companies = Company::pluck('name','id');
        return view('employee.edit', compact(['employee','companies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateEmployee $request, Employee $employee)
    {
        $employee->fill($request->all());
        try{
            $employee->save();
            return redirect()->route('employee.index');
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        try{
            $employee->delete();
            return back();
        }catch(\Exception $e){
            return back()->withError($e->getMessage())->withInput();
        }
    }
}
