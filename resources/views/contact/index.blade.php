@extends('layouts.sidebar')

@section('content')
    <div id="app" class="fluid-container">
        <div class="row">
            <div class="spacer"></div>
            <div class="col-sm-6 col-sm-offset-3">
                <social name="github"
                        icon="github"
                        url="http://github.com/spitzgoby"
                ></social>

                <social name="twitter"
                        icon="twitter"
                        url="http://twitter.com/spitzgoby"
                ></social>

                <social name="linkedin"
                        icon="linkedin"
                        url="http://linkedin.com/in/spitzgoby"
                ></social>

                <social name="angellist"
                        icon="angellist"
                        url="http://angel.co/tom-leu"
                ></social>

            </div>
        </div>
    </div>
@stop