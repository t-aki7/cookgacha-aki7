@extends('layouts.app')

@section('content')
    <h2 class="text-center">ユーザ登録</h2>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::open(['route' => 'signup.post']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('email', 'メール') !!}
                    {!! Form::email('email', old('email'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password', 'パスワード') !!}
                    {!! Form::password('password', ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('password_confirmation', 'パスワード(再)') !!}
                    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg d-block mx-auto']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection