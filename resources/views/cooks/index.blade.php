@extends('layouts.app')

@section('content')
    <h2 class="text-center">登録一覧</h2>
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
                            <th></th>
                            <th></th>
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
                            <td>{!! link_to_route('cooks.edit', '編集', ['id' => $cook->id], ['class' => 'btn btn-primary']) !!}</td>
                            <td>
                                {!! Form::open(['route' => ['cooks.destroy', $cook->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('削除', ['class' => 'btn btn-danger']) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif     
            
            <div class="pagination justify-content-center">
                {{ $cooks->render('pagination::bootstrap-4') }}
            </div>
            
        </div>
    </div>
    
@endsection