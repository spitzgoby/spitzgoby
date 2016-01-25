@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid">
        <div class="articles">
            @if(isset($articles))
                @foreach($articles as $article)
                    @include('post._post', 'article')
                @endforeach
            @else
                <article>
                    <h1>I haven't posted any articles yet.</h1>
                    <p>Please check back in soon.</p>
                </article>
            @endif
        </div>
    </div>
@stop
