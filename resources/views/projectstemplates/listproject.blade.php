@extends('base')
@section('metadate')
<meta name="description" content="Проекты Компании ДомовеД">
<title>Проекты Компании ДомовеД</title>
@endsection
@section('content')
<div class="sectionIndex">
    <div class="titleName">
        <h1>Наши проекты
            <div class="linetitlename"></div>
        </h1>

    </div>
    <div class="listing">
        <?php $i=0;?>
       @foreach($list as $item)
           @if($i/2==0)
            @include('projectstemplates.item',['side'=>'left'])

        @else
                @include('projectstemplates.item',['side'=>'right'])
@endif
        <?php $i++;?>
       @endforeach
    </div>

</div>

@endsection