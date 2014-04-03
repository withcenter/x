<?php
	if (G5_IS_MOBILE) {
		include x::theme('mobile/head');
		return;
	}
?>
<link rel="stylesheet" href="<?=x::url_theme()?>/css/theme.css">
<!-- 상단 시작 { -->

<div id="hd">
    <h1 id="hd_h1"><?php echo $g5['title'] ?></h1>

    <div id="skip_to_container"><a href="#container">본문 바로가기</a></div>

    <div id="hd_wrapper">

        <div id="logo">
            <a href="<?=g::url()?>">www.e<span class='x'>X</span>tended.KR</a>
        </div>

        <fieldset id="hd_sch">
            

            <script>
            function fsearchbox_submit(f)
            {
                if (f.stx.value.length < 2) {
                    alert("검색어는 두글자 이상 입력하십시오.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                // 검색에 많은 부하가 걸리는 경우 이 주석을 제거하세요.
                var cnt = 0;
                for (var i=0; i<f.stx.value.length; i++) {
                    if (f.stx.value.charAt(i) == ' ')
                        cnt++;
                }

                if (cnt > 1) {
                    alert("빠른 검색을 위하여 검색어에 공백은 한개만 입력할 수 있습니다.");
                    f.stx.select();
                    f.stx.focus();
                    return false;
                }

                return true;
            }
            </script>
        </fieldset>

        <ul id="tnb">
            <?php if ($is_member) {  ?>
            <?php if ($is_admin) {  ?>
            <li><a href="<?php echo url_x_admin() ?>"><b>X 관리자</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/member_confirm.php?url=<?php echo G5_BBS_URL ?>/register_form.php">정보수정</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/logout.php">로그아웃</a></li>
            <?php } else {  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/register.php">회원가입</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/login.php"><b>로그인</b></a></li>
            <?php }  ?>
            <li><a href="<?php echo G5_BBS_URL ?>/qalist.php">1:1문의</a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/current_connect.php">접속자 <?php echo connect(); // 현재 접속자수  ?></a></li>
            <li><a href="<?php echo G5_BBS_URL ?>/new.php">새글</a></li>
			<li><a href='<?=x::url_setting()?>'><?=ln('Language Change', '언어 변경');?></a></li>
        </ul>

		
    </div>

    <hr>
    <?include x::theme('menu')?>
	
	
</div>
<!-- } 상단 끝 -->

<hr>

<!-- 콘텐츠 시작 { -->
<div id="wrapper">
    <div id="aside">
		<?php echo outlogin('basic'); // 외부 로그인  ?>

		<ul class='left-menu'>
			<li><a href="https://docs.google.com/document/d/1hiM2OIFlCkASMOgnyBsrTVcvICZz26oIze9Cz7p9BI8/pub" target="_blank"><?=ln('X User Guide', 'X 이용 안내');?></a></li>

			<? if ( admin() ) { ?>
				<li><a href='<?=url_x_admin()?>'><?=ln('X Admin Page', 'X 관리자 페이지');?></a></li>
				<li><a href='<?=url_site_admin()?>'><?=ln('Site Admin Page', '사이트 관리자 페이지');?></a></li>
				<li><a href='<?=G5_URL?>/adm'><?=ln('G5 Admin Page', 'G5 관리자 페이지');?></a></li>
			<? } ?>
		</ul>
		<?php
			include widget( array( 'code' => 'side-post-latest', 'name' => 'post-latest' ) );
			include widget( array( 'code' => 'side-post-comment-latest', 'name' => 'post-comment-latest' ) );
			for( $i=1; $i<=5; $i++ ) {
				include widget( array( 'code' => "side-sample-$i", 'name' => 'none' ) );
			}
		?>
    </div>
    <div id="container" class='data'>
		<?php if ((!$bo_table || $w == 's' ) && !defined("_INDEX_")) { ?><div id="container_title"><?php echo $g5['title'] ?></div><?php } ?>

		
		
		
		