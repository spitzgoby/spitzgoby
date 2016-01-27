@extends('layouts.sidebar')

@section('content')
    {!! Form::model($post, [
        'route' => ['admin.posts.update', $post->id],
        'method' => 'PUT']) !!}
        @include('post._form', [
            'submit_title' => 'Update',
            'published_at' => $post->published_at])
        {!! Form::hidden('id') !!}
    {!! Form::close() !!}

    {!! Form::model($post, [
        'route' => ['admin.posts.destroy', $post->id],
        'method' => 'DELETE']) !!}
        {!! Form::hidden('id') !!}
        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
    {!! Form::close() !!}
@stop