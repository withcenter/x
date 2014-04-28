<?php
	
	
?>
<div class='main_menu'>
	<div class='inner'>
		<ul>			
			<li class='first_item'>
				<a href="<?=g::url()?>">홈<span class='underbar'></span></a>				
			</li>			
			<li>
				<a href="https://docs.google.com/a/withcenter.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub " target='_blank'>X 사용자 설명서<span class='underbar'></span></a>				
			</li>			
			<li>
				<a href="https://docs.google.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/pub " target='_blank'>X 개발자 설명서<span class='underbar'></span></a>				
			</li>			
			<li>
				<a href="http://extended.kr" target='_blank'>X 홈페이지<span class='underbar'></span></a>				
			</li>
			<li>
				<a href="<?=url_forum_list( 'default' )?>">기본게시판<span class='underbar'></span></a>				
			</li>
		</ul>
	</div>
</div>

<?if ( preg_match('/msie 7/i', $_SERVER['HTTP_USER_AGENT'] ) ) {?>
<style>
	#header .main_menu .inner ul li{
		display:inline;
	}
</style>
<?}?>