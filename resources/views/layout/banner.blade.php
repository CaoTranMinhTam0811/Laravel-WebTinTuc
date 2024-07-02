<div class="banner__carousel owl-carousel">
    @foreach ($banner as $value)
        @if ($value['active'] == 1)
        <div class="item__banner">
            <a href="#">
                <img class="" src="upload/banner/{!! $value['image'] !!}">
            </a>
        </div>
        @endif
    @endforeach
</div>