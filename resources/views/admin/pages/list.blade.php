@extends('admin.base')

@section('content')
    <h2>{{$namemodel}}</h2>
    <div>
        <a href="{{route('createmodel',['model'=>$model])}}">Создать</a>
    </div>
    <table  style="width: 100%;">
        <tr>
            @foreach($fields as $key=>$field)

                <td>{{$field}}
                @foreach($sortfield as $sort)
                    @if($sort==$key)
                            <a href="{{route('listmodel',['model'=>$model,'sortby'=>$sort])}}">s</a>
                        @endif
                @endforeach
                </td>
            @endforeach
        </tr>

        @foreach($list as $item)

            <tr>
                @foreach($fields as $key=>$field)
                    @if(strpos($key,'_id')===false)
                        <td>{{$item->$key}}</td>

                    @else
                        <?php $func='m_'.$key;?>
                        <td>{{$item->$func($item->$key)}}</td>
                        @endif
                    @endforeach
                    <td><a href="{{route('editmodel',['model'=>$model,'id'=>$item->id])}}">Редактировать</a></td>
                    <td><a href="{{route('deletemodel',['model'=>$model,'id'=>$item->id])}}">Удалить</a></td>
            </tr>
        @endforeach
    </table>
@endsection