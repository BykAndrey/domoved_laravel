@extends('base')

@section('metadate')
<meta name="description" content="Услуги строительсва домов Компании ДомовеД в Москве">


<title>{{$title}} | СК Домовед</title>
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
    <div class="listing">
        <div class="descript">

           {{$description}}
        </div>
        @if(isset($category))
            @foreach( $category as $item)

                <div class="usluga" style="background-image: url({{URL::asset($item->resize($item->image,300))}})">
                    <div class="minprice">
                        <span>от {{$item->mostcheep()['min']}}</span>
                        <p>{{$item->mostcheep()['desc']}}</p>
                    </div>
                    <a href="{{route('category',['caturl'=> $item->url])}}">  <div class="name">{{$item->name}} </div></a>
                </div>
            @endforeach
        @endif

    @if(isset($items))
            @foreach( $items as $item)

                <div class="usluga" style="background-image: url({{URL::asset($item->resize($item->image,300))}})">
                    <div class="minprice">от {{$item->mostcheep()}}</div>
                    <?php $parent_url=$item->category(); ?>
                    <a href="{{route('item',['caturl'=>$parent_url,'item'=>$item->url])}}">  <div class="name">{{$item->name}} </div></a>
                </div>
            @endforeach
        @endif




    </div>

</div>

@endsection
