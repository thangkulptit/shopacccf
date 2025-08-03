@extends('frontend.master')
@section('title', 'Lịch sử mua bán acc, và thông tin của tôi')
@section('description', 'Shop liên quân, nơi mua bán acc liên quân giá rẻ uy tín hàng đầu việt nam, acc liên quân cực vip chỉ có 20k, 30k, 40k, 50k')
@section('keywords', 'shop liên quân, mua acc liên quân, mua nick liên quân, bán acc lq, shop lq, acc lien quan gia re')
@section('domain', 'https://shoplienquan.com')
@section('main')

<section class="profile">
    <div class="profile__content">
        <div class="profile__title">
          <i class="fas fa-history" style="color: #137f50;"></i>Thông tin tài
          khoản
        </div>
        <div class="profile__form">
          <div class="form__left">
            <div class="form__label">Email</div>
            <div class="ui fluid input">
                <input type="text" value="{{Auth::guard('users_client')->user()->email}}" disabled="">
            </div>
            <div class="form__label">Tài khoản</div>
            <div class="ui fluid input">
                <input type="text" value="{{Auth::guard('users_client')->user()->username}}">
            </div>
          </div>
          <div class="form__right">
            <div class="form__label">Mật khẩu của bạn</div>
            <div class="ui fluid input">
              <input type="password" value="dsjiaojdsioajdisoa" disabled>
            </div>

            <div class="form__label">Số tiền hiện có của bạn</div>
            <div class="ui fluid input">
                <input type="text" value="{{number_format(Auth::guard('users_client')->user()->money)}}đ" disabled>
            </div>
          </div>
        </div>
      </div>
    <div class="profile__table">
        <div class="card__history">
          <i class="fas fa-history" style="color: #137f50;"></i>Lịch Sử Mua Account
        </div>
        <table class="ui celled table stackable">
          <thead>
            <tr>
                <th>STT</th>
                <th>Loại tài khoản</th>
                <th>Tài khoản</th>
                <th>Mật khẩu</th>
                <th>Mật khẩu cấp 2</th>
                <th>Giá</th>
              </tr>
          </thead>
          <tbody>
                @forelse ($list as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->type_account}} #{{$item->id_acc}}</td>
                        <td>{{$item->username}}</td>
                        <td>{{$item->password}}</td>
                        <td>{{$item->password2}}</td>
                        <td>{{number_format($item->price)}}<sup>đ</sup></td>
                    </tr>
                @empty
                    <tr style="font-size: 20px; font-weight: bold; text-align: center;">
                        Chưa có cuộc giao dịch nào xảy ra
                    </tr>
                @endforelse
          </tbody>
        </table>
        
      </div>
</section>

@stop
