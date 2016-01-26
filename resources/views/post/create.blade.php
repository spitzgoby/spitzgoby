@extends('layouts.sidebar')

@section('content')

    {!! Form::open(['route' => 'admin.posts.store']) !!}
        @include('post._form', [
        'submit_title' => 'Create',
        'published_at' => \Carbon\Carbon::tomorrow()->format('Y-m-d')])
    {!! Form::close() !!}

@stop