<div id='howto-steps'>
	<table cellspacing=0 cellpadding=0 width='100%'><tr valign='top'>
		<td>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=1'>
				<div class='steps first'>
					<img class='step1-img' src='<?=x::url()?>/theme/website.com/img/step1.png'/>
					<div class='description'>
						<div class='title'>필고 홈페이지</div>
						<div class='instruction'>(모바일) 홈페이지, 스마트폰 앱,<br />바이럴 마케팅 프로그램<br />무료 제공</div>
					</div>
				</div>
			</a>
		</td>
		<td>
			<div class='steps second'>
				<img class='step2-img' src='<?=x::url()?>/theme/website.com/img/step2.png'/>
				<div class='description'>
					<div class='title'>사이트 만들기 예제</div>
					<div class='instruction'>
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=2'>여행사 만들기</a><br />
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티 사이트 만들기</a><br />
						<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a></div>
				</div>
			</div>
		</td>
		<td>
			<a href='<?=g::url()?>/bbs/board.php?bo_table=help&wr_id=5'>
				<div class='steps third'>
					<img class='step3-img' src='<?=x::url()?>/theme/website.com/img/step3.png'/>
					<div class='description'>
						<div class='title'>도와주세요</div>
						<div class='instruction'>사이트 만들기가 어려우면<br />여기를 클릭!</div>
			
					</div>
				</div>
			</a>
		</td>
	</tr></table>
</div>

<div id='create-your-site'>
	<a href='<?=x::url()?>/?module=multisite&action=create'><img src='<?=x::url_theme()?>/img/create_button.png' /></a>
</div>

<div id='banner-wrapper'>
	<a href='<?=x::url()?>/?module=multisite&action=create'><img src='<?=x::url_theme()?>/img/banner.png' /></a>
</div>

<table class='bottom-content' cellpadding=0 cellspacing=0 width='100%' border=0>
	<tr valign='top'>
		<td width='33.3%'><? include x::theme('newest.site.list')?></td>
		<td width='33.4%'><? include x::theme('multisite.latest.posts')?></td>
		<td width='33.3%'>
			<div><?
					if ( g::forum_exist('qna') ) {
						echo latest('x-latest-withcenter-blue','qna', 15, 21, $cache_time=1, x::url_theme().'/img/bag-blue.png');
					}
					else {
						echo "NO Post";
					}
				?></div>
			<div><?
				if ( g::forum_exist('qna') ) {
					echo latest('x-latest-withcenter-blue','help', 15, 21, $cache_time=1, x::url_theme().'/img/bag-blue.png');
				}
				else {
					echo "No Post";
				}
			?></div>
		</td>
	</tr>
</table>
