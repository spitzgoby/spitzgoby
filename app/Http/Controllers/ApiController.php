<?php

namespace App\Http\Controllers;


use App\Http\Requests\YoutubeRequest;
use Madcoda\Youtube;

class ApiController extends Controller
{

    /**
     * GET /api/code/jwsearch/
     *
     * @param YoutubeRequest $request
     * @return \StdClass
     */
    public function getYoutubeSearchResults(YoutubeRequest $request)
    {
        $youtube = new Youtube(['key' => env('YOUTUBE_API_KEY', null)]);
        return $youtube->searchVideos($request->get('query'), 10);
    }
}
