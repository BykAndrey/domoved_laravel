@extends( 'base')



@section('metadate')
    <meta name="description" content="Строительство домов, дач, котеджей под ключ в Москве и московской области. | СК Домовед ">
    <meta name="keywords" content="Строительная компания в москве, построить дом, дом под ключ, построить дом недорого"/>
    <title>Строительство домов, дач и коттеджей под ключ | СК Домовед</title>
@endsection


@section('content')
    <!--slider-->
@if(isset($slides))
    <div class="slider container">
        <input type="hidden" value="{{count($slides)}}" id="count">
        <div class="controls">

            <div class="controlleft">

            </div>
            <div class="marks">
                @foreach($slides as $slide)
                <div class="mark"></div>
             @endforeach
            </div>
            <div class="controlright">

            </div>

        </div>
        <?php $i=0;?>
        @foreach($slides as $slide)
            <?php $i=$i+1;?>
            @if($i==1)
        <div class="slide active">
           @else
            <div class="slide">
               @endif
                <div class="cover" style="	background-image: url({{URL::asset($slide->getItem()['image'])}});">

                </div>
                <div class="title">
                    {{$slide->getItem()['name']}}
                </div>
                <div class="points">
                   @if(strlen($slide->prop1)>5)
                    <div class="left-top point ">
                        @else

                            <div class="left-top point unvisible">
                       @endif
                        {{$slide->prop1}}
                    </div>


                       @if(strlen($slide->prop2)>5)
                    <div class="right point">
                        @else
                            <div class="right point unvisible">

                       @endif
                            {{$slide->prop2}}
                    </div>
                            @if(strlen($slide->prop3)>5)
                            <div class="left-bot point">
                                @else
                            <div class="left-bot point unvisible">
                       @endif
                            {{$slide->prop3}}
                    </div>
                       @if(strlen($slide->prop4)>5)
                    <div class="right point ">
                        @else
                            <div class="right point unvisible">
                       @endif
                            {{$slide->prop4}}
                    </div>
                </div>
                <div class="description">
                    {{$slide->text}}
                </div>
                <div class="lookmore right">
                    <a href="{{route('item',['caturl'=>$slide->getCategory()['url'],'item'=>$slide->getItem()['url']])}}" alt="">
                        <h4>Подробнее</h4>

                    </a>
                </div>
            </div>
            @endforeach

        </div>
    </div>
    @endif
        <!--End slider-->
    <div class="sectionIndex">
        <div class="titleName">
            <h1>СК Домовед<br>Строительство домов, дач и коттеджей под ключ.
                <div class="linetitlename"></div>
            </h1>

        </div>
        <div class="listing">
            <div class=aboutUsHome>
                <p>СК Домовед осуществляет строительство домов, дач, коттеджей и других сооружений в Москве и московской области. Приемлемые цены и качественное строительство домов любого типа сложности. Мы поможем выбрать материал изготовления дома. Он может быть как каркасный, кирпичный, из бруса, из оцилиндрованного бревна или из пеноблока. Мы быстро и точно составим план и смету для строительства любого типа дома. В нашей команде сотрудники которые добросовестно выполняют свою работу. </p>
                <p>Мы возводим дома с самого начала, принимая все организационные вопросы на себя, вплоть до предварительной расчистки площадки для будущего дома.
                </p>
                <p>Ваш уютный дом, теплая дача или просторный коттедж прослужат Вам очень долго.</p>
            </div>
        </div>
        <div class="lookmore right">
            <a href="{% url "ListProjects" %}" ><h4>Смотреть больше</h4></a>
        </div>

    </div>
   @if(count($projects)>0)
    <div class="sectionIndex">
        <div class="titleName">
            <h2>Наши проекты
                <div class="linetitlename"></div>
            </h2>

        </div>
        <div class="listing">

            <?php $i=0;?>
            @foreach($projects as $item)
                @if($i%2==0)
                    @include('projectstemplates.item',['side'=>'left'])

                @else
                    @include('projectstemplates.item',['side'=>'right'])
                @endif
                <?php $i++;?>
            @endforeach
        </div>
        <div class="lookmore right">
            <a href="{{route('projects')}}" ><h4>Читать подробнее</h4></a>
        </div>

    </div>

@endif
   @if(count($opinions)>0)

    <div class="sectionIndex">
        <div class="titleName">
            <h2>Отзывы
                <div class="linetitlename"></div>
            </h2>

        </div>
        <div class="listing">

            <?php $i=0;?>
            @foreach($opinions as $item)
                @if($i%2==0)
                    @include('opiniontemplates.item',['side'=>'right'])
                @else
                    @include('opiniontemplates.item',['side'=>'left'])
                @endif
                <?php $i++;?>
            @endforeach

        </div>
        <div style="display: flex;">
            <div class="lookmore left">
                <a href="{{route('your_opinion')}}"><h4>Оставить свой отзыв</h4></a>
            </div>
            <div class="lookmore right">
                <a href="{{route('opinions')}}"><h4>Смотреть больше</h4></a>
            </div>
        </div>




    </div>


@endif
    @include('questionstemplates.form')
@endsection
