<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Layout</title>
</head>
<body>
<div class="wrap">
	<header><h1>Header</h1>
		@yield("du-lieu-do-vao-phan-header")
	</header>
	<nav>
		<ul>
			<li><a href="{{ url('trangchu') }}">Trang chủ</a></li>
			<li><a href="<?php echo url('gioithieu') ?>">Giới thiệu</a></li>
		</ul>
	</nav>
	<content style="display: flex;">
		<aside><h1>Left</h1></aside>
		<article>
			<!-- dữ liệu của các pvc sẽ đổ vào đây -->
			@yield("du-lieu-do-vao-tag-main")
		</article>
	</content>
	<footer><h1>Footer</h1></footer>
</div>
<style type="text/css">
	body,h1{
		padding: 0px;
		margin: 0px;
	}
	.wrap{
		width: 1000px;
		margin: auto;
	}
	aside{
		width: 250px;
		height: 400px;
		background-color: yellow;
	}
	article{
		width: 750px;
		height: 400px;
		background-color: white;
	}
	header,footer{
		height: 100px;
		background-color: green;
	}
	nav{
		background-color: black;
		line-height: 40px;
	}
	nav ul{
		padding: 0px;
		margin: 0px;
		list-style: none;
	}
	nav ul li{
		display: inline;
	}
	nav ul li a{
		padding: 15px; text-decoration: none;
		color: white;
	}
</style>
</body>
</html>