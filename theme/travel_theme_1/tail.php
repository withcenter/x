    </div>
</div>
<div class='footer-text'><div class='inner'>
	<?=nl2br(ms::meta('footer_text'))?>
</div></div>

<!-- } 콘텐츠 끝 -->

<hr>

<!-- 하단 시작 { -->
<!--<div id="ft">

</div>-->


<!-- } 하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>

<?php
include_once(G5_PATH."/tail.sub.php");
?>

<!--[if IE 7]>
	<style>				
		.banner{
			width:651px;
			float:left;
		}
		.forum-list{
			float:left;			
		}
		
		.middle-panel{			
			clear:both;			
		}
		
		.travel-stories{
			float:left;		
		}
		
		.travel-story{
			float:left;				
		}
		
		.middle-panel .photo-gallery {
			float:left;					
		}
		
		.travel-package-container{
			float:left;
		}
		
		.banner-pagination .pages{
			float:left;
			margin:0 3px 0 3px;
		}
		
	</style>
<![endif]-->