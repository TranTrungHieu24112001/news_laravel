<!-- chuyen ky tu html ra thanh ky tu html dac biet -->
<!-- ky hieu < se thanh &gt -->
{{ "<h1>Hello world</h1>"}}
<!-- hien nguyen mau -->
{!! "<h1>Hello world</h1>"!!}

<?php 
	$n=5;
 ?>
 @if($n % 2 ==0)
 {!! "<h1>$n la so chan</h1>" !!}
 @else 
 {!! "<h1>$n la so le</h1>" !!}
 @endif

 <table cellpadding="5" border="1" style="width:300px; border-collapse: collapse;">
	@for($i = 1; $i <= 5; $i++)
		<tr>
			<td @if($i % 2 ==0) style="background-color: yellow; @endif">
				<?php echo $i; ?>

			</td>
		</tr>
		@endfor	
 </table>