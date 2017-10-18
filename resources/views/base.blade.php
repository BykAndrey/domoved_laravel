
<!DOCTYPE HTML>
<html lang="ru">
<head>
    <link rel="stylesheet" href="{{URL::asset('static/css/style2.css')}}">
    <meta charset="utf-8">
    <link rel="shortcut icon" type="image/png" href="{{URL::asset('static/image/_1.ico')}}">
    @yield('metadate')
    <meta name="viewport" content="width=device-width, initial-scale=1.0">



</head>

<body>

<div class="buttotop">
    <div>
        Вверх!
    </div>

</div>


<header >

    <div class="headtopmenu">
        <ul>

            <li><a href="{{route('aboutsite',['name'=>'aboutcompany'])}}">Порядок оказания услуг</a></li>
            <li><a href="{{route('opinions')}}">Отзывы</a></li>
            <li><a href="{{route('questions')}}">Ответы на вопросы</a></li>
            <li class="town"><a href="#">Москва</a></li>
        </ul>
        <span itemscope itemtype="http://schema.org/Organization" class="metadateOrg">
							<span itemprop="name">СК Домовед</span>
							<span itemprop="address" itemscope itemtype="http://schema.org/PostalAddress">
    						<span itemprop="addressLocality">Москва</span>
							</span>
							<span itemprop="telephone">+7 (926) 423 75 20</span>
							<span itemprop="email">company.domoved@yandex.ru</span>
				</span>
    </div>
    <div class="headbotmenu">
        <div class="logo">
            <div> <img src="{{URL::asset('static/image/logo.png' )}}" alt=""></div><div>СК Домовед</div>
        </div>
        <div class="mainMenu">
            <ul>
                <li><a href="/">Главная</a></li>

                <li><a href="{{route('service')}}">Услуги</a></li>
                <li><a href="{{route('projects')}}">Проекты</a></li>
                <li><a href="{{route('aboutsite',['name'=>'aboutcompany'])}}">О компании</a></li>
                <li><a href="{{route('aboutsite',['name'=>'contacts'])}}">Контакты</a></li>
                <li>+7 (926) 423 75 20</li>
            </ul>
        </div>
    </div>

</header>




<div class="content container">
  <!--  {%breadcrops Crops%}
    {% block 'content'%}
    {% endblock %}-->
    @if(isset($crops))
        @include('breadcrops')
        @endif
    @yield('content')
</div>
<footer>
    <div class="info"><h5><a href="{% url 'ServiceCategoryList' %}">Услуги</a></h5>
        <ul>

    @foreach($footerServ as $item)
                <a href="{{route('category',['caturl'=>$item->url])}}"><li>{{$item->name}}</li></a>
    @endforeach
        </ul>
    </div>
    <div class="info"><h5><a href='{{route('aboutsite',['name'=>'contacts'])}}'>О компании</a> </h5>
        <ul>
            <a href="{% url 'infopage' 'procedure-provision-serv'%}"><li>Порядок оказания услуг</li></a>
            <a href="{{route('opinions')}}"><li>Отзывы</li></a>
            <a href="{{route('questions')}}"><li>Ответы на вопросы</li></a>
        </ul>
    </div>
    <div class="info"><h5><a href="{{route('aboutsite',['name'=>'contacts'])}}">Контакты</a></h5>
        <ul>
            <li>+7 (926) 423 75 20</li>
            <li>+7 (925) 164 71 93</li>
            <li>+7 (916) 901 68 07</li>
        </ul></div>
    <div class="bottom"><h5>Социалные сети</h5>
        <a href="https://vk.com/club152770283" target="_blank">
        <img src="{{URL::asset('static/image/vk.png')}}" width="20px" alt="Vk.com"></a>
        <a href="#"><img src="{{URL::asset('static/image/ok.png')}}" width="20px" alt="Ok.com"></a>
        <a href="#"><img src="{{URL::asset('static/image/inst.png')}}" width="20px" alt="instagram.com"></a>
    </div>
</footer>

<script src="{{URL::asset('static/js/jquery.js')}}" type="text/javascript" charset="utf-8"></script>
<script src="{{URL::asset('static/js/script.js')}}" type="text/javascript" charset="utf-8" ></script>
<script src="{{URL::asset('static/js/slider.js')}}" type="text/javascript" charset="utf-8" ></script>
<script src="{{URL::asset('static/js/sliderServ.js')}}" type="text/javascript" charset="utf-8" ></script>
<script src="{{URL::asset('static/js/jquery.maskedinput.js')}}" type="text/javascript" charset="utf-8" ></script>


</body>
</html>
