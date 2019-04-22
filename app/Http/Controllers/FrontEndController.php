<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\SiteMeta;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('user.index', ['teachers'=>Teacher::all(), 'students'=>Student::all()]);
    }

    public function about()
    {
        return view('user.about', ['about'=>About::find(1)]);
    }

    public function contact()
    {
        return view('user.contact', ['meta' =>SiteMeta::find(1)]);
    }
}
