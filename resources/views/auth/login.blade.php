@extends('layouts.master')

@section('content')

        <h1>Login</h1>
        {!! Form::open(['url' => 'admin/login']) !!}

            @if (count($errors) > 0)
            	<div class="alert alert-danger">
            		<ul>
            			@foreach($errors->all() as $error)
            				<li>{{ $error }}</li>
            			@endforeach
            		</ul>
            	</div>
            @endif

            {{-- Email Input Field --}}
            <div class="form-group">
            	{!! Form::label('email', 'Email:', ['class' => 'control-label']) !!}
            	{!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
            </div>                

            {{-- Password Input Field --}}
            <div class="form-group">
                {!! Form::label('password', 'Password:', ['class' => 'control-label']) !!}
                {!! Form::password('password', ['class' => 'form-control']) !!}
            </div>

            <div class="checkbox">
                <label>
                    {!! Form::checkbox('remember', true, ['class' => 'form-control']) !!} Remember Me
                </label>
            </div>

            {!! Form::submit('Login', ['class' => 'btn btn-primary']) !!}

        {!! Form::close() !!}

@stop