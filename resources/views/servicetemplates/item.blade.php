@extends('base')
@section('metadate')
<meta name="description" content="{{ $title }} от Компании ДомовеД в Москве">

<title> {{ $title }}| СК Домовед</title>
@endsection
@section('content')

<div class="sectionIndex">

    <div class="titleName">
        <h2>{{ $namePage }}
            <div class="linetitlename"></div>
        </h2>
    </div>
    <style>

    </style>
    <div class="complectation">
        <div class="content">
            <div class="exit">Выход</div>
            <div class="title">

            </div>
            <div class="text">

            </div>
        </div>
    </div>
    <div class="listing">

        <div class="photolist">

            <div class="galery">

                <!--display-->
                <div class="display">
                    <div class="slide" >
                        <div class="image" style="background-image: url({{URL::asset($item->image)}})"></div>

                    </div>
                    @foreach($images as $image)
                    <div class="slide" >
                        <div class="image" style="background-image: url({{URL::asset($image->image)}})"></div>

                    </div>
                    @endforeach

                </div>
                <!--End display-->

                <!--Controls-->
                <div class="controls">
                    <div class="marks">
                        <div class="mark"></div>
                        @foreach($images as $image)
                        <div class="mark"></div>
                        @endforeach
                    </div>
                    <div class="buttons">
                        <div class="left"><img src="{{URL::asset('static/image/arrow.png')}}" width="70px" height="70px"></div>
                        <div class="right"><img src="{{URL::asset('static/image/arrow.png')}}" width="70px" height="70px"></div>
                   </div>
                </div>
                <!--/*End controls*/-->

            </div>
            <!--End Slider-->

        </div>
        <div class="date">
            <div class="variantname">Варианты изготовления:</div>


            <div class="variants">
               @foreach($offers as $offer)


                <div class="material" for="{{$offer->id}}">
                    <img src="{{URL::asset($offer->getMaterial()['image'])}}" width='50px' alt="{{$offer->getMaterial()['name']}}"/>
                    <div>{{$offer->getMaterial()['name']}}</div>
                </div>


               @endforeach
            </div>

            <div class="cost">
                @foreach($offers as $offer)
                <div class="moreCost" id="{{$offer->id}}">
                    <div class="duration">
                        <span>  Сроки выполнения: </span>
                        <div>   i.duration </div>
                    </div>
                    <span><hr>Стоимость от:<br>
                   <div class="price"><i>{{$offer->price}}</i>р.</div> {{$offer->getUnit()['name']}} </span>  <hr>
                    <div class="textD" style="display: none;">
                        <span>{{$offer->name}}</span>

                       <div> {{$offer->description}}</div>
                    </div>
                </div>

              @endforeach


            </div>

            <div class="lookmore" style="">
                Комплектация
            </div>



        </div>

    </div>
</div>
@endsection
