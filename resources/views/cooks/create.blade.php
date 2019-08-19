@extends('layouts.app')

@section('content')
    <div class="text-center">登録</div>
    
    <div class="row">
        <div class="col-sm-6 offset-sm-3">
            
            {!! Form::model($cook, ['route' => 'cooks.store']) !!}
                <div class="form-group">
                    {!! Form::label('name', '名前') !!}
                    {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('method', '調理方法') !!}
                    {!! Form::text('method', old('method'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('ingredient1', '食材1') !!}
                    {!! Form::text('ingredient1', old('ingredient1'),['class' => 'form-control']) !!}
                </div>
                
                <div class="form-group">
                    {!! Form::label('ingredient2', '食材2') !!}
                    {!! Form::text('ingredient2', old('ingredient2'),['class' => 'form-control']) !!}
                </div>
                
                {!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg d-block mx-auto']) !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection