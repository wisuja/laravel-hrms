<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDepartmentRequest;
use App\Models\Department;
use App\Models\Log;
use Illuminate\Http\Request;

class DepartmentsController extends Controller
{
    private $departments;

    public function __construct()
    {
        $this->middleware('auth');  
        
        $this->departments = resolve(Department::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departments = $this->departments->paginate();
        return view('pages.departments-data', compact('departments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.departments-data_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDepartmentRequest $request)
    {
        Department::create($request->validated());

        Log::create([
            'description' => auth()->user()->employee->name . " created an department named '" . $request->input('name') . "'"
        ]);

        return redirect()->route('departments-data')->with('status', 'Successfully created a department.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function show(Department $department)
    {
        return view('pages.departments-data_show', compact('department'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function edit(Department $department)
    {
        return view('pages.departments-data_edit', compact('department'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function update(StoreDepartmentRequest $request, Department $department)
    {
        Department::where('id', $department->id)->update($request->validated());

        Log::create([
            'description' => auth()->user()->employee->name . " updated an department named '" . $department->name . "'"
        ]);

        return redirect()->route('departments-data')->with('status', 'Successfully updated department.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Department  $department
     * @return \Illuminate\Http\Response
     */
    public function destroy(Department $department)
    {
        Department::where('id', $department->id)->delete();
        
        Log::create([
            'description' => auth()->user()->employee->name . " deleted an department named '" . $department->name . "'"
        ]);

        return redirect()->route('departments-data')->with('status', 'Successfully deleted department.');
    }

    public function print() {
        $departments = Department::all();
        return view('pages.departments-data_print', compact('departments'));
    }
}
