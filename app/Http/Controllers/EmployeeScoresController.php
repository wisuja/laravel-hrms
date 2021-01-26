<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\EmployeeScore;
use Illuminate\Http\Request;

class EmployeeScoresController extends Controller
{
    private $employeeScores;
    private $accesses;

    public function __construct()
    {
        $this->employeeScores = resolve(EmployeeScore::class);
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
        $employeeScores = $this->employeeScores->getSimplifiedScores();
        return view('pages.employees-performance-score', compact('accesses','employeeScores'));
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
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeScore $employeeScore)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeScore $employeeScore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmployeeScore $employeeScore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeScore $employeeScore)
    {
        //
    }
}
