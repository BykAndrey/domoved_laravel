@extends('base')

@section('metadate')
<meta name="description" content="Форма отзыва Компании ДомовеД">
<title>Форма отзыва Компании ДомовеД</title>
@endsection



@section('content')
<div class="sectionIndex">
    <div class="titleName">
        <h1>Оставьте свой отзыв
            <div class="linetitlename"></div>
        </h1>

    </div>
    <div class="listing">

        <div class="">


            <form  enctype="multipart/form-data" action="" method="post">
              {{csrf_field()}}
                <div class="question" style="border: none;box-shadow: none;">


                    <div class="info" style="float: inherit">
                        <div class="errors">
                            @foreach($errors->get('name') as $er)
                            {{$er}}
                        @endforeach</div>
                        <label for="image">Фото:</label>

                        <br>
                        <input type="text" name="name" value="{{old('name')}}">
                    </div>
                    <div class="infoQuestion">
                        <div class="errors">

                                @foreach($errors->get('email') as $er)
                                    {{$er}}
                                @endforeach
                        </div>
                        <label for="email">Email:</label>

                        <br>
                        <input type="email" name="email" value="{{old('email')}}">
                    </div>

                    <div class="infoQuestion">
                        <div class="errors">

                                @foreach($errors->get('opinion') as $er)
                                    {{$er}}
                                @endforeach
                        </div>
                        <label for="image">Отзыв:</label>

                        <br>

                       <textarea name="opinion" id="id_opinion" maxlength="150" row=5>
                           {{old('opinion')}}
                       </textarea>

                    </div>
                    <div class="infoQuestion">
                        <div class="errors">
                                @foreach($errors->get('image') as $er)
                                    {{$er}}
                                @endforeach</div>
                        <label for="image">Фото:</label>

                        <br>
                        <input type="file" name="image">
                    </div>

                    <input type="submit" value="Отправить">

                </div>


            </form>
        </div>
    @endsection
