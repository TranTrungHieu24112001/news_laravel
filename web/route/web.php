<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
/*
    - Khi gõ 1 url, laravel sẽ nhận biết url đó thông qua các cấu trúc sau
        -Route::get("duongdanan",function(){}); -> GET
        -Route::post("duongdanan",function(){}); -> POST
        -Route::any("duongdanan",function(){}); -> GET,POST
*/
//URL: public/hello
Route::get('hello', function(){
    echo "<h1>Hello world</h1>";
});
/*
    -Có 2 cách truyền biến
        -Cách truyền biến theo rewrite url
        Route::get('duongdanao/{bien1}/{bien2}.....', function($bien1,$bien2.....){});
        -Cach truyen bien truyen thong: ?bien1=giatri1&$bien2=giatri2....
            Su dung doi tuong Request::get("tenbienurl"); de lay vao gia tri
*/
//url: public/truyenbien/hello/2021
Route::get('truyenbien/{bien1}/{bien2}',function($bien1,$bien2){
    echo "<h1>$bien1 $bien2</h1>";
});
//url: public/bientruyenthong?bien1=hello&bien2=php56
Route::get('bientruyenthong',function(){
    $bien1 = Request::get("bien1");
    $bien2 = Request::get("bien2");
    echo "<h1>$bien1 $bien2</h1>";
});

/*
    Khi url co tag chung thi co the nhom theo tag chung do
    Route::group(["prefix"=>"tentagchung"], function(){ cac Route khac});
*/
    //url: public/admin/news     public/admin/users
    Route::group(["prefix"=>"admin"],function(){
        Route::get("users",function(){
            echo "<h1>Trang user</h1>";
        });
        Route::get("news", function(){
            echo "<h1>Trang tin tức</h1>";
        });
    });

    /*
        Goi view
        return("tenthumu.tenview", bientruyenraneuco);
        file view dat tai thu muc: resources/views/cacfileview
        cau truc file: tenfile.blade.php
-> laravel su dung template enging co ten la blade    */
//url: public/goiview1
Route::get('goiview1', function(){
    return view("php56.view1");
});
/*
    truyen bien ra view
        return view("tenthumuc.tenview", truyenbienra);
        Chu y: truyenbienra phai la mot array
*/

//url: public/goiview2
Route::get('goiview2', function(){
    //array("tenkey"=>giatri) <=> ["tenkey"=>giatri]
    return view("php56.view2", ["hoten"=>"Nguyen Van A", "email"=>"nva@gmail.com"]);
});
/*
- Cac cau truc trong view (blade engine)
    - Xuat bien, chuoi <=> echo
        {{ "chuoi" }} <=> <?php echo "chuoi"; ?>
        {{ $bien }} <=> <?php echo $bien; ?>
        {!! "chuoi" !!} <=> <?php echo "chuoi"; ?>
        {!! $bien !!} <=> <?php echo $bien; ?>
    - Khoi lenh if
        @if(ket qua so sanh tra ve true)
            html + code
        @else if(ket qua so sanh tra ve true)
            html + code
        @lese
            html + code
        @endif
    - Khoi lenh for
        @for(batdau; ketthuc; lamsaodekethuc)
            html + code
        @endfor
    - Khoi lenh foreach
        @foreach(array as $key=>$value)
            html + code
        @endfor
*/

//url: public/goiview3
Route::get('goiview3', function(){
    return view("php56.view3");
});
/*
- Form trong laravel
    - Trong the form phai co lenh sau thi moi bat du lieu duoc sau khi submit
        @csrf
    - Trang thai ban dau cua trang la GET -> trong file web.php se thuc hien Route::get
    - Sau khi an submit thi trang thai cua trang la POST -> trong file web.php se thuc hien Route::post
    - Doi tuong Request::get("tentheform") se lay du lieu theo kieu POST, GET
*/
//url: public/goiform1
//trang thai cua trang ban dau la GET -> dung Route::get
Route::get('goiform1', function(){
    return view("php56.form1");
});
//sau khi ấn nút submit thi trang thai se la POST -> khi do dung Route::post
Route::post("laydulieuform1", function(){
    $txt = Request::get("txt");
    return view("php56.form1",["txt"=>$txt]);
});


//-------------
//url: public/trangchu
Route::get('trangchu', function(){
    return view("php56.trangchu");
});
//url: public/gioithieu
Route::get('gioithieu', function(){
    return view("php56.gioithieu");
});

/*
    - tim hieu ve Middleware tai duong dan:
        - cac file middlewera nam tai duong dan: app\Http\Middleware\cacfilemiddleware.php
        - tao Middleware bang lenh cmd de tao file controller,view,middleware,... thi cmd do phai co duong dan ben trong thu muc php56_laravel
        VD: tao middleware Hello
            1. trong cmd go: php artisan make:middleware Hello
            2. truy cap duong dan app\Http\Kernel.php -> tim den dong:
                protected $routemiddleware de add them dong dang ki middleware Hello
            3. goi middleware theo cu phap lenh ben duoi
*/
// url:public/php56/Hello
//->middleware("hello") goi middleware co the la hello
Route::get("php56/hello",function(){
    echo "<h1>PHP56: Hello</h1>";
})->middleware("hello");

/*
- Goi controller
    - Cac file controller nam tai duong dan: app\http\controllers\tenfile
        tenfile co cau truc: tenController.php
    - Tao file controller bang lenh cmd: php artisan make:controller tenController (chu y phai co chu Controller dang sau)
*/

//muốn dử dụng controller nào thì phải khai báo trước khi sử dụng
use App\Http\Controllers\HelloController;
//url: public/goicontroller1
Route::get('goicontroller1',[HelloController::class,'index']);

/*
    Truyền biến vào controller
    url: public/goicontroller2/hello/2021 -> gọi hàm truyenbien, truyền vào 2 tham số
*/

Route::get('goicontroller2/{bien1}/{bien2}', [HelloController::class, 'truyenbien']);

/*
- Thao tac csdl trong laravel
    - De ket noi csdl can thuc hien cac thao tac sau
        - Trong phpmyadmin, tao database co ten php56_laravel
        - Open file .env de dien thong tin ket noi (dong 12,13,14)
        - trong cmd chay lenh: php artisan migrate -> khi do laravel se tao san cac bang: users, migrates...
*/
//laravel có hỗ trợ đối tượng sử dụng để mã hóa password : Hash::make("chuoi")
        Route::get('pwd', function(){
            echo Hash::make("123");
        });
/*
    - Mot so cach truy van csdl
        - Su dung query builder: doi tuong DB::....
            - Tac dong vao bang: DB::table("tenbang")->where()->orderBy->...
            - Lay nhieu ban ghi
               DB::table("tenbang")->where("tenbang","sosanh","tencot")->get();
            - Lay mot ban ghi
               DB::table("tenbang")->where("tenbang","sosanh","tencot")->first();
            - Phan trang
                DB::table("tenbang")->where("tenbang","sosanh","tencot")->paginate(sobanghitrenmottrang);
            - Order by
                DB::table("tenbang")->where("tenbang","sosanh","tencot")->orderBy("tencot","asc/desc");
            ...
        - Su dung Model
*/
//url: public/csdl
        Route::get('csdl', function(){

            //truy vấn lấy tất cả các bản ghi trong bảng user
            $user  = DB::table("users")->orderBy("id","desc")->get();
            foreach($user as $rows){
                echo "<div>{$rows->name} - {$rows->email}</div>";
            }
        });
