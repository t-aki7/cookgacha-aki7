@extends('layouts.app')

@section('content')
    <h2 class="text-center">Cooked!一覧</h2>
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
                            <th>Cook</th>
                            <th>Cook Counter</th>
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
                            <td>
                            @if (Auth::user()->vote_status($cook->id))
                                {!! Form::open(['route' => ['uncooking.delete', $cook->id], 'method' => 'delete']) !!}
                                    {!! Form::submit('Cooked!', ['class' => 'btn']) !!}
                                {!! Form::close() !!}
                            @else
                                {!! Form::open(['route' => ['cooking.post', $cook->id]]) !!}
                                    {!! Form::submit('Cook?', ['class' => 'btn btn-primary']) !!}
                                {!! Form::close() !!}
                            @endif
                            </td>
                            <td>
                               {!! $ids_count[$cook->id] !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <h4 class="text-center">登録されているデータがありません。</h3>
            @endif     
            
            <div class="pagination justify-content-center">
                {{ $cooks->render('pagination::bootstrap-4') }}
            </div>
            
        </div>
    </div>
    
@endsection