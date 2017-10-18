@extends('admin.base')

@section('content')

    <h2>Вопрос</h2>
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
                <td>
                    <label for="">Имя</label>
                </td>
                <td>
                    <input type="text" name="name" value="{{old('name')?old('name'):$date['name']}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Телефон:</label>
                </td>
                <td>
                    <input type="text" name="phone" id='id_telephone' value="{{old('phone')?old('phone'):$date['phone']}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Email:</label>
                </td>
                <td>
                    <input type="email" name="email" value="{{old('email')?old('email'):$date['email']}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="">Вопрос:</label>
                </td>
                <td>
                    <textarea name="question" id="" cols="70" rows="10">
                        {{old('question')?old('question'):$date['question']}}
                    </textarea>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="">Ответ:</label>
                </td>
                <td>
                    <textarea name="answer" id="" cols="70" rows="10">
                        {{old('answer')?old('answer'):$date['answer']}}
                    </textarea>
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
    <script src="{{URL::asset('static/js/jquery.maskedinput.js')}}"></script>
    <script>	$('#id_telephone').mask('+7 (999) 999-9999');</script>
    @endsection