<?php

namespace App\Http\Controllers;


use App\Http\Requests;

class CodeController extends Controller
{

    /**
     * GET /code
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('code.index');
    }

    /**
     * GET /code/jwsearch
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function getJWSearch()
    {
        return view('code.jwsearch');
    }

}
