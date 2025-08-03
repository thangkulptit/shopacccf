@extends('frontend.master')
@section('title', 'Chi tiết acc liên minh')
@section('description', 'Shop acc lmht của chúng tôi quý tụ những tài khoản liên minh huyền thoại cực chất, rẻ và uy tín,...')
@section('keywords', 'shop acc lmht, shop lien minh, mua acc lmht, mua nick lol, mua acc uy tin')
@section('main')
<section class="accountDetail">
    <div class="accountDetail__header">
        <div class="accountDetail__content">
            <div class="accountDetail__type">
                Tài Khoản Mã Số #{{$data_account->acc_id}}
            </div>
            <div class="accountDetail__price">
                {{number_format($data_account->price)}}đ
            </div>
            <div class="accountDetail__buy">
                <button onclick="showPopupAcc({{$data_account->acc_id}});" class="button-buy">Mua Ngay</button>
            </div>
        </div>
    </div>
    <div class="accountDetail__body">
        <div class="accountDetail__tabmenu">
            <button id="account-intro" class="button-tabitem active">
                <i class="fas fa-home"></i> Một số thông tin chi tiết về account này
                <i class="fas fa-caret-down xuong"></i>
            </button>

            {{-- <button id="account-hero" class="button-tabitem">
                <i class="fas fa-user-shield"></i> Tướng ({{$data_account->count_champs}})
                <i class="fas fa-caret-down xuong"></i>
            </button>

            <button id="account-skin" class="button-tabitem">
                <i class="fas fa-tshirt"></i> Trang Phục ({{$data_account->count_skins}})
                <i class="fas fa-caret-down xuong"></i>
            </button>

            <button id="account-gem" class="button-tabitem">
                <i class="fas fa-gem"></i> Bảng Ngọc
                <i class="fas fa-caret-down xuong"></i>
            </button> --}}
        </div>

        <div id="tab-content" class="ui grid container accountDetail__tabcontent">
            <!-- Giới Thiệu -->
            <div class="accountDetail__wrap animated fadeInUp">
                <div class="wrap-title">
                    Rank <span style="color: #ffc154">{{$data_account->rank}}</span>,Tướng:
                    <span style="color: #ffc154">{{$data_account->count_champs}}</span> , Trang phục :
                    <span style="color: #ed2331">
                        {{$data_account->count_skins}}
                          </span>
                    {{-- <img src="https://78200a9983.vws.vegacdn.vn/frontend/assets/imgs/riot.png" alt=""> , IP :
                    <span style="color: #0acae5">10472</span>
                    <img src="https://78200a9983.vws.vegacdn.vn/frontend/assets/imgs/ip.png" alt=""> --}}
                </div>
                <div class="wrap-content">
                    <div class="wrap-intro">
                        <div class="wrap-img">
                            @foreach ($img_content as $imgSRC)
                                    <img src="{{$imgSRC}}" alt="shop acc lmht uy tin gia re" title="shop acc lmht uy tin gia re">
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button onclick="showPopupAcc({{$data_account->acc_id}});" class="button-buy" style="margin-top: 20px;">Mua Ngay</button>
    </div>
</section>

                <script>
                    $(document).ready(function() {
                    $('#previous').on('click', function(){
                        // Change to the previous image
                        $('#im_' + currentImage).stop().fadeOut(1);
                        decreaseImage();
                        $('#im_' + currentImage).stop().fadeIn(1);
                    }); 
                    $('#next').on('click', function(){
                        // Change to the next image
                        $('#im_' + currentImage).stop().fadeOut(1);
                        increaseImage();
                        $('#im_' + currentImage).stop().fadeIn(1);
                    }); 

                    var currentImage = 1;
                    var totalImages = 3;

                    function increaseImage() {
                        /* Increase currentImage by 1.
                        * Resets to 1 if larger than totalImages
                        */
                        ++currentImage;
                        if(currentImage > totalImages) {
                        currentImage = 1;
                        }
                    }
                    function decreaseImage() {
                        /* Decrease currentImage by 1.
                        * Resets to totalImages if smaller than 1
                        */
                        --currentImage;
                        if(currentImage < 1) {
                        currentImage = totalImages;
                        }
                    }
                    });
                </script>
                </div>
            </div>
        </div>
    </div>
</div>

@stop