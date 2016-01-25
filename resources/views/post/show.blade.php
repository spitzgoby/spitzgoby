@extends('layouts.sidebar')

@section('content')

    <div id="app">
        {!! $article->html !!}
    </div>
@stop

@section('script')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@stop