@extends('admin.base')



@section('content')
    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Основное</a></li>
            <li><a href="#tabs-2">Картинки</a></li>
        </ul>
        <div id="tabs-1">
            <h2>Проект</h2>
            <form action="" method="post">
                {{csrf_field()}}
                <table>
                    <tr>
                        <td><label for="name">Название:</label></td>
                        <td><input id='name' type="text" name="name" value="{{old('name')!=''?old('name'):$date['name']}}"></td>
                    </tr>
                    <tr>
                        <td><label for="url">URL:</label></td>
                        <td><input id='url' type="text" name="url" value="{{old('url')!=''?old('url'):$date['url']}}"></td>
                    </tr>
                    <tr>
                        <td><label for="name">Опичание:</label></td>
                        <td><textarea name="text" id="" cols="30" rows="10">
                                {{old('text')!=''?old('text'):$date['text']}}
                            </textarea>

                    </tr>
                </table>
                <input type="submit" value="Сохранить">
            </form>
        </div>
        <div id="tabs-2">
            <h2>Картинки</h2>
            <div class="list">

            </div>
            <div>
                <form action="" method="post" enctype="multipart/form-data" id="formaddimage">
                    {{csrf_field()}}
                    <input type="hidden" name="project_id" value="{{$date['id']?$date['id']:0}}">
                    <label for="name">Название:</label>
                    <input type="text" name="name">

                    <label for="image">Картинка:</label>
                    <input type="file" name="image">

                    <label for="">Активный:</label>
                    <input type="hidden" name="active" value="0">
                    <input type="checkbox" name="active" value="1">
                    <input type="submit" value="Добавить"  id="addImageProject">

                </form>
            </div>
        </div>
    </div>
    <script>
        $('#tabs').tabs();

        $('body').on('click', '.delete', function(evn){
            alert(1);
            $.get({
                url:$(this).attr('href')+'?allow=true',
                success:function () {
                    refreshImageList();alert(1);
                }
            });
            evn.preventDefault();
        });
        
        function refreshImageList() {
            var id=$('input[name="project_id"]').val();
            var list=$('body .content .list');
            $.ajax({
                type:'get',
                url:'/admin/ajax/getlistimagesproject',
                dataType:'json',
                data:{'id':id},
                success:function (date) {
                    $(list).html('');
                    for(var i=0;i<date.length;i++){
                        var elem='<div>' +
                            '<i>' +((i+1).toString())+
                            '. </i>' +
                            '<span>' +
                            '<b><a href="/admin/imagesproject/edit/'+date[i]['id']+'">' +
                            date[i]['name']+
                            ' </a> </b>' +
                            '</span> ' +
                            '<br> ' +
                            '<span>' +
                            '<img src="/' +date[i]['image']+'" width="150px"/></span><br>' +
                            '<span>' +
                            '<a class="delete" onclick="return false;" href="/admin/imagesproject/delete/'+date[i]['id']+'">Удалить</a>' +
                            '</span>' +
                            '</div>';
                        $(list).append($(elem));



                    }
                }
            });
        }
        refreshImageList();
    $('#addImageProject').click(function (env) {
        var form=$('#formaddimage')[0];
        var f=new FormData(form);
        $.ajax({
            type:'post',
            url:'/admin/ajax/uploadimagesproject',
            data:f,
            async: false,
            cache: false,
            contentType: false,
            processData: false,
            success:function (date) {

            },
            error:function (date) {
                alert('Заполните данные правильно');
            }

        });
        evn.preventDefault();
        refreshImageList();
        $('#formaddimage')[0].reset();
    });
    </script>
    @endsection
