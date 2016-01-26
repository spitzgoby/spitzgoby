@extends('layouts.sidebar')

@section('content')
    <div class="container-fluid">
        @include('post._postList')
        @if(\Auth::check())
            <a class="btn btn-default" href="{{ route('admin.posts.create') }}"><i class="fa fa-plus"></i> Create Post</a>
        @endif
    </div>
@stop

@section('script')
    @include('_highlight')
@stop
