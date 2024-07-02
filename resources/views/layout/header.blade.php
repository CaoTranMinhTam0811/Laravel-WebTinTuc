<div class="wrapper__header header">
    @include('layout.menumobile')
    <div class="container">
        <div class="row header__flex">
            <div class="header_left col-lg-3 col-sm-12 col-md-12 col-xl-3">
                <div class="menu-md-header">
                    <i class="fas fa-ellipsis-v"></i>
                </div>
                <div class="logo">
                    @if($about != null)
                    <img src="upload/logo/{!! $about['logo'] !!}" alt="">
                    @endif
                </div>
                <div class="form-md-header">
                    <form action="/search" method="post">
                        @csrf
                        <span class="btn display__form display__form__mobile text-white">
                            <i class="fas fa-search"></i>
                        </span>
                        <div class="input__search">
                            <input type="text" name="keyword" placeholder="Tìm kiếm...">
                            <button class="btn" type="submit">
                                <i class="fas fa-arrow-right"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="header_right col-lg-9">
                <div class="support hidden-sm ">
                    <p class="support--title">
                        Email liên hệ
                    </p>
                    <a href="#">
                        <p class="support--content">
                             {{ ($about != null) ? $about['email'] : '' }}
                        </p>
                    </a>
                </div>
                <div class="support hidden-sm">
                    <p class="support--title">
                        Tư vấn
                    </p>
                    <a href="">
                        <p class="support--content">
                            HOTLINE {{ ($about != null) ? $about['phone'] : '' }}
                        </p>
                    </a>
                </div>
                <div class="support hidden-sm support--clock">
                    <p class="support--title">
                        Thời gian làm việc
                    </p>
                    <a href="">
                        <p class="support--content">
                            7:00 - 17:00
                        </p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>