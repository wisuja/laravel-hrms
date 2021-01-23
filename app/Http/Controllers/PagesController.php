<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only('dashboard');
    }

    public function index () {
        $announcements = resolve(Announcement::class)->get();
        $recruitments = resolve(Recruitment::class)->get();
        return view('pages.welcome', compact('announcements', 'recruitments'));
    }

    public function dashboard () {
        return view('pages.dashboard');
    }
}
