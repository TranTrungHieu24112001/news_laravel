<!-- load file layout.php vào đây -->
@extends("php56.layout")
<!---- du lieu se do vao file layout.php tai tag "du-lieu-do-vao-tag-main"-->
@section("du-lieu-do-vao-tag-main")
<h1>Đây là trang chủ</h1>
<?php echo "<h1>Hello world</h1>"; ?>
@endsection

@section("du-lieu-do-vao-phan-header")
<h1>Dữ liệu của MVC đổ vào trang chủ</h1>

@endsection