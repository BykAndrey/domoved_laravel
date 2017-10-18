<div class="projectItem  {{$side}} ">
    <div class="imageproject">

        <img src="{{URL::asset($item->resize($item->getFirstImage(),220))}}" alt="" width="220px" height="160px">
    </div>
    <div class="description">
        <h3><a href="/projects/{{ $item->url}}/">{{ $item->name }}</a></h3>
        <p>{{ $item->text}}</p>
    </div>
</div>
