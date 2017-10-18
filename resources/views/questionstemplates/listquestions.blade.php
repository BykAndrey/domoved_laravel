@extends('base')
@section('metadate')
<meta name="description" content="Ответы на вопросы">
<title>Ответы на вопросы</title>
@endsection

@section('content')
<div class="sectionIndex">
    <div class="titleName">
        <h1>Ответы на вопросы
            <div class="linetitlename"></div>
        </h1>
    </div>
    <style>
        .quest{
            background-color: #cfcfcf;
            width: 750px;
            border-bottom: 1px solid #e1e1e1;
            margin: auto;

        }
        .quest>label{
            padding: 5px 10px;

        }
        .quest>div{

            display: none;
            background-color: #e1e1e1;
            text-align: justify;
            padding: 10px;
        }
        .quest>.check{
            display: none;
        }
        .quest>.check:checked ~ div{
            display: block;
        }
    </style>
    <div class="listing">
        <div class="lookmore left">
            <a href="{{route('questionadd')}}"><h4>Задать свой вопрос</h4></a>
        </div>

        <br>
        @foreach($questions as $item)
        <div class="quest">
            <input type="checkbox" id="{{ $item->id }}" class="check" >
            <label for="{{ $item->id }}">{{ $item->question }}</label>
            <div>
                {{ $item->answer }}
            </div>
        </div>
       @endforeach
    </div>
</div>

@endsection