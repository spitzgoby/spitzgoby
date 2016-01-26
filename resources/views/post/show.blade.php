@extends('layouts.sidebar')

@section('content')
    <div id="app">
        {!! $post->html !!}
    </div>
@stop

@section('script')
    <script>
        hljs.initHighlightingOnLoad();
    </script>
@stop