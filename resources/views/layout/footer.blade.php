<div class="footer text-light" style="background-color: #4643D0">
    <div class="container">
        <div class="menu__footer">
            <div class="row">
                <div class="col-12 col-lg-3 col-xl-3 col-md-6 col-sm-12">
                    <div class="footer__location">
                        <span class="footer__title">Thông tin chung</span>
                        <span class="footer__title footer__title--p0">Trụ sở chính</span>
                        <p>{{ ($about != null) ? $about['address'] : '' }}</p>
                        <span class="footer__title footer__title--p0">Văn phòng đại diện</span>
                        <div class="footer__branch">
                            <p class="footer__branch--title">Chi nhánh TP.Hồ Chí Minh</p>
                            <p></p>
                        </div>
                        <div class="footer__branch">
                            <p class="footer__branch--title">Chi nhánh Đà Nẵng</p>
                            <p>5-6 Nguyễn Văn Linh, Nam Dương, Hải Châu, Đà Nẵng</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-xl-3 col-md-6 col-sm-12">
                    <div class="nav__menu--footer">
                        <span class="footer__title">Hướng dẫn</span>
                        <ul class="sub__menu">
                            <li class="item__menu"><a class="text-light" href="">Trang chủ</a></li>
                            <li class="item__menu"><a class="text-light" href="">Giới thiệu</a></li>
                            <li class="item__menu"><a class="text-light" href="">Tin tức</a></li>
                            <li class="item__menu"><a class="text-light" href="">Cơ hội hợp tác</a></li>
                            <li class="item__menu"><a class="text-light" href="">Lịch sự kiện</a></li>
                            <li class="item__menu"><a class="text-light" href="">Quốc gia</a></li>
                            <li class="item__menu"><a class="text-light" href="">Đào tạo</a></li>
                            <li class="item__menu"><a class="text-light" href="">Liên hệ</a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-12 col-lg-3 col-xl-3 col-md-6 col-sm-12">
                    <div class="nav__menu--footer">
                        <span class="footer__title">Chính sách</span>
                        <ul class="sub__menu">
                            <li class="item__menu"><a class="text-light" href="">Trang chủ</a></li>
                            <li class="item__menu"><a class="text-light" href="">Giới thiệu</a></li>
                            <li class="item__menu"><a class="text-light" href="">Tin tức</a></li>
                            <li class="item__menu"><a class="text-light" href="">Cơ hội hợp tác</a></li>
                            <li class="item__menu"><a class="text-light" href="">Lịch sự kiện</a></li>
                            <li class="item__menu"><a class="text-light" href="">Quốc gia</a></li>
                            <li class="item__menu"><a class="text-light" href="">Đào tạo</a></li>
                            <li class="item__menu"><a class="text-light" href="">Liên hệ</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-lg-3 col-xl-3 col-md-6 col-sm-12">
                    <div class="nav__menu--footer">
                        <span class="footer__title">Fanpage</span>
                        <div class="fb-page" data-href="https://www.facebook.com/congdongvnexpress" data-tabs="timeline"
                            data-width="350" data-height="auto" data-small-header="false"
                            data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true">
                            <blockquote cite="https://www.facebook.com/congdongvnexpress" class="fb-xfbml-parse-ignore">
                                <a href="https://www.facebook.com/congdongvnexpress"></a>
                            </blockquote>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="copyright">
        <i class="fa fa-copyright" aria-hidden="true"></i>
        Bản quyền thuộc về <a class="text-warning" target="_blank" href="{{ ($about != null) ? $about['linkcopyright'] : '#' }}">{!!$about["copyright"]!!}</a> | Cung cấp bởi <a class="text-warning" href="{!!$about['linkcopyright']!!}">{!!$about["copyright"]!!}</a>
    </div>
</div>