@extends('admin.base')



@section('content')
    <h2>Категория</h2>
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
        {{ csrf_field() }}
        <table>
            <tr>
                <td>

                    <label for="title">Title:</label>
                </td>
                <td>
                    <input type="text" name="title" value="{{(old('title')=='')? $date['title']:old('title')}}" required><br>
                </td>
            </tr>
            <tr>
                <td>

                    <label for="name">Название:</label>
                </td>
                <td>
                    <input id='name' type="text" name="name" value="{{(old('name')=='')? $date['name']:old('name')}}" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="url">URL:</label>
                </td>
                <td>
                    <input id='url' type="text" name="url" value="{{(old('url')=='')? $date['url']:old('url')}}" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="metaDesc">Meta description:</label>
                </td>
                <td>
                    <input type="text" name="metaDesc" value="{{(old('metaDesc')=='')? $date['metaDesc']:old('metaDesc')}}"><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="description">Описание:</label>
                </td>
                <td>
                    <input type="text" name="description" value="{{(old('description')=='')? $date['description']:old('description')}}"><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="image">Картинка:</label>
                </td>
                <td>
                    <img src="{{ URL::asset($date['image'])}}" alt="" width="120px"><br>
                    <input type="file" name="image" value="{{(old('image')=='')? $date['image']:old('image')}}"><br>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="active">Активный:</label>
                </td>
                <td>
                    <input type="hidden" name="active" value="0">
                    <input {{($date['active']==1)? 'checked':''}} type="checkbox" name="active" value="1">
                </td>
            </tr>
        </table>




        <input type="submit" value="Сохранить">
    </form>
    <hr>

@endsection