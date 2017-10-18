@extends('base')
@section('metadate')
    <title>Отзывы о СК Домовед</title>
    <meta name="description" content="Отзывы Компании ДомовеД">
@endsection
@section('content')
    <div class="sectionIndex">
        <div class="titleName">
            <h1>Отзывы
                <div class="linetitlename"></div>
            </h1>

        </div>
        <div class="listing">
            <div class="lookmore left">
                <a href="{{route('your_opinion')}}"><h4>Оставить свой отзыв</h4></a>
            </div>
            <br>
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
    </div>
@endsection