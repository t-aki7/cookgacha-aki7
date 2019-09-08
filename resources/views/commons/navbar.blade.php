<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">料理ガチャ</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>

{{--        検索後空、空検索でエラー   
            {!! Form::open(['route' => 'cooks.search']) !!}
                <div style="display:inline-flex" class="mr-3">
                    {{ Form::text('keyword', old('keyword'), ['class' => 'form-control mr-2', "placeholder"=>"食材を入力"]) }}
                    {!! Form::submit('検索', ['class' => 'btn btn-primary d-block mx-auto']) !!}
                </div>
            {!! Form::close() !!}
--}}  
            
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li>{!! link_to_route('cooks.create', '登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('cooks.index', '登録一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('cooked_index', 'Cooked一覧', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li>{!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>