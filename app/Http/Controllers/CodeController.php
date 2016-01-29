<?php

namespace App\Http\Controllers;

use App\Http\Requests\YoutubeRequest;
use Madcoda\Youtube;

use App\Http\Requests;

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

    public function getYoutubeSearchResults(YoutubeRequest $request)
    {
        $youtube = new Youtube(['key' => env('YOUTUBE_API_KEY', null)]);
        return $youtube->searchVideos($request->get('query'), 10);
    }
}
