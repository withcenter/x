</div><!--#wrapper-->
<div class='footer-text'>
	<? if( ms::meta('footer_text') == '' ) {?>
	<div>회원님께서는 현재 필고 <b style='color: #3290cd'>블로그 테마</b>를 선택 하셨습니다.</div> 
	<div>하단 문구는 사이트 설정에서 수정하실 수 있습니다.</div>
	
<?} else echo nl2br(ms::meta('footer_text'));?>
</div>

<!--  하단 끝 -->

<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
	
<? if ( write_page() ) { ?>
	CKEDITOR.replace( 'wr_content',
		{
			uiColor : '#F7F7F7',
			toolbar : [
				['Format','Font','FontSize'],
				['Image','Link','-','Table','-','Smiley'],
				['Print','Maximize'],
				['Source'],
				'/',
				['Bold','Italic','Underline','Strike','-','TextColor','BGColor','-','Find','Replace','-','Outdent','Indent'],
				['NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock']
			]
		}
	);
<? } ?>

</script>

<?php
//include_once(G5_PATH."/tail.sub.php");
?>

<style>
body {
	background: url(<?=x::url_theme()?>/img/bg.jpg);
}

</style>
