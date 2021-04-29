<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AcademicController extends Controller
{
    public function bael()
    {
    	return view('pages.academic.bael');
    }
    public function baps()
    {
    	return view('pages.academic.baps');
    }
    public function bsa()
    {
    	return view('pages.academic.bsa');
    }
    public function bsais()
    {
    	return view('pages.academic.bsais');
    }
    public function bsis()
    {
    	return view('pages.academic.bsis');
    }
}