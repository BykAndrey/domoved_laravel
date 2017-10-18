@extends('admin.base')


@section('content')

    <h2>Изображение в проекте</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <table>
            <tr>
                <td><label for="name">Название:</label></td>
                <td><input type="text" name="name" value="{{(old('name')!='')?old('name'):$date['name']}}">
                </td>
            </tr>
            <tr>
                <td><label for="name">Название:</label></td>
                <td>
                    <select name="project_id" id="" value="{{(old('project_id')!='')?old('project_id'):$date['project_id']}}">
                        @foreach($modelDate['project'] as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                            @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="name">Картинка:</label></td>
                <td>
                    <img src="{{ URL::asset($date['image'])}}" alt="" width="120px"><br>
                    <input type="file" name="image" value="{{(old('image')=='')? $date['image']:old('image')}}"><br>

                </td>
            </tr>
            <tr>
                <td><label for="name">Активный:</label></td>
                <td>
                    <input type="hidden" name="active" value="0">
                    <input {{($date['active']==1)? 'checked':''}} type="checkbox" name="active" id='isOnMain' value="1">

                </td>
            </tr>
        </table>
        <input type="submit" value="Сохранить">
        <hr>
    </form>

    @endsection