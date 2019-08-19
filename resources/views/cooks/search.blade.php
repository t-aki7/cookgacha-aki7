@extends('layouts.app')

@section('content')
    <div class="row mt-5">
        <div class="col-sm-6 offset-sm-3">
            @if (count($cooks) > 0)
                <table class="table table-striped">
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
                        @foreach ($cooks as $cook)
                        <tr>
                            <td>{{ $cook->id }}</td>
                            <td>{{ $cook->name }}</td>
                            <td>{{ $cook->method }}</td>
                            <td>{{ $cook->ingredient1 }}</td>
                            <td>{{ $cook->ingredient2 }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif     
    </div>
@endsection