@extends('layouts.sidebar')

@section('content')
    <div id="app">
        <h1>{{ $post->title }}</h1>
        {!! $post->html !!}
    </div>
@stop

@section('script')
    @include('_highlight')
@stop