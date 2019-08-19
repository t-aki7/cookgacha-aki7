<header class="mb-4">
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <a class="navbar-brand" href="/">料理ガチャ</a>
        
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#nav-bar">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="nav-bar">
            <ul class="navbar-nav mr-auto"></ul>
            <form class="form-inline">
                <input class="form-control mr-1" type="text" name=""/>
                <button class="btn btn-primary mr-2" type="submit">検索</button>
            </form>
            <ul class="navbar-nav">
                @if (Auth::check())
                    <li>{!! link_to_route('cooks.create', '登録', [], ['class' => 'nav-link']) !!}</li>
                    <li>{!! link_to_route('cooks.index', '登録一覧', [], ['class' => 'nav-link']) !!}</a></li>
                    <li>{!! link_to_route('logout.get', 'ログアウト', [], ['class' => 'nav-link']) !!}</li>
                @else
                    <li>{!! link_to_route('signup.get', 'ユーザ登録', [], ['class' => 'nav-link']) !!}</a></li>
                    <li>{!! link_to_route('login', 'ログイン', [], ['class' => 'nav-link']) !!}</li>
                @endif
            </ul>
        </div>
    </nav>
</header>