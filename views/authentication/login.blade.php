@extends('shift::layouts.application')

@section('main')

    @if ($errors->count())
        <div class="container">
            <div class="alert-error sticky island">
                <ul class="validation-errors">
                    @foreach ($errors->all() as $field => $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <div class="container">

        <h1>Log In</h1>

        <!-- Login form -->
        {{ Form::open(['action' => 'Tectonic\Shift\Controllers\AuthenticationController@login']) }}

            <div class="control">
                <div class="control-label forty">
                    {{ Form::label('email', 'Email') }}
                </div>
                <div class="control-field sixty">
                    {{ Form::email('email') }}
                </div>
            </div>

            <div class="control">
                <div class="control-label forty">
                    {{ Form::label('password', 'Password') }}
                </div>
                <div class="control-field sixty">
                    {{ Form::password('password') }}
                </div>
            </div>

            <div class="control">
                <div class="control-label forty">
                    {{ Form::label('remember', 'Remember me') }}
                </div>
                <div class="control-field sixty">
                    {{ Form::checkbox('remember') }}
                </div>
            </div>

            <div class="control">
                <div class="control-field">
                    <input type="submit" value="Log In">
                </div>
            </div>

        {{ Form::close() }}

    </div>

@stop
