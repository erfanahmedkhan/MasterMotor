<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SurveyController extends Controller
{
    public function survey()
    {
        return view('survey');
    }
    public function csi()
    {
        return view('csi');
    }
    public function ssi()
    {
        return view('ssi');
    }
    public function warranty()
    {
        return view('warranty');
    }
    public function miscellaneous()
    {
        return view('miscellaneous');
    }
}
