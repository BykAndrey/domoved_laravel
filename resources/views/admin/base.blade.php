<!DOCTYPE HTML>
<html lang="ru">
<head>
    <link rel="stylesheet" href="{{URL::asset('static/css/admin.css')}}">
    <script src="{{URL::asset('static/js/jquery.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('static/js/translit.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('static/js/adminscript.js')}}" type="text/javascript"></script>
    <script src="{{URL::asset('static/js/jquery-ui.js')}}"></script>

</head>
<body>
<header>
    <div class="navigation"><div><a href="{{url('admin')}}">Главная</a> <a href="/">Вернутся на сайт</a></div>
        <div><a href="{{route('logout')}}">Заверишить сессию</a></div> </div>
    <hr>
    <ul>
        @foreach($tables as $item)
            @if($item['place']==1)
            <li> <a href="{{route('listmodel',['model'=>$item['name']])}}">{{$item['adminName']}}</a></li>
            @endif
        @endforeach
    </ul>
    <hr>
    <ul>
        @foreach($tables as $item)
            @if($item['place']==2)
                <li> <a href="{{route('listmodel',['model'=>$item['name']])}}">{{$item['adminName']}}</a></li>
            @endif
        @endforeach
    </ul>
    <hr>
    <ul>
        @foreach($tables as $item)
            @if($item['place']==3)
                <li> <a href="{{route('listmodel',['model'=>$item['name']])}}">{{$item['adminName']}}</a></li>
            @endif
        @endforeach
    </ul>
    <hr>
</header>
<div class="content">
    @yield('content')
</div>
<link rel="stylesheet" href="{{URL::asset('static/css/jquery-te-1.4.0.css')}}">
<script src="{{URL::asset('static/js/jquery-te-1.4.0.min.js')}}"></script>
<script>$('textarea').jqte();</script>
</body>
</html>