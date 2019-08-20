@extends('layouts.app')

@section('content')
    <h2 class="text-center">編集画面</h2>
    <div class="row mt-5">
            <div class="col-sm-6 offset-sm-3">
               
                    <table class="table table-striped text-center">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>料理名</th>
                                <th>調理方法</th>
                                <th>食材1</th>
                                <th>食材2</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $cook->id }}</td>
                                <td>{{ $cook->name }}</td>
                                <td>{{ $cook->method }}</td>
                                <td>{{ $cook->ingredient1 }}</td>
                                <td>{{ $cook->ingredient2 }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    {!! Form::model($cook, ['route' => ['cooks.update', $cook->id], 'method' => 'put']) !!}
                        <div class="form-group">
                            {!! Form::label('name', '名前') !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('method', '調理方法') !!}
                            {!! Form::select('method', ['' => '選択してください', '炒める' => '炒める', '焼く' => '焼く', '蒸す' => '蒸す', '煮る' => '煮る', 'その他' => 'その他'], null, ['class' => 'form-control']) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('ingredient1', '食材1') !!}
                            {!! Form::text('ingredient1', old('ingredient1'),['class' => 'form-control', "placeholder"=>"食材をひらがな、全角カタカナで入力"]) !!}
                        </div>
                        
                        <div class="form-group">
                            {!! Form::label('ingredient2', '食材2') !!}
                            {!! Form::text('ingredient2', old('ingredient2'),['class' => 'form-control', "placeholder"=>"食材をひらがな、全角カタカナで入力"]) !!}
                        </div>
                        {!! Form::submit('登録', ['class' => 'btn btn-primary btn-lg d-block mx-auto']) !!}
                    {!! Form::close() !!}
                
            </div>
    </div>

@endsection