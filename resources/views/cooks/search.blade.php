@extends('layouts.app')

@section('content')
    <h2 class="text-center">検索結果</h2>
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">
            @if (count($cooks) > 0)
                <table class="table table-striped text-center">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>料理名</th>
                            <th>調理方法</th>
                            <th>食材1</th>
                            <th>食材2</th>
                            @if (Auth::check())
                                <td>Cook</td>
                            @endif
                                <td>Cooked Counter</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($cooks as $cook)
                        <tr>
                            <td>{{ $cook->id }}</td>
                            <td>{{ $cook->name }}</td>
                            <td>{{ $cook->method }}</td>
                            <td>{{ $cook->ingredient1 }}</td>
                            <td>{{ $cook->ingredient2 }}</td>
                            @if (Auth::check())
                                <td>
                                    @include('cooks.cooked_count_button')
                                </td>
                            @endif
                                <td>
                                    {!! $ids_count[$cook->id] !!}
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
                {!! Form::open(['route' => 'cooks.search']) !!}
                    {!! Form::hidden('keyword', $keyword) !!}
                    {!! Form::submit('もう一回', ['class' => 'btn btn-success d-block mx-auto btn-lg']) !!}
                {!! Form::close() !!}
                
            @else
                <h4 class="text-center">登録されているデータがありません。</h3>
            @endif     
    </div>
@endsection