@extends('admin.base')

@section('content')
    <h2>Отзыв</h2>
    <form action="" method="post" enctype="multipart/form-data">
        {{csrf_field()}}
        <table>
            <tr>
                <td>
                    <label for="name">Имя:</label>
                </td>
                <td>
                    <input type="text" name="name" value="{{old('name')?old('name'):$date['name']}}" required>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="email">email:</label>
                </td>
                <td>
                    <input type="email" name="email" value="{{old('email')?old('email'):$date['email']}}" required>
                </td>
            </tr>


            <tr>
                <td>
                    <label for="opinion">Отзыв:</label>
                </td>
                <td>
                    <input type="text" name="opinion" value="{{old('opinion')?old('opinion'):$date['opinion']}}" required>
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
    @endsection