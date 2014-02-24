<?php


?>
<link rel='stylesheet' type='text/css' href='<?=x::url_theme()?>/css/theme.css' />
<script src='<?=x::url_theme()?>/js/theme.js' /></script>
<?php
	$path = x::dir().'/theme/withcenter/top.php';
	include $path;
	$image_dir = x::url().'/theme/withcenter/img';
?>
<div class='logo_search'>
	<div class='inner'>
		<a href='<?=g::url()?>'><img src='<?=$image_dir?>/logo.png' /></a>
		
		<div class='search-bar'>
			<form name="fsearchbox" method="get" action="<?php echo G5_BBS_URL ?>/search.php" onsubmit="return fsearchbox_submit(this);" autocomplete='off'>
				<input type="hidden" name="sfl" value="wr_subject||wr_content">
				<input type="hidden" name="sop" value="and">
				<div class='wrapper'><div class='s_inner'><div class='s_inner_inner'>
					<input type="text" name="stx" id="sch_stx" maxlength="20" placeholder='Search' value='<?=$in['stx']?>' />
					<input type="image" src='<?=$image_dir?>/submit_button.png'>  
				</div></div></div>
            </form>
		</div>
		
		<div class='right-top-menu'>
			<a href='<?=G5_BBS_URL?>/board.php?bo_table=withcenter_solution'>솔류션</a>
			<a href='<?=G5_BBS_URL?>/board.php?bo_table=withcenter6'>강사아웃소싱</a>
			<a href='<?=G5_BBS_URL?>/board.php?bo_table=withcenter5'>가맹사모집</a>
		</div>
		<div style='clear:right;'></div>
	</div>
</div>
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
<div class='main-menu'><div class='inner'>
	<a href='<?=g::url()?>/?page=intro'>회사소개</a>
	<a href='<?=g::url()?>/?page=application'>가맹사모집</a>
	<a href='<?=g::url()?>/?page=outsouring'>강사아웃소싱</a>
	<a href='<?=g::url()?>/?page=opensource'>오픈소스</a>
	<a href='<?=g::url()?>/bbs/board.php?bo_table=withcenter1'>자유토론</a>
</div></div> 

<div class='layout'>
	<table class='main-content' cellpadding=0 cellspacing=0 width='100%' border=0>
		<tr valign='top'>
			<td class='left' width='200'>	
				<? include x::dir().'/theme/withcenter/left.php'; ?>
				
			</td>
			<td width='10'></td>
			<td class='content'>
