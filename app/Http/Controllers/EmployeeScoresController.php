<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEmployeeScoreRequest;
use App\Models\Employee;
use App\Models\EmployeeScore;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmployeeScoresController extends Controller
{
    private $employeeScores;

    public function __construct()
    {
        $this->middleware('auth');  
        
        $this->employeeScores = resolve(EmployeeScore::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employeeScores = $this->employeeScores->getSimplifiedScores();
        return view('pages.employees-performance-score', compact('employeeScores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = $this->employeeScores->getDataToCreate();

        $employees = $data["employees"]->filter(function($employee) {
            return $employee->id !== auth()->user()->employee->id;
        });
        
        $scoreCategories = $data["scoreCategories"];

        return view('pages.employees-performance-score_create', compact('employees', 'scoreCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEmployeeScoreRequest $request)
    {
        if($this->employeeScores->where('employee_id', $request->input('employee_id'))->whereBetween('created_at', [Carbon::today()->subMonth(), Carbon::tomorrow()])->exists()) {
            return redirect()->route('employees-performance-score')->with('status', 'You can only score same employee for once in a month.');
        }        
        
        $group_id = Str::uuid();

        foreach($request->categoryAndScore as $cns) {
            EmployeeScore::create([
                'group_id' => $group_id,
                'employee_id' => $request->input('employee_id'),
                'score_category_id' => $cns["id"],
                'score' => $cns["score"],
                'scored_by' => auth()->user()->employee->id
            ]);
        }

        $employeeName = Employee::whereId($request->input('employee_id'))->first()->name;

        Log::create([
            'description' => auth()->user()->employee->name . " created performance scores for employee named '" . $employeeName . "'"
        ]);

        return redirect()->route('employees-performance-score')->with('status', "Successfully added an employee's score");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function show(EmployeeScore $employeeScore)
    {
        $scores = $this->employeeScores->getEmployeeScoreDetail($employeeScore->group_id);

        return view('pages.employees-performance-score_show', compact('employeeScore', 'scores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function edit(EmployeeScore $employeeScore)
    {
        $data = $this->employeeScores->getDataToCreate();

        $employees = $data["employees"]->filter(function($employee) {
            return $employee->id !== auth()->user()->employee->id;
        });
        
        $scoreCategories = $data["scoreCategories"];

        $scores = $this->employeeScores->getEmployeeScoreDetail($employeeScore->group_id);

        return view('pages.employees-performance-score_edit', compact('employees', 'scoreCategories', 'scores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEmployeeScoreRequest $request, EmployeeScore $employeeScore)
    {
        foreach($request->categoryAndScore as $cns) {
            EmployeeScore::where([
                    ['group_id','=',$employeeScore->group_id],
                    ['score_category_id','=',$cns["id"]],
                    ['employee_id', '=', $request->input('employee_id')],
                    ['scored_by', '=', auth()->user()->employee->id],
                ])
                ->update([
                'score' => $cns["score"]
            ]);
        }

        $employeeName = Employee::whereId($request->input('employee_id'))->first()->name;

        Log::create([
            'description' => auth()->user()->employee->name . " updated performance scores for employee named '" . $employeeName . "'"
        ]);

        return redirect()->route('employees-performance-score')->with('status', "Successfully updated employee's score");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmployeeScore  $employeeScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmployeeScore $employeeScore)
    {
        EmployeeScore::where('group_id', $employeeScore->group_id)->delete();

        $employeeName = Employee::whereId($employeeScore->employee_id)->first()->name;

        Log::create([
            'description' => auth()->user()->employee->name . " deleted performance scores for employee named '" . $employeeName . "'"
        ]);

        return redirect()->route('employees-performance-score')->with('status', "Successfully deleted employee's score");
    }

    public function print () {
        $employeeScores = EmployeeScore::latest()->groupBy('group_id')->get();

        foreach ($employeeScores as $score) {
            $scoreDetail = $score->getEmployeeScoreDetail($score->group_id);

            $total = 0;
            foreach($scoreDetail as $scr) {
                $total += $scr->score;
            }

            $total /= count($scoreDetail);

            $score["score"] = $total;
        }

        return view('pages.employees-performance-score_print', compact('employeeScores'));
    }
}
