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

    .social-icons {
      position: fixed;
      bottom: 20px;
      right: 20px;
      display: flex;
      flex-direction: column;
      gap: 15px;
      z-index: 1000;
    }

        /* Ảnh logo (Zalo, Facebook) dùng chung style với icon font */
    /* .social-icons a img {
      width: 24px;
      height: 24px;
    } */


    .social-icons a img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      padding: 8px;
      background-color: white;
      box-shadow: 0 0 12px rgba(0, 140, 255, 0.7); /* Viền sáng màu xanh */
      animation: shake 4s ease-in-out infinite;
      transition: all 0.3s ease;
    }

    /* Khi hover: tăng glow và phóng to nhẹ */
    .social-icons a img:hover {
      transform: scale(1.1);
      box-shadow: 0 0 18px rgba(0, 140, 255, 0.9);
      animation: none; /* Tạm dừng lắc khi hover */
    }

    /* Keyframes: Lắc 1s, nghỉ 3s */
    @keyframes shake {
      0% { transform: rotate(0deg); }
      5% { transform: rotate(10deg); }
      10% { transform: rotate(-10deg); }
      15% { transform: rotate(8deg); }
      20% { transform: rotate(-8deg); }
      25% { transform: rotate(0deg); }
      100% { transform: rotate(0deg); } /* Nghỉ */
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
                <a href="https://www.facebook.com/FanpageShopCuongNguyen678"><i class="fab fa-facebook-square"></i></a>
                <a href="https://www.facebook.com/FanpageShopCuongNguyen678"><i class="fab fa-zalo-square"></i></a>
                <a href="https://www.facebook.com/FanpageShopCuongNguyen678"><i class="fab fa-zalo"></i></a>
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
                    {{-- <a class="menu-item" href="{{url('/nap-the.html')}}">Nạp Thẻ</a> --}}
                    <a class="menu-item" href="https://www.facebook.com/FanpageShopCuongNguyen678">Liên hệ FB ADMIN</a>
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
                        <a href="https://www.facebook.com/FanpageShopCuongNguyen678" class="item">
                            <i class="block money icon"></i>
                           Liên hệ FB ADMIN
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

    <section class="shopdaxuaAccount">
        @yield('main')
    </section>

    <section class="shopdaxuaHowtobuy">
        <div class="ui grid">
            <div class="sixteen wide mobile sixteen wide tablet nine wide computer column">
                <div id="stepImages" class="howtobuy-image">
                    <div class="animated delay-0.5s fadeInUp"><img class="stepImage" src="{{asset('/images/huongdanmua/1.jpg')}}"
                            alt="SERVICES.step5" title="SERVICES.step5">
                    </div>
                </div>
            </div>
            <div class="sixteen wide mobile sixteen wide tablet seven wide computer column">
                <div class="step-title">
                    Cách thức mua Account?
                </div>
                <div id="stepContent" class="step-content">
                    <div class="step actived">
                        <div class="number">1</div>
                        <div class="text">Sử dụng bộ lọc để tìm kiếm Acc phù hợp</div>
                    </div>
                    <div class="step">
                        <div class="number">2</div>
                        <div class="text">Hãy liên hệ trực tiếp với chúng tôi để Giao dịch Account</div>
                    </div>
                    {{-- <div class="step">
                        <div class="number">3</div>
                        <div class="text">Ấn nút Mua Ngay sau đó chọn phương thức thanh toán phù hợp</div>
                    </div>
                    <div class="step">
                        <div class="number">4</div>
                        <div class="text"> Sau khi thanh toán thành công , tài khoản và mật khẩu sẽ hiện ở lịch sử mua
                            acc!</div>
                    </div> --}}
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
      <!-- Icon Zalo và Facebook -->
  <div class="social-icons">
    <div class="shop-flex">
        <a href="https://zalo.me/0379439678" target="_blank">
      <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/91/Icon_of_Zalo.svg/1024px-Icon_of_Zalo.svg.png" alt="Zalo">
    </a>
    <a href="https://www.facebook.com/FanpageShopCuongNguyen678" target="_blank" style="margin-left: 64px;">
      <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook">
    </a>

    <a href="tel:0379439678" title="Gọi ngay: 0379 439 678" style="margin-left: 64px;">
      <img src="data:image/png;base64,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" class="fas fa-phone"></i>
    </a>
    </div>
  </div>

    <div hidden>@yield('keywords')</div>

    @if(isset($popup) && $popup && $popup->is_active)
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        Swal.fire({
            title: {!! json_encode($popup->title) !!},
            html: {!! json_encode($popup->content) !!},
            confirmButtonText: 'OK',
            confirmButtonColor: '#6c5ce7',
        });
    });
    </script>
@endif
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