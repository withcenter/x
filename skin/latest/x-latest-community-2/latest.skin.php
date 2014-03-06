<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가
?>

<link rel="stylesheet" href="<?php echo $latest_skin_url ?>/style.css">
<div class='withcenter_latest'>
	<div class='title'>
		<div  class='top-title'>
		<? if ( $options ) echo "<img class='x-latest-withcenter-icon' src='$options[icon]'/>"; ?>
		<a href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><?php echo $bo_subject; ?></a>
		</div>
		<a class='more_btn' href="<?php echo G5_BBS_URL ?>/board.php?bo_table=<?php echo $bo_table ?>"><img src='<?=$latest_skin_url?>/img/more_btn.gif' /></a>
		<div style='clear: both;'></div>
	</div>
    <ul>
    <?php for ($i=0; $i<count($list); $i++) {  ?>
        <li>
			<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
			<div class='subject'>
				<a href='<?=$list[$i]['href']?>'><?=$list[$i]['subject']?></a>			
			</div>
        </li>
    <?php }  ?>
    <?php if (count($list) == 0) { //게시물이 없을 때  ?>
			<li>
				<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
				<div class='subject'>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=5'>사이트 만들기 안내</a>
				</div>
			</li>
			<li>
				<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
				<div class='subject'>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=4'>블로그 만들기</a>
				</div>
			</li>
			<li>
				<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
				<div class='subject'>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=3'>커뮤니티 사이트 만들기</a>
				</div>
			</li>
			<li>
				<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
				<div class='subject'>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=2'>여행사 사이트 만들기</a>
				</div>
			</li>
			<li>
				<img class='dot' src='<?=$latest_skin_url?>/img/dot.gif' />
				<div class='subject'>
					<a href='http://www.philgo.net/bbs/board.php?bo_table=help&wr_id=1'>(모바일)홈페이지, 스마트폰 앱</a>
				</div>
			</li>
    <?php }  ?>
    </ul>
</div>