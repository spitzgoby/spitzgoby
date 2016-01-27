@extends('layouts.sidebar')

@section('content')
    @include('post._postList')
    @if(\Auth::check())
        <a class="btn btn-default" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus"></i> Create Post</a>
    @endif
@stop

@section('script')
    @include('_highlight')
@stop
