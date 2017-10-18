@extends('admin.base')

@section('content')
    <h2>Предложения</h2>
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
                    <label for="unit_id">Товар</label>
                </td>
                <td>

                    <select name="item_id">
                        @foreach($modelDate['item'] as $u)

                            <option value="{{$u->id}}">{{$u->title}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <label for="name">Имя</label>
                </td>
                <td>
                    <input type="text" name="name" value="{{(old('name')=='')? $date['name']:old('name')}}">
                </td>
            </tr>
            <tr>
                <td>
                    <label for="unit_id">Единица измерения</label>
                </td>
                <td>

                    <select name="unit_id" value="{{(old('unit_id')=='')? $date['unit_id']:old('unit_id')}}">
                        @foreach($modelDate['unit'] as $u)

                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>

            <tr>
                <td>
                    <label for="material_id">Основной материал производства</label>
                </td>
                <td>

                    <select name="material_id" value="{{(old('material_id')=='')? $date['material_id']:old('material_id')}}">
                        @foreach($modelDate['material'] as $u)

                            <option value="{{$u->id}}">{{$u->name}}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="price">Цена</label>
                <td><input type="text" name="price" value="{{(old('price')=='')? $date['price']:old('price')}}"></td>
                </td>
            </tr>
            <tr>
                <td><label for="description">Описание</label>
                <td>
                    <textarea name="description" id="" cols="30" rows="10">
{{(old('description')=='')? $date['description']:old('description')}}
                    </textarea>
                </td>
                </td>
            </tr>
            <tr>
                <td><label for="active">Активный</label></td>
                <td>
                    <input type="hidden" name="active" value="0">
                    <input  {{($date['active']==1)? 'checked':''}} type="checkbox" name="active" value="1">
                </td>
            </tr>
        </table>
        <input type="submit">
    </form>  <hr>
    @endsection