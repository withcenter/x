<div id='howto-steps'>
	<table cellspacing=0 cellpadding=0 width='100%'><tr valign='top'>
		<td>
			<div class='steps first'>
				<img class='step1-img' src='<?=x::url()?>/theme/website.com/img/step1.png'/>
				<div class='description'>
					<div class='title'>필고 홈페이지</div>
					<div class='instruction'>(모바일) 홈페이지, 스마트폰 앱,<br />바이럴 마케팅 프로그램<br />무료 제공</div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps second'>
				<img class='step2-img' src='<?=x::url()?>/theme/website.com/img/step2.png'/>
				<div class='description'>
					<div class='title'>사이트 만들기 예제</div>
					<div class='instruction'>여행사 만들기<br />커뮤니티 사이트 만들기<br />블로그 만들기</div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps third'>
				<img class='step3-img' src='<?=x::url()?>/theme/website.com/img/step3.png'/>
				<div class='description'>
					<div class='title'>도와주세요</div>
					<div class='instruction'>사이트 만들기가 어려우면<br />여기를 클릭!</div>
				</div>
			</div>
		</td>
	</tr></table>
</div>

<div id='create-your-site'>
	<a href='<?=x::url()?>/?module=multisite&action=create'>사이트 만들기 클릭!</a>
</div>

<div id='banner-wrapper'>
	<div class='title'>SAMPLE BANNER TEXT HERE</div>
	
	<ul>
		<li><img src='<?=x::url()?>/theme/website.com/img/bullet.png'/>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
		<li><img src='<?=x::url()?>/theme/website.com/img/bullet.png'/>Etiam semper ipsum eu hendrerit pulvinar.</li>
		<li><img src='<?=x::url()?>/theme/website.com/img/bullet.png'/>Sed vitae orci vel erat scelerisque gravida non pharetra metus.</li>
		<li><img src='<?=x::url()?>/theme/website.com/img/bullet.png'/>Praesent tempus massa sed eros fermentum faucibus.</li>
		<li><img src='<?=x::url()?>/theme/website.com/img/bullet.png'/>Aenean at urna at eros ultricies luctus ac ut magna.</li>
	</ul>
</div>

<table class='bottom-content' cellpadding=0 cellspacing=0 width='100%' border=0>
	<tr valign='top'>
		<td width='33.3%'><? include x::theme('newest.site.list')?></td>
		<td width='33.4%'><? include x::theme('multisite.latest.posts')?></td>
		<td width='33.3%'>
			<div><?=latest('out-latest-withcenter-blue','qna', 15, 21)?></div>
			<div><?=latest('out-latest-withcenter-blue','help', 15, 21)?></div>
		</td>
	</tr>
</table>
