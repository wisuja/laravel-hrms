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
}
