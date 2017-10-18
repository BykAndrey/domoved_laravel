
<div class="otzyvItem {{ $side }}">

    <div class="PhotoMan" style="background-image: url({{URL::asset($item->resize($item->image,150))}});">

    </div>

    <div class="description">
        <p class="otzyvName">{{ $item->name }}</p>
        <p class="otzyvText">
            {{ $item->opinion }}
        </p>
    </div>
</div>