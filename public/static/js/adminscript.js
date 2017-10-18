$(document).ready(function () {

    $(function(){
        $('#name').liTranslit({
            elAlias:$('#url')
        });

    });



    /**/
    var id=$('#id_ajax').html();
    var list=$('#list');

    listimage();





    $('body').on('click', '.delete', function(evn){
        $.get({
            url:$(this).attr('href')+'?allow=true',
            success:function () {
                listimage();
            }
        });
        evn.preventDefault();
    });
    function listimage() {

        $.ajax({
            type:'get',
            url:'/admin/ajax/getlistimageitem',
            dataType:'json',
            data:{'id':id},
            success:function (date) {
                $(list).html('');
                for(var i=0;i<date.length;i++){
                    var elem='<div>' +
                        '<i>' +((i+1).toString())+
                        '. </i>' +
                        '<span>' +
                        '<b><a href="/admin/image/edit/'+date[i]['id']+'">' +
                        date[i]['name']+
                        ' </a> </b>' +
                        '</span> ' +
                        '<br> ' +
                        '<span>' +
                        '<img src="/' +date[i]['image']+'" width="150px"/></span><br>' +
                        '<span>' +
                        '<a class="delete" onclick="return false;" href="/admin/image/delete/'+date[i]['id']+'">Удалить</a>' +
                        '</span>' +
                        '</div>';
                    $('#list').append($(elem));
//

                }
            }
        });
    }

    $('#addImage').click(function(evn){
        var f=$('#formImage')[0];
        var formData=new FormData(f);
        $.ajax({
            type:'post',
            url:'/admin/ajax/uploadimage',
            data: formData,
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
        listimage();
        $('#formImage')[0].reset();
    });




});