<div id='howto-steps'>
	<table cellspacing=0 cellpadding=0 width='100%'><tr valign='top'>
		<td>
			<div class='steps'>
				<img class='step1-img' src='x/theme/website.com/img/step1.png'/>
				<div class='description'>
					<div class='title'>Step1</div>
					<div class='instruction'>Brief instruction for step one. More text. More more text. More and more text. More and more and more </div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps'>
				<img class='step2-img' src='x/theme/website.com/img/step2.png'/>
				<div class='description'>
					<div class='title'>Step2</div>
					<div class='instruction'>Brief instruction for step two. More text. More more text. More and more text. More and more and more </div>
				</div>
			</div>
		</td>
		<td>
			<div class='steps'>
				<img class='step3-img' src='x/theme/website.com/img/step3.png'/>
				<div class='description'>
					<div class='title'>Step3</div>
					<div class='instruction'>Brief instruction for step three. More text. More more text. More and more text. More and more and </div>
				</div>
			</div>
		</td>
	</tr></table>
</div>

<div id='create-your-site'>
	<div class='border2'>
		<div class='border3'>
			CREATE YOUR SITE NOW
		</div>
	</div>
</div>

<div id='banner-wrapper'>
	<div class='title'>SAMPLE BANNER TEXT HERE</div>
	
	<ul>
		<li><img src='x/theme/website.com/img/bullet.png'/>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</li>
		<li><img src='x/theme/website.com/img/bullet.png'/>Etiam semper ipsum eu hendrerit pulvinar.</li>
		<li><img src='x/theme/website.com/img/bullet.png'/>Sed vitae orci vel erat scelerisque gravida non pharetra metus.</li>
		<li><img src='x/theme/website.com/img/bullet.png'/>Praesent tempus massa sed eros fermentum faucibus.</li>
		<li><img src='x/theme/website.com/img/bullet.png'/>Aenean at urna at eros ultricies luctus ac ut magna.</li>
	</ul>
</div>

<div id='latest-posts'>
<?php
//  최신글
$sql = " select bo_table from `{$g5['board_table']}` a left join `{$g5['group_table']}` b on (a.gr_id=b.gr_id)  where a.bo_device <> 'mobile' order by b.gr_order, a.bo_order LIMIT 3";
$result = sql_query($sql);
for ($i=0; $row=sql_fetch_array($result); $i++) {
    if ( ($i+3)%3==1 || ($i+3)%3==2) {$lt_style = "margin-left:28px"; $num=$i;}
    else $lt_style = "";
	/*
	if ( ($i+3)%3==1 ) $image = 'wrench-blue.png';
	else if ( ($i+3)%3==2 ) $image = 'bag-blue.png';
	else $image = 'directions-blue.png';
	*/
?>
    <div class='post-content <?php echo ($i+1);?> ' style="float:left;<?php echo $lt_style ?>; width:222px;">
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
