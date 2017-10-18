@extends('admin.base')

@section('content')

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Основное</a></li>
            <li><a href="#tabs-2">Картинки</a></li>

        </ul>
        <div id="tabs-1">

            <h2>Товар</h2>
            @if(isset($date['id']))
                <p>  <b> ID: </b> <span id="id_ajax">{{$date['id']}}</span></p>
            @endif
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
                            <label for="category_id">Категория</label>
                        </td>
                        <td>

                            <select name="category_id">
                                @foreach($modelDate['category'] as $cat)

                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label for="name">Название</label>
                        </td>
                        <td>
                            <input id="name" type="text" name="name" value="{{(old('name')=='')? $date['name']:old('name')}}">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label for="name">Title</label>
                        </td>
                        <td>
                            <input type="text" name="title" value="{{(old('title')=='')? $date['title']:old('title')}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name">URL</label>
                        </td>
                        <td>
                            <input id="url" type="text" name="url" value="{{(old('url')=='')? $date['url']:old('url')}}">
                        </td>
                    </tr>

                    <tr>
                        <td>
                            <label for="name">Описание</label>
                        </td>
                        <td>
                            <input type="text" name="description" value="{{(old('description')=='')? $date['description']:old('description')}}">
                        </td>
                    </tr>
                    <tr>
                    <tr>
                        <td>
                            <label for="metaDesc">meta desc</label>
                        </td>
                        <td>
                            <input type="text" name="metaDesc" value="{{(old('metaDesc')=='')? $date['metaDesc']:old('metaDesc')}}">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label  for="active">Активный</label>
                        </td>
                        <td>
                            <input type="hidden" name="active" value="0">
                            <input {{($date['active']==1)? 'checked':''}} type="checkbox" name="active" id='isOnMain' value="1">
                        </td>
                    </tr>



                    <tr>
                        <td>
                            <label for="isOnMain">Опубликовать вместе с категориями</label>
                        </td>
                        <td>
                            <input type="hidden" name="isOnMain" value="0">
                            <input {{($date['isOnMain']==1)? 'checked':''}}  type="checkbox" name="isOnMain" id='isOnMain' value="1">
                        </td>
                    </tr>


                    <tr>
                        <td>
                            <label for="image">Картинка</label>
                        </td>
                        <td>
                            <img src="{{URL::asset($date['image'])}}" alt="" width="200px"><br>
                            <input type="file" name="image" value="{{old('image')}}">
                        </td>
                    </tr>


                </table>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div id="tabs-2">
            @if(isset($date['id']))
                <div>
                    <h2>Картинки</h2>
                    <div id="list">

                    </div>
                    <div>

                        <form action="/admin/image/create" method="post" enctype="multipart/form-data" id="formImage">
                            {{ csrf_field() }}
                            <span>
                <label for="">Название:</label>
                <input type="text" name="name">
                <input type="hidden" name="item_id" value="{{$date['id']}}">
            </span>
                            <span>
                <label for="">Картинка:</label>
                <input id='file' type="file" name="image">
            </span>
                            <span>
                <label for="">Активный:</label>
                 <input type="hidden" name="active" value="0">
                <input type="checkbox" name="active" value="1">
            </span>
                            <span>
              <input type="submit" value="Добавить" id="addImage">
            </span>
                        </form>
                    </div>
                </div>
            @endif
        </div>
    </div>




 <hr>




    <script>
        $('#tabs').tabs();
    </script>
    @endsection

