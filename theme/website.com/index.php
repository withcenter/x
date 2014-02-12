<div id='howto-steps'>
	<table cellspacing=0 cellpadding=0 width='100%'><tr valign='top'>
		<td>
			<div class='steps'>
				<img class='step1-img' src='<?=x::url()?>/theme/website.com/img/step1.png'/>
				<div class='description'>
					<div class='title'>필고 홈페이지</div>
					<div class='instruction'>(모바일) 홈페이지, 스마트폰 앱,<br />바이럴 마케팅 프로그램<br />무료 제공</div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps'>
				<img class='step2-img' src='<?=x::url()?>/theme/website.com/img/step2.png'/>
				<div class='description'>
					<div class='title'>사이트 만들기 예제</div>
					<div class='instruction'>여행사 만들기<br />커뮤니티 사이트 만들기<br />블로그 만들기</div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps'>
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

<div id='latest-posts'>
<?php
//  최신글
$sql = " select bo_table from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)  where a.bo_device <> 'mobile' order by b.gr_order, a.bo_order LIMIT 3";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ( ($i+3)%3==1 || ($i+3)%3==2) {$lt_style = "with-margin";}
    else $lt_style = "";
	/*
	if ( ($i+3)%3==1 ) $image = 'wrench-blue.png';
	else if ( ($i+3)%3==2 ) $image = 'bag-blue.png';
	else $image = 'directions-blue.png';
	*/
?>
    <div class='post-content <?php echo $lt_style ?>'>
	<?/*<img class='top-image' src='skin/latest/community/img/<?php echo $image; ?>'/>*/?>
        <?php
        // 이 함수가 바로 최신글을 추출하는 역할을 합니다.
        // 사용방법 : latest(스킨, 게시판아이디, 출력라인, 글자수);
        echo latest("x-latest-community", $row['bo_table'], 6, 25);
        ?>	
    </div>
<?php
}
?>

</div>
