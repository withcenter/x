<?php
if (!defined('_GNUBOARD_')) exit; // 개별 페이지 접근 불가

include_once(G5_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
?>
<script src="<?=x::theme_url()?>/js/content.js"></script>

<header id="hd">

    <div id="hd_wrapper">

        <ul id="hd_nb">
            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php" id="snb_new">1:1문의</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php" id="snb_cnt">접속자 <?php echo connect(); // 현재 접속자수 ?></a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/new.php" id="snb_new">새글</a></li>
            <?php if ($is_member) { ?>
            <?php if ($is_admin) { ?>
            <li><a href="<?php echo G5_ADMIN_URL ?>" id="snb_adm"><b>관리자</b></a></li>
            <?php } ?>
				<li>
					<a href="<?php echo G5_BBS_URL ?>/memo.php" target="_blank">
					<span class="sound_only">안 읽은 </span>쪽지
					<strong><?php echo g::memo_count_new(); ?></strong>
				</a>
				</li>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php" id="snb_modify">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php?url=<?=urlencode( '../x/theme/' . x::$config['site']['theme'] . '/content.php' )?>" id="snb_logout">로그아웃</a></li>
            <?php } else { ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php" id="snb_join">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php" id="snb_login">로그인</a></li>
            <?php } ?>
        </ul>

    </div>
</header>

<hr>

<div id="wrapper">
    <div id="aside">
       <?php
				if ( ! login() ) {
					echo outlogin('basic'); // 외부 로그인
				}
		?>
    </div>
    <div id="container">
        <?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>