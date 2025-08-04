function loading(status) {
    switch (status) {
        case 'show':
            $('.wrap-loading').show();
            break;
        case 'hide':
            $('.wrap-loading').hide();
            break;
        default:
            break;
    }
}
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    function ajaxSetup() {
        // lib jqeury
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    }
    
    function Login(){
        logicLogin();
    }

    function Logout(){
        window.location.href = "/front/logout";
    }

    function Register(){
        logicRegister();
    }

$(".ui.dropdown").dropdown();

$(".ui.dropdown").dropdown({
clearable: true,
maxSelections: 5
});

// how to buy step
$(".step").on("click", function(e) {
$("#stepImages img").remove();
$(this)
.toggleClass("actived")
.siblings()
.removeClass("actived");
var so = $(this)
.children(".number")
.text();
$("#stepImages").prepend(
'<div class="animated delay-0.5s fadeInUp"><img class="stepImage" src="images' + '/' +
  so +
  '.png" alt="SERVICES.step1" title="SERVICES.step1"></div>'
);
});



// mũi tên menu
document.getElementById("nav-select").addEventListener("mouseover", function() {
document
.getElementById("nav-updown")
.setAttribute("class", "fas fa-caret-up");
});

document.getElementById("nav-select").addEventListener("mouseout", function() {
document
.getElementById("nav-updown")
.setAttribute("class", "fas fa-caret-down");
});

function emailregister() {
var modal = document.getElementById("login-modal");
var content = `
  <i id="modal-close" class="fas fa-times close"></i>
  <div class="content animated fadeIn">
        <div class="login" style="width: 100%;">
            <div class="login-title">
                <i class="fas fa-user-check"></i>
                <span>Đăng Kí</span>
            </div>
            <div class="login-content">
                <div class="login-label">
                    Họ Và Tên * (2-40 ký tự)
                </div>
                <div class="ui input">
                    <input id="fullname_register" type="text">
                </div>
                <div class="login-label">
                    Tài khoản * (5-40 ký tự)
                </div>
                <div class="ui input">
                    <input id="username_register" name="username_register type="text">
                </div>
                <div class="login-label">
                    Mật Khẩu * (5-40 ký tự)
                </div>
                <div class="ui input">
                    <input id="password_register" name="password_register" type="password">
                </div>

                <div class="login-action">
                    <button class="button-green" onclick="modalback()">Vào trang Đăng Nhập</button>
                    <div class="login-button">
                        <button onclick="Register()" class="button-green">Đăng Kí</button>
                    </div>
                </div>
            </div>
        </div>
  </div>
`;

modal.innerHTML = content;
}

function openmodal(){
    $(".ui.labeled.icon.sidebar").sidebar("hide");
    $('#login-modal').modal("show");
}

function callregisterform(){
    $(".ui.labeled.icon.sidebar").sidebar("hide");
    $('#login-modal').modal("show");
    emailregister();
}

function modalback() {
var modal = document.getElementById("login-modal");
var content = `
  <i id="modal-close" class="fas fa-times close"></i>
    <div class="content">
        <div class="login">
            <div class="login-title">
                <i class="fas fa-user-check"></i>
                <span>Đăng Nhập</span>
            </div>
            <div class="login-content">
                <div class="login-label">
                    Tài Khoản *
                </div>
                <div class="ui input">
                    <input type="text" id="username_login" name="username_login">
                </div>
                <div class="login-label">
                    Mật Khẩu *
                </div>
                <div class="ui input">
                    <input type="password" id="password_login" name="password_login">
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
                <div class="logo">
                    <img src="images/yasuo-hinh.png">
                </div>
            </div>
        </div>
    </div>
`;
modal.innerHTML = content;


}

document.getElementById("mobile-area").addEventListener("click", function() {
$(".ui.labeled.icon.sidebar").sidebar("toggle");
});

function demo(){
    toastr.info('Tính năng này sắp sửa ra mắt', 'Hmm');
}


$(document).on("keyup", "#password", function(e){
    // login bằng phím enter
            if (e.keyCode === 13) {
                e.preventDefault();
                Login();
            }

})


toastr.options = {
"closeButton": true,
}



let url_global = '';
var page = {};

function find_acc_base_id(){
    let acc_id = document.getElementById('acc_id').value;
    if(isNaN(acc_id)){
        toastr.error('Id phải là số', 'Lỗi');
    }else{
        window.open('https://shopdaxua.vn/account/' + acc_id, '_blank');
    }
}


ranks = {
    1 : 'Thách Đấu',
    2 : 'Đại Cao Thủ',
    3 : 'Cao Thủ',
    4 : 'Kim Cương I',
    5 : 'Kim Cương II',
    6 : 'Kim Cương III',
    7 : 'Kim Cương IV',
    8 : 'Bạch Kim I',
    9 : 'Bạch Kim II',
    10 : 'Bạch Kim III',
    11 : 'Bạch Kim IV',
    12 : 'Vàng I',
    13 : 'Vàng II',
    14 : 'Vàng III',
    15 : 'Vàng IV',
    16 : 'Bạc I',
    17 : 'Bạc II',
    18 : 'Bạc III',
    19 : 'Bạc IV',
    20 : 'Đồng I',
    21 : 'Đồng II',
    22 : 'Đồng III',
    23 : 'Đồng IV',
    24 : 'Sắt I',
    25 : 'Sắt II',
    26 : 'Sắt III',
    27 : 'Sắt IV',
    28 : 'Chưa Rank',
};

khungs = {
    1 : 'Khung Thách Đấu',
    2 : 'Khung Đại Cao Thủ',
    3 : 'Khung Cao Thủ',
    4 : 'Khung Kim Cương',
    5 : 'Khung Bạch Kim',
    6 : 'Khung Vàng',
    7 : 'Khung Bạc',
    8 : 'Khung Đồng',
    9 : 'Chưa Khung',

};
function get_image_from_rank(rankID) {
    switch (rankID) {
    case 1:
        return 'challenger';
    case 2:
        return 'grandmaster';
    case 3:
        return 'master';

    case 4:
    case 5:
    case 6:
    case 7:
        return 'diamond';
    case 8:
    case 9:
    case 10:
    case 11:
        return 'platinum';
    case 12:
    case 13:
    case 14:
    case 15:
        return 'gold';
    case 16:
    case 17:
    case 18:
    case 19:
        return 'silver';
    case 20:
    case 21:
    case 22:
    case 23:
        return 'bronze';
    case 24:
    case 25:
    case 26:
    case 27:
        return 'iron';
    case 28:
        return 'unranked';
    }
}

function validateEmail(email) {
    var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(String(email).toLowerCase());
}
function validateInput(input) {
    var re = /([0-9a-zA-Z_]){5,40}/;
    return re.test(String(input).toLowerCase());
}
function validateFullname(input) {
    var re = /^([0-9a-zA-Z_ĂƯÂằắẳẵặăâưàáảãạùúủũụìíỉĩịèéẻẽẹòóỏõọồốổỗộờớởỡợđầấẩẫậẰẮẲẴẶÀÁẢÃẠÙÚỦŨỤÌÍỈĨỊÈÉẺẼẸÒÓỎÕỌỒỐỔỖỘỜỚỞỠỢĐẦẤẨẪẬ ]){2,40}$/;
    return re.test(String(input).toLowerCase());
}

function validatePassword(password) {
    var re = /([0-9a-zA-Z_!@#$%^&*]){5,40}/;
    return re.test(String(password));
}

function rulesCard(input) {
    var re = /^([0-9a-zA-Z]){5,15}$/;
    return re.test(String(input));
}

function logicRegister() {
    const email = $('#email_register').val();
        const username = $('#username_register').val().toLowerCase();
        const password = $('#password_register').val();
        const fullname = $('#fullname_register').val();

        // if (!validateEmail(email)) {
        //     toastr.error('Lỗi định dạng email !!!', 'Failed');
        //     return;
        // }
        if (!validateInput(username)) {
            toastr.error('Tài khoản phải từ 5-40 ký tự !!!', 'Failed');
            return;
        }
        if (!validatePassword(password)) {
            toastr.error('Mật khẩu phải từ 5-40 ký tự !!!', 'Failed');
            return;
        }
        if (!validateFullname(fullname)) {
            toastr.error('Họ Tên phải từ 2-40 ký tự !!!', 'Failed');
            return;
        }
        ajaxSetup();
        $.ajax({
            url: '/front/register',
            type: 'POST',
            dataType: 'json',
            data: 
                {
                    'username_register': username,
                    'password_register': password,
                    'fullname_register': fullname,
                    'email_register': email,
                },
            success: function (res) {
                if (res.error) {
                    toastr.error(res.msg, 'Failed');
                } else {
                    toastr.success(res.msg);
                    location.reload();
                    // callregisterform();
                }
            },
            error: function (res) {
                toastr.error(res.msg, 'Lỗi hệ thống');
            }
        });
}

$(document).ready(function() {
    $('#btnComment').click(function() {
        $('html, body').animate({
            scrollTop: $(".inbox_chat").offset().top
        }, 800);
    })
});

function logicLogin() {
    const username = $('#username_login').val().toLowerCase();
    const password = $('#password_login').val();
    if (!validateInput(username) || !validatePassword(password)) {
        toastr.error('Tài khoản hoặc mật khẩu không đúng định dạng!', 'Lỗi');
        return;
    }
    ajaxSetup();
    $.ajax({
        url: '/front/login',
        type: 'POST',
        dataType: 'json',
        data: {
            'username_login': $('#username_login').val(),
            'password_login': $('#password_login').val()
        },
        success: function (res) {
            if (res.error) {
                toastr.error(res.msg, 'Lỗi');
            } else {
                toastr.success(res.msg);
            }
            if (res.status === 'success') {
                window.location.href = "/";
            }
        },
        error: function (res) {
            toastr.error(res.msg, 'Lỗi hệ thống');
        }
    });
}

function validateCard(type, seri, code) {
    if (!seri || !code || !type) {
        return false;
    }
    if (!rulesCard(seri) || !rulesCard(code)) {
        return false;
    }
    let isValid = false;
    switch(type) {
        case 'VIETTEL':
            if (seri.length === 11 && code.length === 13) {
                isValid = true;
            } else if (seri.length === 14 && code.length === 15) {
                isValid = true;
            }
            break;
        case 'VINAPHONE':
            if (seri.length === 14 && code.length === 12) {
                isValid = true;
            } else if (seri.length === 14 && code.length === 14) {
                isValid = true;
            }
            break;
        case 'ZING':
            isValid = true;
            break;
        case 'MOBIFONE':
            if (seri.length === 15 && code.length === 12) {
                isValid = true;
            } 
            break;
        case 'GATE':
            isValid = true;
            break;
    }
    return isValid;
}

var dblStop = false;

$(document).ready(function () {
    
    $('#submit-card').click(function(){
        if (dblStop == true) {
            return;
        }
        const type = $('#type_card').val();
        const amount = $('#amount').val();
        const seri = $('#seri').val();
        const code = $('#code').val();
        if (!validateCard(type, seri, code)) {
            toastr.warning('Thẻ không hợp lệ vui lòng kiểm tra lại thẻ!');
            return;
        }
        swal({
            title: "Bạn chắc chắn là đã đúng Mệnh Giá, Mã Thẻ, Seri ?",
            text: "Lời khuyên: Nên kiểm tra lại Mệnh Giá Thẻ lần cuối, vì sai mệnh giá sẽ bị mất thẻ.",
            type: "info",
            showCancelButton: true,
            closeOnConfirm: false,
            showLoaderOnConfirm: true
          },
          function(){
            pushCardToServer(type, amount, seri, code);
            dblStop = true;
            setTimeout(function() {
                dblStop = false;
            }, 3000)
        });
    });
});


function pushCardToServer(type, amount, seri, code) {
    ajaxSetup();
    $.ajax({
        type: "POST",
        url: "/account/cardv1",
        data: {
            'type' : type,
            'amount': amount,
            'seri': seri,
            'code': code
        },
        dataType: "json",
        success: function (res) {
            if (!res.isLoggedIn) {
                toastr.error(res.msg);
                callregisterform()
                return;
            } 
            if (res.error) {
                toastr.error(res.msg);
            }

            if (!res.error && res.status === 'success' && res.isLoggedIn) {
                swal({
                    title: 'Thông báo',
                    type: 'success',
                    text: 'Mệnh giá '+ res.amount + 'VNĐ đã được gửi lên ADMIN ! Vui lòng đợi duyệt thẻ khoảng 30 giây.'
                }, function() {
                    setTimeout(function() {
                        location.reload();
                    }, 5000)
                });

            } 
        }
    });
}

function showPopupAcc(acc) {
    swal({
        title: "Tài Khoản Số #" + acc,
        text: "Bạn có chắc chắn muốn giao dịch tài khoản này ?",
        type: "info",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Có",
        cancelButtonText: "Không",
        closeOnConfirm: false,
        showLoaderOnConfirm: true
    }, function() {
        ajaxSetup();
        $.ajax({
            type: "POST",
            url: "/account/buy",
            data: {
                'id': acc 
            },
            dataType: "json",
            success: function (response) {
                if (response.status && response.isLoggedIn) {
                    swal({
                        title: 'Giao dịch hoàn tất',
                        type: 'success',
                        text: 'Mua thành công tài khoản #' + acc
                    }, function() {
                        location.href = '/lich-su-giao-dich';
                    });
                } else if (!response.status && !response.isLoggedIn){
                    openmodal();
                    swal({
                        title: 'Thông báo',
                        type: 'info',
                        text: 'Chưa đăng nhập. Vui lòng đăng nhập để mua tài khoản'
                    }, function() {
                    });
                } else {
                    swal({
                        title: 'Thông báo',
                        type: 'error',
                        text: response.msg
                    }, function() {
                    });
                    
                }
            },
            error: function(error){
                toastr.error('Mua acc thất bại');
            }
        });
        
    });
}


$(document).ready(function() {
    // Khởi tạo dropdown
    $('.ui.dropdown').dropdown();
    
    const type = $('#get-type-account').attr('data-type-filter');
    
    // Biến lưu trữ trạng thái tìm kiếm hiện tại
    let currentSearchData = {
        vip_level: '',
        price: '',
        sort: '',
        vip_name: '',
        id: '',
        type: type
    };
    
    // Khôi phục trạng thái từ URL khi load trang
    restoreStateFromURL();
    
    // Xử lý sự kiện khi nhấn nút Tìm kiếm
    $('#search').on('click', function() {
        // Lấy giá trị từ các dropdown và input
        const vipLevel = $('#vip_level').dropdown('get value') || '';
        const priceRange = $('#price').dropdown('get value') || '';
        const specialFilter = $('#sort').dropdown('get value') || '';
        const vipName = $('#vip_name_input').val().trim();
        const accId = $('#acc_id_input').val().trim();
        
        // Cập nhật trạng thái tìm kiếm hiện tại
        currentSearchData = {
            vip_level: vipLevel,
            price: priceRange,
            sort: specialFilter,
            vip_name: vipName,
            id: accId,
            type: type
        };
        
        loading('show');
        fetch_data(currentSearchData, 1);
    });
    
    // Xử lý sự kiện phân trang
    $(document).on('click', '.ui.pagination.menu a', function(event) {
        event.preventDefault();
        loading('show');
        let page = $(this).attr('href').split('page=')[1];
        fetch_data(currentSearchData, page);
    });
    
    // Hàm fetch data chung cho cả tìm kiếm và phân trang
    function fetch_data(searchData, page = 1) {
        ajaxSetup();
        $.ajax({
            type: 'POST',
            url: "/account/load_account_list2?page=" + page,
            data: searchData,
            success: function(responseData) {
                $('#account-content').html(responseData);
                loading('hide');
                
                // Cập nhật URL với trạng thái hiện tại
                updateURL(searchData, page);
            },
            error: function(error) {
                toastr.error(error);
                loading('hide');
            }
        });
    }
    
    // Xử lý nút Clear
    $('#clear').on('click', function() {
        $('#vip_level').dropdown('clear');
        $('#price').dropdown('clear');
        $('#sort').dropdown('clear');
        $('#vip_name_input').val('');
        $('#acc_id_input').val('');
        
        // Reset trạng thái tìm kiếm
        currentSearchData = {
            vip_level: '',
            price: '',
            sort: '',
            vip_name: '',
            id: '',
            type: type
        };
        
        $('#search').click();
    });
    
    // Hàm cập nhật URL với trạng thái hiện tại
    function updateURL(searchData, page) {
        const params = new URLSearchParams();
        
        // Thêm các tham số tìm kiếm vào URL
        if (searchData.vip_level) params.append('vip_level', searchData.vip_level);
        if (searchData.price) params.append('price', searchData.price);
        if (searchData.sort) params.append('sort', searchData.sort);
        if (searchData.vip_name) params.append('vip_name', searchData.vip_name);
        if (searchData.id) params.append('id', searchData.id);
        if (searchData.type) params.append('type', searchData.type);
        if (page && page != 1) params.append('page', page);
        
        // Cập nhật URL mà không reload trang
        const newURL = window.location.pathname + (params.toString() ? '?' + params.toString() : '');
        window.history.pushState({searchData: searchData, page: page}, '', newURL);
    }
    
    // Hàm khôi phục trạng thái từ URL
    function restoreStateFromURL() {
        const urlParams = new URLSearchParams(window.location.search);
        
        // Khôi phục giá trị tìm kiếm
        const vipLevel = urlParams.get('vip_level') || '';
        const price = urlParams.get('price') || '';
        const sort = urlParams.get('sort') || '';
        const vipName = urlParams.get('vip_name') || '';
        const accId = urlParams.get('id') || '';
        const page = urlParams.get('page') || 1;
        
        // Cập nhật UI với giá trị từ URL
        if (vipLevel) $('#vip_level').dropdown('set selected', vipLevel);
        if (price) $('#price').dropdown('set selected', price);
        if (sort) $('#sort').dropdown('set selected', sort);
        if (vipName) $('#vip_name_input').val(vipName);
        if (accId) $('#acc_id_input').val(accId);
        
        // Cập nhật trạng thái tìm kiếm hiện tại
        currentSearchData = {
            vip_level: vipLevel,
            price: price,
            sort: sort,
            vip_name: vipName,
            id: accId,
            type: type
        };
        
        // Nếu có tham số tìm kiếm trong URL, thực hiện tìm kiếm
        if (vipLevel || price || sort || vipName || accId) {
            loading('show');
            fetch_data(currentSearchData, page);
        }
    }
    
    // Xử lý sự kiện back/forward của browser
    window.addEventListener('popstate', function(event) {
        if (event.state && event.state.searchData) {
            currentSearchData = event.state.searchData;
            const page = event.state.page || 1;
            
            // Cập nhật UI
            $('#vip_level').dropdown('set selected', currentSearchData.vip_level);
            $('#price').dropdown('set selected', currentSearchData.price);
            $('#sort').dropdown('set selected', currentSearchData.sort);
            $('#vip_name_input').val(currentSearchData.vip_name);
            $('#acc_id_input').val(currentSearchData.id);
            
            // Fetch data với trạng thái đã lưu
            loading('show');
            fetch_data(currentSearchData, page);
        } else {
            // Khôi phục từ URL nếu không có state
            restoreStateFromURL();
        }
    });
});
