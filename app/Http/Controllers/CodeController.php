<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function index()
    {
        return view('code.index');
    }

    public function getJWSearch()
    {
        return view('code.jwsearch');
    }
}
