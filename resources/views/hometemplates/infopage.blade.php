@extends('base')
@section('metadate')
<meta name="description" content="{{$page->metaDesc}}">
<title> {{$page->title}}</title>
@endsection
@section('content')
<div class="sectionIndex">
    <div class="titleName">
        <h1>
            {{$page->name}}
            <div class="linetitlename"></div>
        </h1>
    </div>
    <div class="listing">
        <div class="about">
            {!!$page->text !!}
        </div>

    </div>
</div>
@endsection