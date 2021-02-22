<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeLeaveRequest;
use App\Http\Requests\StoreEmployeeRequest;
use App\Models\EmployeeLeave;
use App\Models\EmployeeLeaveRequest;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeLeaveRequestsController extends Controller
{
    private $employeeLeaveRequests;

    public function __construct()
    {
        $this->middleware('auth');  

        $this->employeeLeaveRequests = resolve(EmployeeLeaveRequest::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeLeaveRequests = $this->employeeLeaveRequests->paginate();

        return view('pages.employees-leave-request', compact('employeeLeaveRequests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.employees-leave-request_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeLeaveRequest $request)
    {
        $employeeLeave = EmployeeLeave::where('employee_id', $request->input('employee_id'))->first();

        $from = Carbon::parse($request->input('from'));
        $to = Carbon::parse($request->input('to'));

        Carbon::setWeekendDays([
            Carbon::SUNDAY,
        ]);

        $diff = $from->diffInWeekdays($to);

        if($employeeLeave->leaves_quota - $employeeLeave->used_leaves < $diff) {
            return back()->with('status', 'You take too much days off.');
        }

        $this->employeeLeaveRequests->create([
            'employee_id' => $request->input('employee_id'),
            'from' => $request->input('from'),
            'to' => $request->input('to'),
            'message' => $request->input('message')
        ]);
        
        Log::create([
            'description' => auth()->user()->employee->name . " created a leave request from '" . $request->input('from') . "' to '" . $request->input('to') . "'"
        ]);

        return redirect()->route('employees-leave-request')->with('status', 'Successfully created an employee leave request.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        $employeeLeaveRequest->load('employee', 'checkedBy');

        $employeeLeave = EmployeeLeave::where('employee_id', $employeeLeaveRequest->employee_id)->first();

        $from = Carbon::parse($employeeLeaveRequest->from);
        $to = Carbon::parse($employeeLeaveRequest->to);

        Carbon::setWeekendDays([
            Carbon::SUNDAY,
        ]);

        $diff = $from->diffInWeekdays($to);

        return view('pages.employees-leave-request_show', compact('employeeLeaveRequest', 'employeeLeave', 'diff'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        return view('pages.employees-leave-request_edit', compact('employeeLeaveRequest'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeLeaveRequest $request, EmployeeLeaveRequest $employeeLeaveRequest)
    {
        if($request->type == 'edit') {
            $this->employeeLeaveRequests->where('id', $employeeLeaveRequest->id)
                ->update([
                'from' => $request->input('from'),
                'to' => $request->input('to'),
                'message' => $request->input('message')
                ]);

            Log::create([
                'description' => auth()->user()->employee->name . " updated a leave request's detail"
            ]);

            return redirect()->route('employees-leave-request')->with('status', 'Successfully updated employee leave request.');
        } else if ($request->type == 'accept') {
            $employeeLeave = EmployeeLeave::where('employee_id', $employeeLeaveRequest->employee_id)->first();

            $from = Carbon::parse($employeeLeaveRequest->from);
            $to = Carbon::parse($employeeLeaveRequest->to);
    
            Carbon::setWeekendDays([
                Carbon::SUNDAY,
            ]);
    
            $diff = $from->diffInWeekdays($to);

            $this->employeeLeaveRequests->where('id', $employeeLeaveRequest->id)
                ->update([
                'status' => 'APPROVED',
                'checked_by' => $request->input('checked_by'),
                'comment' => $request->input('comment')
                ]);

            $employeeLeave->update(['used_leaves' => $employeeLeave->used_leaves + $diff]);

            Log::create([
                'description' => auth()->user()->employee->name . " approved ". $employeeLeaveRequest->employee->name  ."'s leave request from '" . $employeeLeaveRequest->from . "' to '" . $employeeLeaveRequest->to . "'"
            ]);
        
            return redirect()->route('employees-leave-request')->with('status', 'Successfully accepted employee leave request.');
        };
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeLeaveRequest  $employeeLeaveRequest
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeLeaveRequest $employeeLeaveRequest)
    {
        $this->employeeLeaveRequests->where('id', $employeeLeaveRequest->id)
            ->update([
                'status' => 'REJECTED',
                'checked_by' => auth()->user()->employee->id,
                'comment' => request()->input('comment')
            ]);

        Log::create([
            'description' => auth()->user()->employee->name . " rejected ". $employeeLeaveRequest->employee->name  ."'s leave request from '" . $employeeLeaveRequest->from . "' to '" . $employeeLeaveRequest->to . "'"
        ]);
        
        return redirect()->route('employees-leave-request')->with('status', 'Successfully rejected employee leave request.');   
    }

    public function print () 
    {
        $employeeLeaveRequests = EmployeeLeaveRequest::with('employee', 'checkedBy')->latest()->get();

        return view('pages.employees-leave-request_print', compact('employeeLeaveRequests'));
    }
}
