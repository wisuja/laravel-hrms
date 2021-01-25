<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Attendance;
use App\Models\Department;
use App\Models\Employee;
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
    private $recruitments;
    private $recruitmentCandidates;
    private $employeeScores;
    private $attendances;
    private $users;
    private $roles;

    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');

        $this->announcements = resolve(Announcement::class);
        $this->employees = resolve(Employee::class);
        $this->departments = resolve(Department::class);
        $this->positions = resolve(Position::class);
        $this->recruitments = resolve(Recruitment::class);
        $this->recruitmentCandidates = resolve(RecruitmentCandidate::class);
        $this->employeeScores = resolve(EmployeeScore::class);
        $this->attendances = resolve(Attendance::class);
        $this->users = resolve(User::class);
        $this->roles = resolve(Role::class);
    }

    public function index () {
        $announcements = $this->announcements->get();
        $recruitments = $this->recruitments->get();
        return view('pages.welcome', compact('announcements', 'recruitments'));
    }

    public function dashboard () {
        $announcements = $this->announcements->paginate();
        $employeesCount = $this->employees->getCount();
        $recruitmentCandidatesCount = $this->recruitmentCandidates->getCount();
        $endingEmployees = $this->employees->getEndingContractEmployees();
        return view('pages.dashboard', compact('announcements', 'employeesCount', 'recruitmentCandidatesCount', 'endingEmployees'));
    }

    public function employeesData () {
        $employees = $this->employees->get();
        return view('pages.employees-data', compact('employees'));
    }

    public function departmentsData () {
        $departments = $this->departments->get();
        return view('pages.departments-data', compact('departments'));
    }

    public function positionsData () {
        $positions = $this->positions->get();
        return view('pages.positions-data', compact('positions'));
    }

    public function employeesPerformanceScore () {
        $employeeScores = $this->employeeScores->getSimplifiedScores();
        return view('pages.employees-performance-score', compact('employeeScores'));
    }

    public function employeesLeave () {
        return view('pages.employees-leave');
    }

    public function attendances () {
        $attendances = $this->attendances->get();
        return view('pages.attendances', compact('attendances'));
    }

    public function announcements () {
        $announcements = $this->announcements->paginate();
        return view('pages.announcements', compact('announcements'));
    }

    public function recruitments () {
        $recruitments = $this->recruitments->paginate();
        return view('pages.recruitments', compact('recruitments'));
    }

    public function users () {
        $users = $this->users->get();
        return view('pages.users', compact('users'));
    }

    public function roles () {
        $roles = $this->roles->get();
        return view('pages.roles', compact('roles'));
    }

    public function profile () {
        $profile = $this->users->getProfile();
        return view('pages.profile', compact('profile'));
    }
}
