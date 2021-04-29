<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function school_profile()
    {
    	return view('pages.about.school_profile');
    }
    public function vision_mission()
    {
    	return view('pages.about.vision_mission');
    }
    public function history()
    {
    	return view('pages.about.history');
    }
    public function hymn()
    {
    	return view('pages.about.hymn');
    }
    public function award_recognition()
    {
    	return view('pages.about.awards_recognition');
    }
    public function administration_offices()
    {
        return view('pages.about.administration_offices');
    }
    public function faculty_staff()
    {
        return view('pages.about.faculty_staff');
    }
}
