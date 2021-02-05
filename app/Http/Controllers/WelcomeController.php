<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Recruitment;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    private $announcements;
    private $recruitments;

    public function __construct()
    {
        $this->announcements = resolve(Announcement::class);
        $this->recruitments = resolve(Recruitment::class);
    }

    public function index () 
    {
        $announcements = $this->announcements->get();
        $recruitments = $this->recruitments->get();
        return view('pages.welcome', compact('announcements', 'recruitments'));
    }

    public function announcements () 
    {
        $announcements = $this->announcements->where('department_id', null)->latest()->paginate(10);
        return view('pages.welcome_announcements', compact('announcements'));
    }

    public function announcementShow (Announcement $announcement) 
    {
        return view('pages.welcome_announcements_show', compact('announcement'));
    }

    public function recruitments () 
    {
        $recruitments = $this->recruitments->where('is_active', 1)->latest()->paginate(10);
        return view('pages.welcome_recruitments', compact('recruitments'));
    }

    public function recruitmentShow (Recruitment $recruitment) 
    {
        return view('pages.welcome_recruitments_show', compact('recruitment'));
    }
}
