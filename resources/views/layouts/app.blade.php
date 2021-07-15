<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>TaskChecker</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">    
    <link rel="stylesheet" href="{{ asset('css/project.css') }}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'TaskChecker') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

{{-- jsの記述 カードのドラッグアンドドロップ --}}
<script>
    // 他のjsファイルが呼び出されエラーになるため、
    // 他のファイルを呼び出さないように、jQueryをjqOtherで定義
    var jqOther = jQuery.noConflict(true);

    // 表示しているカードをドラック可能にする記述
    jqOther(function(){
        jqOther(".i-card").draggable({
            opacity :0.9 ,     
            revert: "invalid",
            scroll: false,
        });



    // プロジェクト「未着手」の領域へドロップされたときの処理
    jqOther(".project-status1").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/project/statuschange1/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });        


    // プロジェクト「進行中」の領域へドロップされたときの処理
    jqOther(".project-status2").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/project/statuschange2/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });


    // プロジェクト「完了」の領域へドロップされたときの処理
    jqOther(".project-status3").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/project/statuschange3/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });    



    
    // カード「未着手」の領域へドロップされたときの処理
    jqOther(".card-status1").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/card/statuschange1/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });        


    // カード「進行中」の領域へドロップされたときの処理
    jqOther(".card-status2").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/card/statuschange2/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });


    // カード「完了」の領域へドロップされたときの処理
    jqOther(".card-status3").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/card/statuschange3/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });    



    // タスク「未着手」の領域へドロップされたときの処理
    jqOther(".task-status1").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/task/statuschange1/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });        


    // タスク「進行中」の領域へドロップされたときの処理
    jqOther(".task-status2").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/task/statuschange2/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });


    // タスク「完了」の領域へドロップされたときの処理
    jqOther(".task-status3").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,

        //ドロップ時の動作 (ドラックされた要素を進行中へステータス変更させる)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/task/statuschange3/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });



    // プロジェクトゴミ箱の領域へドロップされたときの処理
    jqOther(".project-delete").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,
        hoverClass : "open-trash",
        tolerance : "touch" ,

        //ドロップ時の動作 (ドラックされた要素を削除)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/project/delete/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });   

    // カードゴミ箱の領域へドロップされたときの処理
    jqOther(".card-delete").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,
        hoverClass : "open-trash",
        tolerance : "touch" ,

        //ドロップ時の動作 (ドラックされた要素を削除)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/card/delete/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });   

    // タスクゴミ箱の領域へドロップされたときの処理
    jqOther(".task-delete").droppable({
        //ドロップOKの要素を指定
        accept :".i-card" ,
        hoverClass : "open-trash",
        tolerance : "touch" ,

        //ドロップ時の動作 (ドラックされた要素を削除)
        drop : function(event , ui){

            // ドラッグされた要素のidを取得しsubmitするURLを生成
            var id = ui.draggable.find('.search-id').text();
            var url = '{{ url('/task/delete/') }}/'+id;

            ui.draggable.find('.status-change').submit(function(){

            jqOther(this).attr('action', url);
            });

        ui.draggable.find('.status-change').submit();
        }
    });   
});
</script>
</body>
</html>
