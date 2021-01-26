<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Employee;
use App\Models\EmployeeLeaves;
use Illuminate\Http\Request;

class EmployeeLeavesController extends Controller
{
    private $employees;
    private $accesses;

    public function __construct()
    {
        $this->employees = resolve(Employee::class);
        $this->accesses = resolve(Access::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $accesses = $this->accesses->get(true);
        $employeeLeaves = $this->employees->getEmployeeLeaveData();
        return view('pages.employees-leave', compact('accesses','employeeLeaves'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeLeaves  $employeeLeaves
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLeaves $employeeLeaves)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeLeaves  $employeeLeaves
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLeaves $employeeLeaves)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeLeaves  $employeeLeaves
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeLeaves $employeeLeaves)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeLeaves  $employeeLeaves
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLeaves $employeeLeaves)
    {
        //
    }
}
