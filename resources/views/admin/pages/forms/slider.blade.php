@extends('admin.base')

@section('content')
    <h2>Товар</h2>
    @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="" method="post" >
        {{ csrf_field() }}
        <table>

            <tr>
                <td>
                    <label for="category_id">Категория</label>
                </td>
                <td>

                    <select name="item_id">
                        @foreach($modelDate['item'] as $cat)

                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>





            <tr>
                <td>
                    <label for="name">Описание</label>
                </td>
                <td>
                    <textarea name="text" id="" cols="30" rows="10">
                        {{(old('text')=='')? $date['text']:old('text')}}
                    </textarea>

                </td>
            </tr>
            <tr>
            <tr>
                <td>
                    <label for="prop1">Свойство 1</label>
                </td>
                <td>
                    <input type="text" name="prop1" value="{{(old('prop1')=='')? $date['prop1']:old('prop1')}}">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="prop2">Свойство 2</label>
                </td>
                <td>
                    <input type="text" name="prop2" value="{{(old('prop2')=='')? $date['prop2']:old('prop2')}}">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="prop3">Свойство 3</label>
                </td>
                <td>
                    <input type="text" name="prop3" value="{{(old('prop3')=='')? $date['prop3']:old('prop3')}}">
                </td>
            </tr>

            <tr>
                <td>
                    <label for="prop4">Свойство 4</label>
                </td>
                <td>

                    <input type="text" name="prop4" value="{{(old('prop4')=='')? $date['prop4']:old('prop4')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label  for="active">Активный</label>
                </td>
                <td>
                    <input type="hidden" name="active" value="0">
                    <input {{($date['active']==1)? 'checked':''}} type="checkbox" name="active" value="1">
                </td>
            </tr>
        </table>
        <input type="submit" value="Сохранить">
    </form>  <hr>
@endsection