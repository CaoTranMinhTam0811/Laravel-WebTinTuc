@extends('layout.index2')

@section('content')
<section class="content__news">
    <div class="list__items--contents">
       
        @foreach ($news as $value)
        <div class="item__news">
            <div class="image__news">
                <a href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                    <img class="" src="upload/news/{!! $value['image'] !!}" alt="">
                </a>
            </div>
            <div class="content__news">
                <a class="blog__title blog__title--hover" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">
                    {!! $value['title'] !!}
                </a>
                <p class="content__news--details">
                    {!! $value['summary'] !!}
                </p>
                <span class="news__time"> {{ $value['created_at']->format('d/m/Y H:i') }}</span>
            </div>
        </div>
        @endforeach
    </div>
    {{ $news->links() }}
</section>
@endsection