<div id='howto-steps'>
	<table cellspacing=0 cellpadding=0 width='100%'><tr valign='top'>
		<td>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=1'>
				<div class='steps first'>
					<img class='step1-img' src='<?=x::url_theme()?>/img/step1.png'/>
					<div class='description'>
						<div class='title'>필고 홈페이지</div>
						<div class='instruction'>모바일 웹, 안드로이드 어플,<br />바이럴 마케팅 프로그램<br /><b>무료 제공</b></div>
					</div>
				</div>
			</a>
		</td>
		<td>
			<div class='steps second'>
				<img class='step2-img' src='<?=x::url_theme()?>/img/step2.png'/>
				<div class='description'>
					<div class='title'>사이트 만들기 예제</div>
					<div class='instruction'>
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=2'>여행사</a> ,
						
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=4'>블로그</a></div>
						
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티</a><br />
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=3'>하숙집, 홈스테이</a><br />
				</div>
			</div>
		</td>
		<td>
			<a href="<?=page('service')?>">
				<div class='steps third'>
					<img class='step3-img' src='<?=x::url_theme()?>/img/step3.png'/>
					<div class='description'>
						<div class='title'>도와주세요</div>
						<div class='instruction'>사이트 만들기가 어려우면<br />여기를 클릭!</div>
			
					</div>
				</div>
			</a>
		</td>
	</tr></table>
</div>

<div id='create-site'><div class='inner'>
	<a href='<?=x::url()?>/?module=site&action=create'>
		필고 무료 사이트 만들기
	</a>
</div></div>

<table class='bottom-content' cellpadding=0 cellspacing=0 width='100%' border=0>
	<tr valign='top'>
		<td width='33.3%'><? include x::theme('newest.site.list')?></td>
		<td width='33.4%'><? include x::theme('multisite.latest.posts')?></td>
		<td width='33.3%'>
			<div><?
					if ( g::forum_exist('qna') ) {
						$option = array(
										'no'=>15,
										'icon'=>  x::url_theme().'/img/bag-blue.png'
						);
						echo latest('x-latest-withcenter-blue','qna', 15, 21, 1, $option);
					}
					else {
						echo "NO Post";
					}
				?></div>
			<div><?
				if ( g::forum_exist('help') ) {
					$option = array(
										'no'=>15,
										'icon'=>  x::url_theme().'/img/bag-blue.png'
					);
					echo latest('x-latest-withcenter-blue','help', 15, 21, 1, $option);
				}
				else {
					echo "No Post";
				}
			?></div>
		</td>
	</tr>
</table>
