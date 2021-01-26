<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
use App\Models\EmployeeLeave;
use App\Models\EmployeeScore;
use App\Models\Position;
use App\Models\Recruitment;
use App\Models\RecruitmentCandidate;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    private $announcements;
    private $employees;
    private $departments;
    private $positions;
    private $employeeScores;
    private $recruitments;
    private $recruitmentCandidates;
    private $attendances;
    private $users;
    private $roles;
    private $accesses;

    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');

        $this->announcements = resolve(Announcement::class);
        $this->employees = resolve(Employee::class);
        $this->departments = resolve(Department::class);
        $this->positions = resolve(Position::class);
        $this->employeeScores = resolve(EmployeeScore::class);
        $this->recruitments = resolve(Recruitment::class);
        $this->recruitmentCandidates = resolve(RecruitmentCandidate::class);
        $this->attendances = resolve(Attendance::class);
        $this->users = resolve(User::class);
        $this->roles = resolve(Role::class);
        $this->accesses = resolve(Access::class);
    }

    public function index () {
        $announcements = $this->announcements->get();
        $recruitments = $this->recruitments->get();
        return view('pages.welcome', compact('announcements', 'recruitments'));
    }

    public function dashboard () {
        $accesses = $this->accesses->get(true);
        $announcements = $this->announcements->paginate();
        $employeesCount = $this->employees->getCount();
        $recruitmentCandidatesCount = $this->recruitmentCandidates->getCount();
        $endingEmployees = $this->employees->getEndingContractEmployees();
        return view('pages.dashboard', compact('accesses','announcements', 'employeesCount', 'recruitmentCandidatesCount', 'endingEmployees'));
    }

    public function employeesData () {
        $employees = $this->employees->get();
        $accesses = $this->accesses->get(true);
        return view('pages.employees-data', compact('accesses','employees'));
    }

    public function departmentsData () {
        $departments = $this->departments->get();
        $accesses = $this->accesses->get(true);
        return view('pages.departments-data', compact('accesses','departments'));
    }

    public function positionsData () {
        $positions = $this->positions->get();
        $accesses = $this->accesses->get(true);
        return view('pages.positions-data', compact('accesses','positions'));
    }

    public function employeesPerformanceScore () {
        $accesses = $this->accesses->get(true);
        $employeeScores = $this->employeeScores->getSimplifiedScores();
        return view('pages.employees-performance-score', compact('accesses','employeeScores'));
    }

    public function employeesLeave () {
        $accesses = $this->accesses->get(true);
        $employeeLeaves = $this->employees->getEmployeeLeaveData();
        return view('pages.employees-leave', compact('accesses','employeeLeaves'));
    }

    public function attendances () {
        $attendances = $this->attendances->get();
        $accesses = $this->accesses->get(true);
        return view('pages.attendances', compact('accesses','attendances'));
    }

    public function announcements () {
        $accesses = $this->accesses->get(true);
        $announcements = $this->announcements->paginate();
        return view('pages.announcements', compact('accesses','announcements'));
    }

    public function recruitments () {
        $accesses = $this->accesses->get(true);
        $recruitments = $this->recruitments->paginate();
        return view('pages.recruitments', compact('accesses','recruitments'));
    }

    public function users () {
        $accesses = $this->accesses->get(true);
        $users = $this->users->get();
        return view('pages.users', compact('accesses','users'));
    }

    public function roles () {
        $accesses = $this->accesses->get(true);
        $roles = $this->roles->get();
        return view('pages.roles', compact('accesses','roles'));
    }

    public function profile () {
        $accesses = $this->accesses->get(true);
        $profile = $this->users->getProfile();
        return view('pages.profile', compact('accesses','profile'));
    }
}
