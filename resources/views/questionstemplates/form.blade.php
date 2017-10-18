
<div class="sectionIndex">

    <div class="titleName">
        <h1>Задайте свой вопрос
            <div class="linetitlename"></div>
        </h1>
    </div>

    <div class="listing">

        <form action="{{route('questionadd')}}" method="post">
          {{csrf_field()}}

            <div class="question">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="info">

                    <label for="name">Имя:</label>
                    <br>
                    <input type="text" name="name" value="{{old('name')}}" required>
                </div>

                <div class="info">
                    <label for="phone">Телефон:</label>
                    <br>
                    <input type="text" id='id_telephone' name="phone" value="{{old('phone')}}" required>
                </div>
                <div class="infoQuestion">

                    <label for="email">Email:</label>
                    <br>
                    <input type="email" name="email" value="{{old('email')}}" required>
                </div>
                <div class="infoQuestion">

                    <label for="email">Имя:</label>
                    <br>
                    <br>
                    <textarea name="question" id="" cols="30" rows="10" required>{{old('question')}}</textarea>
                </div>
                <input type="submit" value="Отправить">
            </div>


        </form>
    </div>
</div>
