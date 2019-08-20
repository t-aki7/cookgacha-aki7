@extends('layouts.app')

@section('content')
    <div class="center">
        <div class="text-center bg-info h-50">
            <h1 class="py-5">料理ガチャ</h1>
        </div>
    </div>
    
    <div class="text-center border">
        <p class="mb-0 mt-3">検索欄に入力された単語と一致する本サイトに登録された料理がランダムで3件表示されます。</p>
        <p class="my-0">単語は食材で検索できますが、料理名では検索できません。</p>
        <p class="my-0">ボタンをクリックすることでも検索できます。</p>
        <p class="mt-0 mb-3">ログインすることで料理を登録することができます。</p>
    </div>
    
    <div class="row mt-5">
        <div class="col-6 offset-sm-3">
            {!! Form::open(['route' => 'cooks.search']) !!}
            
                <div class="form-group">
                    {{ Form::text('keyword', old('keyword'), ['class' => 'form-control', "placeholder"=>"検索したい食材をひらがな、全角カタカナで入力してください"]) }}
                </div>
            
            {!! Form::submit('検索', ['class' => 'btn btn-primary d-block mx-auto']) !!}
        {!! Form::close() !!}      
        </div>
          
    </div>
    
        
@endsection