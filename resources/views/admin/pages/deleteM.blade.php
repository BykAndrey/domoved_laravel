@extends('admin.base')

@section('content')
    <h1>Внимание! Будут удалены следующие данные:</h1>

    @foreach($listing as $i)
    <p>{{$i['type']}} -- {{$i['name']}}</p>
    @endforeach

    <span>*Удаляются все связанные данные</span><br>
    <a href="{{route('deletemodel',['model'=>$model,'id'=>$id,'allow'=>'true'])}}">Удалить эти данные</a>
    @endsection