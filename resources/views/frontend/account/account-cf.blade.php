<div class="display-account">
    <div class="container">
        <div class="sllpbox">
            <br>
            <h3 class="sl-htit sl-ht3"></h3><br>
            <div id="list-account" data-type-account="4">
                <div class="sl-produl clearfix">
                    @if (sizeof($listAccount) < 1)
                        <h2 style="text-align: center; font-size: 35px; font-weight: bold; color: #fff"> Không có tài khoản nào </h2>
                    @else 
                        @foreach ($listAccount as $item)
                        <div class="sl-prodli">
                            <div class="sl-prodbox">
                                <img src="images/price-percent-br-2.png"
                                    style="position:absolute; top:-2px; right:-9px;z-index:99">
                                <span
                                    style="color:#000; position:absolute; top:8px; right:0px; z-index:99;"><b>-50%</b></span>
                                <a class="sl-prlinks" href="{{url('/shop-acc-dot-kich-'.$item->acc_id.'.html')}}">
                                    <p class="sl-primg">
                                        <img src="{{$item->img_bgr}}">
                                    </p>
                                    <div class="sl-prcode">
                                        <span>Acc #{{$item->acc_id}}</span>
                                        <div class="hidden-xs">
                                            <img class="sl-champMaster" style="right: 5px;"
                                                src="/images/cf/icon.png">
                                            <img class="sl-champMaster" style="right: 40px;"
                                                src="/images/cf/icon.png">
                                            <img class="sl-champMaster" style="right: 75px;"
                                                src="/images/cf/icon.png">
                                        </div>
                                    </div>
                                    <div class="sl-priftop">
                                        <p class="sl-prcode"><span>Acc CF#{{$item->acc_id}}</span></p>
                                        <ul>
                                             {{-- <li>Rank: {{$item->rank}}</li> --}}
                                        {{--<li>Khung: Chưa</li> --}}               
                                            {{-- <li>Tướng: {{$item->count_champs}}</li>
                                            <li>Trang Phục: {{$item->count_skins}}</li>  --}}
                                            <li>Thông tin: {{$item->content}}</li>
                                            {{-- <li>Đá Quý: {{$item->da_quy}}</li> --}}
                                            {{-- <li>Gi: {{$item->content}}</li> --}}
    
                                        </ul>
                                    </div>
                                </a>
                                <div class="sl-prifs">
                                <span class="sl-prpri sl-prpri1 hidden-xs"><img src="/images/cf/cf.png" width="45"
                                            height="45"></span>
                                    <span class="sl-prpri sl-prpri2 hidden-xs"
                                        style="top: 50px; font-size: 12px; text-decoration: line-through; color: #bdc3c7">{{number_format(($item->price)*2)}}đ</span>
                                    <span class="sl-prpri sl-prpri2">{{number_format($item->price)}}đ</span>
                                    <div class="sl-prifbot">
                                        <ul>
                                            {{-- <li>Rank: {{$item->rank}}</li>
                                            {{-- <li>Tướng: {{$item->count_champs}}</li> --}}
                                            {{-- <li>Giá: {{$item->price}}đ</li>  --}}
                                            <li>{{$item->content}}</li>
                                            <li>Có súng VIP</li>
                                            
                                        </ul>
                                    </div>
                                    <p class="sl-prbot"><a style="cursor: pointer;" onclick="showPopupAcc({{$item->acc_id}});"
                                            class="sl-btnod">MUA NGAY</a></p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                   

                </div>
                <div id="loading" style="margin: 30px 0; text-align: center; display: none;">
                    <img src="images/loading.gif">
                </div>
                <nav>
                    {{$listAccount->links()}}
                </nav>
                <script>
                $(document).on('click', '.pagination a', function(event){
                  event.preventDefault();
                  loading('show');
                  let page = $(this).attr('href').split('page=')[1];
                  fetch_data(page);
              })
          
              function fetch_data(page){
                ajaxSetup();
                $.ajax({
                      type: 'POST',
                      url: "/account/fetch_data?page="+page,
                      data: { type: 4},
                      success: function(responseData) {
                          $('.display-account').html(responseData);
                          loading('hide');
                      },
                      error: function(error) {
                        toastr.error(error);
                        loading('hide');
                      }
                  });
              
              }
                </script>
                {{-- <div class="sl-paging">
           
        <ul><li class="item active"><a>1</a></li><li class="item"><a href="https://accractool.com/?page=2" data-ci-pagination-page="2">2</a></li><li class="item"><a href="https://accractool.com/?page=3" data-ci-pagination-page="3">3</a></li><li class="item"><a href="https://accractool.com/?page=4" data-ci-pagination-page="4">4</a></li><li class="item"><a href="https://accractool.com/?page=5" data-ci-pagination-page="5">5</a></li><li class="item"><a href="https://accractool.com/?page=6" data-ci-pagination-page="6">6</a></li><li class="item"><a href="https://accractool.com/?page=2" data-ci-pagination-page="2">»</a></li><li class="item"><a href="https://accractool.com/?page=127" data-ci-pagination-page="127">»»</a></li></ul></div>		</div>
            <div id="loading" style="margin: 30px 0; text-align: center; display: none;">
                <img src="images/loading.gif">
            </div>
            --}}
            </div>
        </div>
    </div>
</div> {{-- <script src="js/app/custom.js"></script> --}}