@extends('layout.index2')

@section('content')
<section class="content__news">
    <div class="list__items--contents">
        <?php
        function chargeColor($str,$tukhoa)
        {
            return  str_replace($tukhoa,"<span style='color:blue;'>$tukhoa</span>",$str);
        }
        ?>
        @foreach ($news as $value)
        <div class="item__news">
            <div class="image__news">
                <a href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                    <img src="upload/news/{!! $value['image'] !!}">
                </a>
            </div>
            <div class="content__news">
                <a class="blog__title blog__title--hover" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                    {!! chargeColor($value['title'], $keyword) !!}
                </a>
                <p class="content__news--details">
                    {!!chargeColor($value['summary'], $keyword) !!}
                </p>
                <span class="news__time"> {{ $value['created_at']->format('d/m/Y H:i') }}</span>

            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection