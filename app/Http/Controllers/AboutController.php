<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    public function getIndex()
    {
        return view('about.index');
    }

    public function getResume() {
        return response()->download('pdf/Thomas_Leu_Resume.pdf');
    }

}
