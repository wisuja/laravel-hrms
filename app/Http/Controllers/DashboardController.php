<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Announcement;
use App\Models\Employee;
use App\Models\RecruitmentCandidate;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    private $announcements;
    private $employees;
    private $recruitmentCandidates;
    private $accesses;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        
        $this->announcements = resolve(Announcement::class);
        $this->employees = resolve(Employee::class);
        $this->recruitmentCandidates = resolve(RecruitmentCandidate::class);
        $this->accesses = resolve(Access::class);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $accesses = $this->accesses->get(true);
        $announcements = $this->announcements->paginate();
        $employeesCount = $this->employees->getCount();
        $recruitmentCandidatesCount = $this->recruitmentCandidates->getCount();
        $endingEmployees = $this->employees->getEndingContractEmployees();
        return view('pages.dashboard', compact('accesses','announcements', 'employeesCount', 'recruitmentCandidatesCount', 'endingEmployees'));
    }
}
