@extends('admin.base')



@section('content')
    <h2>Информационная страница</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post">
        {{csrf_field()}}
        <table>
            <tr>
                <td><label for="title">Title</label></td>
                <td><input type="text" name="title" value="{{(old('title')=='')? $date['title']:old('title')}}"></td>
            </tr>
            <tr>
                <td><label for="name">Название</label></td>
                <td><input type="text" name="name" value="{{(old('name')=='')? $date['name']:old('name')}}"></td>
            </tr>
            <tr>
                <td><label for="url">URL</label></td>
                <td><input type="text" name="url" value="{{(old('url')=='')? $date['url']:old('url')}}"></td>
            </tr>
            <tr>
                <td><label for="metaDesc">meta Description</label></td>
                <td><input type="text" name="metaDesc" value="{{(old('metaDesc')=='')? $date['metaDesc']:old('metaDesc')}}"></td>
            </tr>

            <tr>
                <td><label for="text">Текст страницы:</label></td>
                <td><textarea name="text" id="text" cols="30" rows="10">{{(old('text')=='')? $date['text']:old('text')}}</textarea></td>
            </tr>

        </table>
        <input type="submit" value="Сохранить">
    </form>
    <hr>

    @endsection