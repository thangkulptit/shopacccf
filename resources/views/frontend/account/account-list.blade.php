<div id="account-content" class="ui grid wrap-item">
@forelse ($accountList as $item)
    <div class="sixteen wide mobile eight wide tablet four wide computer column cursor-pointer" style="cursor: pointer;" onclick="window.open('/mua-acc-{{ $item->acc_id }}.html','_blank')">
        <div class="ui item" id="get-type-account" data-type-filter="{{$item->type_account}}">
            <div class="item__header">
                <img class="item__img" src="img/logo2.png">
                <div class="item__text">
                    <div class="item__rank">
                        Mã Số #{{$item->acc_id}}
                    </div>
                    <div class="item__type">
                        {{$item->content}}
                    </div>
                </div>
            </div>
            <div class="item__body">
                <div class="item__show">
                    <img style="max-width: 100%; height: auto;" src="{{ $item->img_bgr }}" alt="">
                </div>
                <div class="item__show">
                    <div class="item__left">
                        <img src="images/khung.png" class="item__icon" style="max-width: 30%;">
                        <span class="item__left__text">Acc chuyên</span>
                    </div>
                    <div class="item__right">
                        <span class="item__right__text">{{ $item->vip_main }}</span>
                    </div>
                </div>
                <div class="item__show">
                    <div class="item__left">
                        <img src="images/champ.png" class="item__icon" style="max-width:30%;">
                        <span class="item__left__text">Tên Vip</span>
                    </div>
                    <div class="item__right">
                        <span class="item__right__text">{{$item->vip_name}}</span>
                    </div>
                </div>
                <div class="item__show">
                    <div class="item__left">
                        <img src="images/skin.png" class="item__icon" style="max-width: 20%;">
                        <span class="item__left__text">Cấp độ Vip</span>
                    </div>
                    <div class="item__right">
                        <span class="item__right__text">{{$item->vip_level}}</span>
                    </div>
                </div>
            </div>
            <div class="item__footer">
                <div class="item__left">
                    <div style="font-size:14px;color: #40BDAB;margin-bottom: 5px;">{{number_format($item->price)}} Card</div>
                    <div style="font-size:15px;color: #debb5c;font-weight: bold;">
                        <i class="money bill alternate outline icon"></i>
                        {{number_format($item->price * 1.15)}} ATM</div>
                </div>
                <div class="item__right">
                    <button onclick="event.stopPropagation(); showPopupAcc({{$item->acc_id}})" class="button-green">Mua ngay</button>
                </div>
            </div>
        </div>
    </div>
@empty
    <h1>Không có acc nào</h1>
@endforelse

<div id="menu-content">
    <div class="wrap-paginate">
        {{$accountList->links()}}
    </div>
</div>
</div>

<script type="text/javascript">
    $(document).on('click', '.ui.pagination.menu a', function(event){
        event.preventDefault();
        loading('show');
        let page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });
        
    function fetch_data(page){

        console.log('11111111111111111')
        // ajaxSetup();
        // $.ajax({
        //     type: 'POST',
        //     url: "/account/load_account_list2?page="+ page,
        //     data: { type: 1},
        //     success: function(responseData) {
        //         $('#account-content').html(responseData);
        //         loading('hide');
        //     },
        //     error: function(error) {
        //     toastr.error(error);
        //     loading('hide');
        //     }
        // });
    }
</script>