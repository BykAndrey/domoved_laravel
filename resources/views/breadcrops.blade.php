




<div class="breadcrops">
    <ul>

        <li><a href="/">Главная</a> / </li>


        @foreach($crops as $crop)

        <li><a href="{{$crop[0]}}/">{{$crop[1]}}</a> / </li>
        @endforeach
    </ul>
</div>
