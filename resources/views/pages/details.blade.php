@extends('layout.index2')
@section('content')
<section class="section__content__news">
    <section class="details__news">
        <a href="" class="title__details blog__title blog__title--hover">
            {!! $news['title'] !!}
        </a>
        <div class="details__news--time">
            <div class="news__time--left">
                <i class="fas fa-calendar-alt"></i>
                <span>{{ $news['created_at']->format('d/m/Y H:i') }}</span>
            </div>
            <div class="news__time--right">
                <i class="fas fa-user"></i>
                <span>Đăng bởi Admin</span>
            </div>
        </div>
        <div class="details__news--content">
            <div class="news__content--sort">
                {!! $news['summary'] !!}
            </div>
            <div class="news__content--img" style="text-align: center;">
                @if ($news['type'] == 0)
                @if ($news['link'] != '')
                <iframe height="440" src="{!! $news['link'] !!}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                @else
                <img class="w-100" src="upload/news/{!! $news['image'] !!}" alt="">

                @endif

                @else
                <img class="w-100" src="upload/news/{!! $news['image'] !!}" alt="">
                @endif

            </div>
            <div class="news__content--contents">
                {!! $news['content'] !!}

                <!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>(function(d, s, id) {
var js, fjs = d.getElementsByTagName(s)[0];
if (d.getElementById(id)) return;
js = d.createElement(s); js.id = id;
js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- Your share button code -->
<div class="fb-share-button" 
data-href="{!! $news['link'] !!}" 
data-layout="button_count">
</div>

            </div>
        </div>
        <div class="social__network">

        </div>
        <div class="same__topic">
            <div class="same__title">
                Bài Viết Cùng chủ đề
            </div>
            <ul>
                @foreach ($tinlienquan as $value)
                <li><a class="blog__title blog__title--hover" href="/news/{!! $value['id'] !!}_{!! $value['sort_title'] !!}.html">{!! $value['title'] !!}</a></li>
                @endforeach
            </ul>
        </div>
    
        <div class="box__comment">
            <div class="box__comment--title">Bình luận</div>
            <div class="list__comment">
                @foreach ($news['comment'] as $value)
                <div class="comment__item">
                    <div class="item__cmt--img">
                        <img src="upload/avatar/{!! $value['users']['image'] !!}">
                    </div>
                    <div class="item__cmt--content">
                        <div class="comment__author">{!! $value['users']['name'] !!}</div>
                        <div class="comment__time">{{ $value['created_at']->format('d/m/Y H:i') }}</div>
                        <div class="comment__contents">{!! $value['content'] !!}</div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div class="form__comment">
            @if (Auth::check())
            <div class="form__comment--title">
                Ý kiến của bạn
            </div>
            <form action="comment/{!! $news['id'] !!}" method="POST">
                @csrf
                <div class="form--comment">
                    <textarea name="content" id="" cols="30" rows="10" placeholder="Bình luận ..."></textarea>
                    <button class="contract__input contract__button--search">Gửi bình luận</button>
                </div>
            </form>
            @else
            <div class="form__comment--title">
                Vui lòng <a style="font-size: 1.5rem" href="/login">đăng nhập</a> để bình luận
            </div>
            @endif


        </div>
    </section>
</section>
@endsection
@section('script')
<script>
    $(document).ready(function() {
        $('.fix__content').removeClass('content__news--flex');
    });
</script>
@endsection