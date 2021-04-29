<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    public function students_organizations()
    {
    	return view('pages.students.students_organizations');
    }
    public function students_services()
    {
    	return view('pages.students.students_services');
    }
    public function publication()
    {
    	return view('pages.students.publication');
    }
    public function students_council()
    {
    	return view('pages.students.students_council');
    }
    public function students_handbook()
    {
    	return view('pages.students.students_handbook');
    }
    public function guidance_services()
    {
        return view('pages.students.guidance_services');
    }
    public function library_services()
    {
        return view('pages.students.library_services');
    }
}
