@if (Auth::user()->vote_status($cook->id))
    {!! Form::open(['route' => ['uncooking.delete', $cook->id], 'method' => 'delete']) !!}
        {!! Form::hidden('keyword', $keyword) !!}
        {!! Form::submit('Cooked!', ['class' => 'btn']) !!}
        
    {!! Form::close() !!}
@else
    {!! Form::open(['route' => ['cooking.post', $cook->id]]) !!}
        {!! Form::submit('Cook?', ['class' => 'btn btn-primary']) !!}
        {!! Form::hidden('keyword', $keyword) !!}
    {!! Form::close() !!}
@endif