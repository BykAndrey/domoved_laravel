@extends('admin.base')

@section('content')
    <h2>Настройки</h2>
    <div class="options">
        <div class="option">
            <h3>Сменить пароль</h3>
            <form action="{{route('changepass')}}" method="post">
                {{csrf_field()}}
                <labal>Старый пароль:</labal>
                <br>
                <input type="password" name="oldpass">  <br>
                <labal>Новый пароль:</labal>
                <br>
                <input type="password" name="newpass"><br>
                <input type="submit" value="Заменить">
            </form>
        </div>
    </div>
    @endsection