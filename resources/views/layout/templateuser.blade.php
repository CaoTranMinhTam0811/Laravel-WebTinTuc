<!DOCTYPE html>
<html>

<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <link rel="stylesheet" href="../trangchu/css/main.css">
    <link rel="stylesheet" href="../trangchu/css/user.css">
    <base href="{{asset('')}}">
    <script src="https://kit.fontawesome.com/f80801c97f.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;0,500;0,700;1,500;1,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <title>{!! $name !!}</title>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v11.0&appId=1787837751383296&autoLogAppEvents=1" nonce="uFkwjoed"></script>
</head>

<body>
    <div class="wrapper">
        @include('layout.header')
        <div class="banner">
            @include('layout.menu')
        </div>
        <div class="container mt-5 mb-2 pt-4">

            <div class="link__title">
                <span><a style="color: black" href="/">Trang chủ</a> </span>
                <span class="link__title-icon"><i class="fas fa-chevron-right"></i></span>
                <span class="link__title-link">{!! $name !!}</span>
                @if (isset($title))
                <span class="link__title-icon"><i class="fas fa-chevron-right"></i></span>
                <span class="link__title-link">{!! $title !!}</span>
                @endif
            </div>

            <section class="section__user">
                <div class="container row">
                    <div class="col-lg-2 col-xl-2 col-md-12 col-sm-12 user__left">
                        <div class="img__user">
                            <img src="upload/avatar/{!! Auth::user()->image !!}" alt="">
                        </div>
                        <a class="mt-2 btn btn-outline-success  " href="/editimg.html"><i class="fas fa-chevron-right"></i>ĐỔI ẢNH</a>
                        <span class="mb-3 text-white mt-1">{!! Auth::user()->username !!}</span>

                        <div class="user__menu">
                            <ul>
                                @if (Auth::user()->role > 0)
                                <li><a href="/admin">DashboardAdmin</a></li>
                                <!-- <li><a href="">BÀI VIẾT MỚI</a></li>
                                <li><a href="">BÀI VIẾT</a></li> -->
                                @endif
                                <!-- <li><a href="">ĐỔI THÔNG TIN</a></li>
                                <li><a href="">ĐỔI MẬT KHẨU</a></li> -->
                                <li><a href="/logout">ĐĂNG XUẤT</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-10 col-xl-10 col-md-12 col-sm-12">
                        @yield('content')
                    </div>
                </div>
            </section>
        </div>
        @include('layout.footer')
        @include('layout.boxcontract')
    </div>
</body>
<script src="trangchu/js/main.js"></script>
@yield('script')

</html>