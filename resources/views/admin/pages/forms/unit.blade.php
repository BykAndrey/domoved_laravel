@extends('admin.base')



@section('content')
    <h2>Единицы измерения</h2>
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

        {{ csrf_field() }}

        <table>
            <tr>
                <td>
                    <label for="name">Название</label>
                </td>
                <td>
                    <input type="text" name="name" value="{{(old('name')!='')?old('name'):$date['name']}}">
                </td>
            </tr>
        </table>
        <input type="submit" value="Сохранить">
    </form>
    <hr>
        @endsection