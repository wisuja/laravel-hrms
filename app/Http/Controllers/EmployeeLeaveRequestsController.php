<?php

namespace App\Http\Controllers;

use App\Models\EmployeeLeaveRequest;
use Illuminate\Http\Request;

class EmployeeLeaveRequestsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeLeaveRequest $employeeLeaveRequest)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        //
    }
}
