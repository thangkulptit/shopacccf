<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;



class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $listName = ["Hoài Nam", "haivippro", "Quý Đôn", "quocruong66", "Hiệp Phát", "Mạnh Quân", "Thái Phong", "Hoàng Sơn", "Trường Sơn", "Thanh Sơn", "Ngọc Sơn", "tungprovip123", "Bá Tùng", "sonvip", "anhyeuem123", "tranminhhieu", "Xuân Tuấn", "Ðình Trung", "mai khanh hoa", "Hoài Trung", "Cường Thịnh", "giahuypham", "minhdat3", "Hùng Thịnh", "Duy Thiên", "hailongtran97", "Kỳ Thiên", "yeulandau", "Hạo Thiên", "bancuatao6", "anhhanhquan06", "Công Thành", "maikhanhdat", "Gia Linh", "Thanh Mai", "Tuệ Mẫn", "Kim Oanh", "Tú Uyên", "chanvcl3", "Diễm Phương", "Kim Liên", "Bảo Quyên", "Diễm My", "Tuệ Nhi", "Thục Quyên", "Kim Ánh", "Kim Tiền", "Lê Ca", "Thảo Ly", "Nguyệt Cát", "Quỳnh Chi", "Thu Trang", "Thu Hiền", "Thu Thảo", "Lan Anh", "Lan Chi", "Ngọc Hoa", "Bảo Ngọc", "Bảo Kim", "Đoan Trang", "Thanh Trúc", "Tuyết Vy", "Tường Vi", "Kim Ngân", "Thanh Trúc", "Thanh Thủy", "Quỳnh Chi", "Quỳnh Hương", "Cát Tường"];
        $price = ['150,000', '230,000', '350,000', '180,000đ','450,000','320,000','260,000','245,000', '160,000','220,000'];
        $dateTime = Date('H');
        $phut = Date('i');
        $rd = rand(0, 15);
        if ($dateTime >= 7 && $dateTime <= 11) {
            $listName = array_slice($listName, 0);
        } else if ($dateTime >= 12 && $dateTime <= 15) {
            $listName = array_slice($listName, 9); 
        } else if ($dateTime >= 16 && $dateTime <= 19) {
            $listName = array_slice($listName, 19); 
        } else if ($dateTime >= 20 && $dateTime <= 22) {
            $listName = array_slice($listName, 22); 
        } else if ($dateTime >= 20 && $dateTime <= 22) {
            $listName = array_slice($listName, 30); 
        } else if ($dateTime >= 23) {
            $listName = array_slice($listName, 38); 
        } else {
            $listName = array_slice($listName, 50); 
        }
        $date = Date('d/m/Y');
        View::share('listName', $listName);
        View::share('date', $date);
        View::share('price', $price);
        View::share('phut', $phut);
        View::share('rd', $rd);

        Schema::defaultStringLength(191);
    }

    private function getList() {
       
    }
}
