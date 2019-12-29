<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Company;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Company $company)
    {
      $employees = Employee::where('company_id', $company->id)->get();
      return view('employees.index', compact('employees', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Company $company)
    {
      return view('employees.create', compact('company'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Company $company)
    {
      $validData = $this->validate($request, [
        'first_name' => 'required|min:3|max:255',
        'last_name' => 'required|min:3|max:255',
        'email' => 'required|email',
        'phone' => 'required'
      ]);

      $employee = $company->employees()->create($validData);

      return redirect(route('employees.index', $company));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company, Employee $employee)
    {
      return view('employees.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company, Employee $employee)
    {
      return view('employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company, Employee $employee)
    {
      $validData = $this->validate($request, [
        'first_name' => 'required|min:3|max:255',
        'last_name' => 'required|min:3|max:255',
        'phone' => 'required',
        'email' => 'required|email'
      ]);
      $employee->update($validData);

      return redirect(route('employees.show', [$company, $employee]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->destroy();
        return redirect(route('employees.index', [$employee->company]));
    }
}
