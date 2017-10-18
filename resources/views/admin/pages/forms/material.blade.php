@extends('admin.base')



@section('content')
    <h2>Материал</h2>
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
                    <label for="name">Название</label>
                </td>
                <td>
                    <input type="text" name="name" value="{{(old('name')=='')? $date['name']:old('name')}}">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="image">Картинка</label>
                </td>
                <td>
                    <img src="{{ URL::asset($date['image'])}}" alt="" width="120px"><br>
                    <input type="file" name="image" value="{{old('image')}}">
                </td>
            </tr>
        </table>
        <input type="submit" value="Сохранить">
    </form>  <hr>
@endsection