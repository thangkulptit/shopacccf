<div class="ui grid wrap-search">
    <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <label class="label">Chọn cấp độ vip</label>
        <div id="vip_level" class="ui fluid selection dropdown">
            <input type="hidden" name="vip_level" />
            <i class="dropdown icon"></i>
            <div class="default text">Không Chọn</div>
            <div class="menu">
                <div class="item" data-value="1">
                    <img class="ui big avatar image" src="images/rank/unranked.png" />
                    1
                </div>
                <div class="item" data-value="2">
                    <img class="ui big avatar image" src="images/rank/ironi.png" />
                    2
                </div>
                <div class="item" data-value="3">
                    <img class="ui big avatar image" src="images/rank/bronzei.png" />
                    3
                </div>
                <div class="item" data-value="4">
                    <img class="ui big avatar image" src="images/rank/silveri.png" />
                    4
                </div>
                <div class="item" data-value="5">
                    <img class="ui big avatar image" src="images/rank/goldi.png" />
                    5
                </div>
                <div class="item" data-value="6">
                    <img class="ui big avatar image" src="images/rank/platinumi.png" />
                    6
                </div>
                <div class="item" data-value="7">
                    <img class="ui big avatar image" src="images/rank/diamondi.png" />
                    7
                </div>
                <div class="item" data-value="8">
                    <img class="ui big avatar image" src="images/rank/master.png" />
                    8
                </div>
                <div class="item" data-value="9">
                    <img class="ui big avatar image" src="images/rank/grandmaster.png" />
                    9
                </div>
                <div class="item" data-value="10">
                    <img class="ui big avatar image" src="images/rank/grandmaster.png" />
                    10
                </div>
            </div>
        </div>
    </div>
    <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <label class="label">Chọn Giá</label>
        <div id="price" class="ui fluid selection dropdown">
            <input type="hidden" name="price" />
            <i class="dropdown icon"></i>
            <div class="default text">Tất cả</div>
            <div class="menu">
                <div class="item" data-value="<50k">
                    0 - 50.000 đ
                </div>
                <div class="item" data-value="50k-100k">
                    50.000 đ - 100.000đ
                </div>
                <div class="item" data-value="100k-500k">
                   100.000 đ - 500.000đ
                </div>
                <div class="item" data-value="1tr-5tr">
                    1.000.000 đ - 5.000.000đ
                </div>
                <div class="item" data-value="5tr-10tr">
                    5.000.000đ - 10.000.000đ
                </div>
                <div class="item" data-value="10tr-15tr">
                    10.000.000đ - 15.000.000đ
                </div>
                <div class="item" data-value="15tr-20tr">
                    15.000.000đ - 20.000.000đ
                </div>
                <div class="item" data-value=">20tr">
                   20.000.000đ trở lên
                </div>
            </div>
        </div>
    </div>
    <div  class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <label class="label">Lọc đặc biệt</label>
        <div id="sort" class="ui fluid selection dropdown">
            <input type="hidden" name="rank" />
            <i class="dropdown icon"></i>
            <div class="default text">Không Chọn</div>
            <div class="menu">
                <div class="item" data-value="1">
                    <div class="ui pink empty circular label"></div>
                    Acc mới đăng
                </div>
                <div class="item" data-value="4">
                    <div class="ui green empty circular label"></div>
                    Giá cao nhất
                </div>
                <div class="item" data-value="5">
                    <div class="ui grey empty circular label"></div>
                    Giá rẻ nhất
                </div>
            </div>
        </div>
    </div>
    <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <label class="label">Tìm theo tên vip</label>
        <div id="vip_name" class="ui fluid" >
            <div class="ui input" style="width: 100%;">
                <input type="text" id="vip_name_input" placeholder="VD: shopcuong678">
            </div>
        </div>
    </div>

    <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <label class="label">Tìm theo mã số</label>
        <div id="vip_name" class="ui fluid" >
            <div class="ui input" style="width: 100%;">
                <input type="number" id="acc_id_input" placeholder="VD: 678">
            </div>
        </div>
    </div>

    <div class="sixteen wide mobile sixteen wide tablet three wide computer column">
        <button id="search" class="button-green">
            Tìm kiếm
        </button>

        <button id="clear" class="button-yellow" >
            Xóa Lọc (x)
        </button>
    </div>

    <script>
    $(document).ready(function() {
      // Khởi tạo dropdown
      $('.ui.dropdown').dropdown();

      const type = $('#get-type-account').attr('data-type-filter');

      // Xử lý sự kiện khi nhấn nút Tìm kiếm
      $('#search').on('click', function() {
        // Lấy giá trị từ các dropdown và input
        const vipLevel = $('#vip_level').dropdown('get value') || ''; // Cấp độ VIP
        const priceRange = $('#price').dropdown('get value') || ''; // Giá
        const specialFilter = $('#sort').dropdown('get value') || ''; // Lọc đặc biệt
        const vipName = $('#vip_name_input').val().trim(); // Tên VIP
        const accId = $('#acc_id_input').val().trim(); // Mã số account

        // Tạo object chứa dữ liệu
        const searchData = {
          vip_level: vipLevel,
          price: priceRange,
          sort: specialFilter,
          vip_name: vipName,
          acc_id: accId,
          type: type,
        };

        loading('show');
        fetch_data(searchData, 1);
    });

    function fetch_data(searchData, page){
        console.log(searchData)
        ajaxSetup();
        $.ajax({
            type: 'POST',
            url: "/account/fetch_data?page="+ page,
            data: searchData,
            success: function(responseData) {
                $('#account-content').html(responseData);
                loading('hide');
            },
            error: function(error) {
            toastr.error(error);
            loading('hide');
            }
        });
    }

      $('#clear').on('click', function() {
        $('#vip_level').dropdown('clear');
        $('#price').dropdown('clear');
        $('#sort').dropdown('clear');
        $('#vip_name_input').val('');
        $('#acc_id_input').val('');
      });
    });
  </script>
</div>