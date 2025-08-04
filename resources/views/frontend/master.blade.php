<!DOCTYPE html>
<html>

<head>
    <link rel="shortcut icon" href="{{asset('/faviconn.ico')}}">
    <base href="{{asset('frontend')}}/">
    <title>@yield('title')</title>
    <meta name="description" content="@yield('description')" />
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta property="og:url" content="{{url('/')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="@yield('title')">
    <meta property="og:description" content="@yield('description')">
    <meta property="og:keywords" content="@yield('keywords')" />
    <meta property="og:image" content="https://www.upsieutoc.com/images/2019/07/31/BANNER1.jpg">
    <meta property="og:image:width" content="600">
    <meta property="og:image:height" content="315">
    <meta property="og:site_name" content="{{url('/')}}">
    <meta name="dc.language" content="vi-VN">
    <link rel="alternate" href="{{url('/')}}" hreflang="vi-vn" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat|Saira+Semi+Condensed&display=swap" rel="stylesheet">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-155392144-1"></script>
    <script type="text/javascript" src="js/lib/jquery.min.js"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-155392144-1');
    </script>

    <style>
        .wrap-loading {
            z-index: 99999;
            position: fixed;
            width: 100%;
            height: 100%;
            background: #222;
            opacity: 0.5;
            top: 0;

        }

        .shop-flex {
            display: flex;
        }

        .text-yellow {
            color: #ffc154;
        }

        .text-red {
            color: #ed2331;
        }

        .ml8 {
            margin-left: 8px;
        }

        .lds-ring {
            top: 45%;
            left: 45%;
            display: inline-block;
            position: absolute;
            width: 64px;
            height: 64px;
        }

        .lds-ring div {
            box-sizing: border-box;
            display: block;
            position: absolute;
            width: 80px;
            height: 80px;
            margin: 6px;
            border: 6px solid #fff;
            border-radius: 50%;
            animation: lds-ring 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
            border-color: #fff transparent transparent transparent;
        }

        .lds-ring div:nth-child(1) {
            animation-delay: -0.45s;
        }

        .lds-ring div:nth-child(2) {
            animation-delay: -0.3s;
        }

        .lds-ring div:nth-child(3) {
            animation-delay: -0.15s;
        }

        @keyframes lds-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        body {
            -webkit-touch-callout: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            -o-user-select: none;
            user-select: none;
        }
    </style>
    <!-- CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="lib/semantic/semantic.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="shortcut icon" type="image/png" href="images/yasui-removebg.ico" />
    <link rel="stylesheet" type="text/css" href="css/swiper.min.css">
    <link rel="stylesheet" type="text/css" href="css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.css">
    <link rel="stylesheet" type="text/css" href="lib/toastr/toastr.min.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Sans&display=swap" rel="stylesheet">
    <div class="wrap-loading">
        <div class="ui bottom attached loading tab segment">
        <p></p>
        <p></p>
        </div>
    </div>
</head>

<body>
    <!--popup img-->
    <div class="modal fade" id="popImgsda" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h1 class="modal-title">@yield('title')</h1>
                    <h2 class="modal-title">@yield('title_h2_1')</h2>
                    <p>@yield('content_seo')</p>
                    <h2 class="modal-title">@yield('title_h2_2')</h2>
                    <h3 class="modal-title">@yield('title_h3_1')</h3>
                    <p>@yield('content_seo_1')</p>
                    <h3 class="modal-title">@yield('title_h3_2')</h3>
                    <h3 class="modal-title">@yield('title_h3_3')</h3>
                </div>
                <div class="modal-body">
                    <p class="sa-popimg"><img src="#" alt="@yield('title_h1')">
                    </p>
                </div>
            </div>
        </div>
    </div>
    <header class="shopdaxuaHeader">
        <div class="social">
            <div class="social__left">
                <a href=""><i class="fab fa-facebook-square"></i></a>
                <a href=""><i class="fab fa-twitter-square"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
            <div id="social__right" class="social__right">
                <a href="{{url('/lich-su-giao-dich')}}"><i class="fas fa-user-circle"></i>Tài Khoản Của Tôi</a>

            </div>
        </div>
        <div class="navigation">
            <div class="navigation__left">
                <div class="logo">
                    <a href="{{url('/')}}"><img src="images/logo.png"></a>
                </div>
                <div class="select" id="nav-select">
                    <div class="text">
                        <div class="text-1">
                            <i class="fas fa-bars"></i>
                            <span>Hướng Dẫn</span>
                        </div>
                        <div class="text-2">
                            <span>Chọn Danh Mục</span>
                            <i id="nav-updown" class="fas fa-caret-down"></i>
                        </div>
                    </div>
                    <div class="game">
                        <ul class="game__list">
                            <li onclick="demo()" class="game__item"
                                >
                                <div class="overlay">
                                    Cách Mua Acc
                                </div>
                            </li>
                            <li onclick="demo()" class="game__item"
                                >
                                <div class="overlay">
                                    Bảo Mật Tài Khoản
                                </div>
                            </li>
                            <li onclick="demo()" class="game__item"
                                >
                                <div class="overlay">
                                    Hướng Dẫn Nạp Thẻ
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="navigation__right">
                <div class="text-area">
                    <a class="menu-item" href="{{url('/')}}">Trang Chủ</a>
                    <a class="menu-item" href="{{url('/nap-the.html')}}">Nạp Thẻ</a>
                    {{-- <a class="menu-item" href="{{url('/giao-dich-gan-day.html')}}">Uy Tín Của Shop</a> --}}
                </div>

                @if(Auth::guard('users_client')->check())
                    <div class="ui horizontal list avata-area">
                        <div class="item">
                            <img class="ui mini circular image" src="images/son.png">
                            <div class="content">
                                <div class="content__email">
                                    {{Auth::guard('users_client')->user()->name}}
                                </div>
                                <div class="content__money">
                                    <span id="money" style="color:#E9BC70">{{number_format(Auth::guard('users_client')->user()->money)}}đ</span>
                                    <span onclick="Logout()" style="color:#137F50;">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Thoát</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="button-area">
                        <button onclick="callregisterform()" class="button-yellow">Đăng Kí</button>
                        <button onclick="openmodal()" class="button-green">Đăng Nhập</button>
                    </div>
                @endif

                <div id="mobile-area" class="mobile-area">
                    <i class="fas fa-bars"></i>
                    <div class="ui left demo vertical inverted sidebar labeled icon menu">
                        <a href="{{url('/')}}" class="item">
                            <i class="home icon"></i>
                            Trang Chủ
                        </a>
                        <a href="{{url('/nap-the.html')}}" class="item">
                            <i class="block money icon"></i>
                            Nạp Thẻ
                        </a>

                        <a onclick="openmodal()" class="item">
                            <i class="sign-in icon"></i>
                            Đăng Nhập
                        </a>
                        <a onclick="callregisterform()" class="item">
                            <i class="laptop icon"></i>
                            Đăng Kí
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <h1 class="shopdaxuaHeader__title">Shop Acc Đột Kích</h1>
        <h2 class="shopdaxuaHeader__subtitle">Bán Vì Đam Mê Chứ Lời Lãi Gì Tầm Này !</h2>
        <div class="shopdaxuaHeader__scroll">
            <a class="scroll__item actived">
                <img class="" src="img/logo2-tiny.png" alt="">
                <div>
                    Acc Đột Kích
                </div>
            </a>
            {{-- <a onclick="demo()" class="scroll__item">
                <img class="service2"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMAQMAAACUDtN9AAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAABlJREFUeNrtwTEBAAAAwqD1T20JT6AAAOBrCmQAAb3x7N4AAAAASUVORK5CYII=">
                <div>Acc Random 20k</div>
            </a>
            <a onclick="demo()" class="scroll__item">
                <img class="service3"
                    src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAIwAAACMAQMAAACUDtN9AAAAA1BMVEX///+nxBvIAAAAAXRSTlMAQObYZgAAABlJREFUeNrtwTEBAAAAwqD1T20JT6AAAOBrCmQAAb3x7N4AAAAASUVORK5CYII=">
                <div>Acc Random 50k</div>
            </a> --}}
        </div>
    </header>

    <div>
        @yield('main')
    </div>

    <section class="shopdaxuaHowtobuy">
        <div class="ui grid">
            <div class="sixteen wide mobile sixteen wide tablet nine wide computer column">
                <div id="stepImages" class="howtobuy-image">
                    <div class="animated delay-0.5s fadeInUp"><img class="stepImage" src="images/1.png"
                            alt="SERVICES.step1" title="SERVICES.step1">
                    </div>
                </div>
            </div>
            <div class="sixteen wide mobile sixteen wide tablet seven wide computer column">
                <div class="step-title">
                    Hướng Dẫn Mua Nick?
                </div>
                <div id="stepContent" class="step-content">
                    <div class="step actived">
                        <div class="number">1</div>
                        <div class="text">Sử dụng bộ lọc để tìm kiếm Acc phù hợp</div>
                    </div>
                    <div class="step">
                        <div class="number">2</div>
                        <div class="text">Sau khi tìm thấy Acc phù hợp , ấn vào Xem Thêm để xem thông tin chi tiết</div>
                    </div>
                    <div class="step">
                        <div class="number">3</div>
                        <div class="text">Ấn nút Mua Ngay sau đó chọn phương thức thanh toán phù hợp</div>
                    </div>
                    <div class="step">
                        <div class="number">4</div>
                        <div class="text"> Sau khi thanh toán thành công , tài khoản và mật khẩu sẽ hiện ở lịch sử mua
                            acc!</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="login-modal" class="ui modal">
        <i id="modal-close" class="fas fa-times close"></i>
        <!-- <div class="header">Header</div> -->
        <div class="content">
            <div class="login">
                <div class="login-title">
                    <i class="fas fa-user-check"></i>
                    <span>Đăng Nhập</span>
                </div>
                <div class="login-content">
                    <div class="login-label">
                        Email *
                    </div>
                    <div class="ui input">
                        <input type="text" id="email">
                    </div>
                    <div class="login-label">
                        Mật Khẩu *
                    </div>
                    <div class="ui input">
                        <input type="password" id="password">
                    </div>
                    <div class="login-action">
                        <a class="login-forget" href="#">
                            Quên Mật Khẩu !
                        </a>
                        <div class="login-button">
                            <button onclick="Login()" class="button-green">Đăng Nhập</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="register">
                <div class="register-title">
                    <i class="fas fa-user-check"></i>
                    <span>Đăng Kí</span>
                </div>
                <div class="register-content">
                    <button class="button-email" onclick="emailregister()">
                        <i class="fas fa-envelope"></i>
                        Đăng kí bằng Email
                    </button>
                    <div class="logo">
                        <img src="images/yasuo-hinh.png">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <footer class="shopdaxuaFooter">
        <div class="ui grid">
            <div class="sixteen wide mobile ten wide computer column">
                <div class="footer-content">
                    <div class="logo">
                        <img src="images/yasuo-hinh.png">
                    </div>
                    <div class="term">
                        <div class="copy">© 2020 ShopCuong678.Com - All Rights Reserved</div>
                        <a href="#">Terms of use</a>
                        <span class="divide">/</span>
                        <a href="#">Privacy Policy</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    </div>
    <div hidden>@yield('keywords')</div>
</body>
{{-- <script src="js/bootstrap4.minn.js"></script> --}}

<script type="text/javascript" src="lib/semantic/semantic.min.js"></script>
<script type="text/javascript" src="js/lib/particles.min.js"></script>
<script type="text/javascript" src="lib/toastr/toastr.min.js"></script>
<script type="text/javascript" src="js/lib/AutoNumberic.js"></script>
<script type="text/javascript" src="js/lib/swiper.min.js"></script>
<script type="text/javascript" src="js/lib/sweetalert.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script>
    loading('hide');
</script>
{{-- <script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5e1dca3d27773e0d832d7c85/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script> --}}


</html>