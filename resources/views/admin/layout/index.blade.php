<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from colorlib.com/polygon/admindek/default/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 12 Dec 2019 16:07:52 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <title>Admin - News</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description"
        content="Admindek Bootstrap admin template made using Bootstrap 4 and it has huge amount of ready made feature, UI components, pages which completely fulfills any dashboard needs." />
    <meta name="keywords"
        content="flat ui, admin Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="colorlib" />
    <base href="{{asset('')}}">
    <link rel="icon" href="https://colorlib.com/polygon/admindek/files/assets/images/favicon.ico" type="image/x-icon">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Quicksand:500,700" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/bootstrap.min.css">

    <link rel="stylesheet" href="admin_asset/css/waves.min.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/feather.css">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/font-awesome-n.min.css">

    <link rel="stylesheet" href="admin_asset/css/chartist.css" type="text/css" media="all">

    <link rel="stylesheet" type="text/css" href="admin_asset/css/style.css">
    <link rel="stylesheet" type="text/css" href="admin_asset/css/widget.css">
</head>

<body>

    <div class="loader-bg">
        <div class="loader-bar"></div>
    </div>

    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">
            @include('admin.layout.header')

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">

                   @include('admin.layout.menu')
                    
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            @yield('content')
                            @if (session('thongbao'))
                            <div class="alert alert-success">
                                {{ session('thongbao') }}
                            </div>
                            @endif
                        </div>
                    </div>

                    <div id="styleSelector">
                    </div>

                </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="admin_asset/ckeditor/ckeditor.js"></script>

<script> CKEDITOR.replace( 'editor1' ); </script>

<script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

<script data-cfasync="false" src="admin_asset/dist/js/email-decode.min.js"></script>

<script type="text/javascript" src="admin_asset/dist/js/jquery.min.js"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/jquery-ui.min.js"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/popper.min.js"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/bootstrap.min.js"></script>

<script src="https://cdn.ckeditor.com/ckeditor5/28.0.0/classic/ckeditor.js"></script>

<script src="admin_asset/dist/js/waves.min.js" type="text/javascript"></script>

<script type="text/javascript" src="admin_asset/dist/js/jquery.slimscroll.js"></script>

<script src="admin_asset/dist/js/jquery.flot.js" type="text/javascript"></script>

<script src="admin_asset/dist/js/jquery.flot.categories.js" type="text/javascript"></script>

<script src="admin_asset/dist/js/curvedlines.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/jquery.flot.tooltip.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/chartist.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/amcharts.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/serial.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/light.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/pcoded.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script src="admin_asset/dist/js/vertical-layout.min.js" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/custom-dashboard.min.js"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript" src="admin_asset/dist/js/script.min.js"></script>

<script async src="https://www.googletagmanager.com/gtag/js?id=UA-23581568-13" type="d2d1d6e2f87cbebdf4013b26-text/javascript"></script>

<script type="d2d1d6e2f87cbebdf4013b26-text/javascript">
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'UA-23581568-13');
</script>

<script src="admin_asset/dist/js/rocket-loader.min.js" data-cf-settings="d2d1d6e2f87cbebdf4013b26-|49" defer=""></script>

@yield('script')

</body>

</html>