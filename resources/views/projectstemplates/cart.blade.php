@extends('base')
@section('metadate')
<meta name="description" content="{{ $item->name}} от Компании ДомовеД">
<title>{{ $item->name}} от Компании ДомовеД</title>
@endsection
@section('content')
<div class="sectionIndex">
    <div class="titleName">
        <h1>{{ $item->name}}
            <div class="linetitlename"></div>
        </h1>

    </div>

    <div class="listing">
        <div class="about"> {{$item->text}}</div>
        <br>
        <hr>
        <div class="photolist" style="float: inherit;margin: auto">

            <div class="galery">

                <!--display-->
                <div class="display">

                    @foreach($images as $image)
                    <div class="slide">
                        <div class="image" style="background-image: url({{URL::asset($image->image)}})"></div>

                    </div>
                    @endforeach

                </div>
                <!--End display-->

                <!--Controls-->
                <div class="controls">
                    <div class="marks">

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
    </div>
</div>
@endsection
