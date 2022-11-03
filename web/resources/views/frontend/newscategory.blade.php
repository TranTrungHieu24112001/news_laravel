@extends('frontend.layout')
@section("do-du-lieu")
<?php 
	//lay tieu de danh muc
	$category = DB::table("categories")->where("id","=",$category_id)->select("name")->first();
	//lay cac ban ghi co phan trang
	$categories = DB::table("news")->where("category_id","=",$category_id)->paginate(20);
 ?>
 <!-- ========================================= -->	
<div class="marked-title">
    <h3>{{ $category->name }}</h3>
</div>
<div class="row">
	@foreach($categories as $rows)
    <!-- list news -->
    <article>
		<div class="cat-post-desc">
			<h3><a href=" {{ url('news/detail/'.$rows->id)}} ">{{ $rows->name }}</a></h3>
			<p><a href="{{ url('news/detail/'.$rows->id)}} "><img class="img_category" src="{{asset('upload/news/'.$rows->photo)}} " style="max-width: 100px;" alt=""></a>{!! $rows->description !!} </p>
		</div>
		<div class="clear"></div>
		<div class="line_category"></div>
	</article>                       
    <!-- end list news -->
 	@endforeach
                                                            
                            
</div>
<div class="clear"></div>
<div class="post-navi">
    <!-- phan trang -->
    {{ $categories->render() }}
</div>
<!-- ========================================= -->
@endsection