<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
include_once(G5_LIB_PATH.'/thumbnail.lib.php');
?>
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/jquery-ui.css?<?php echo G5_TIME_YMD?>" />
<link rel="stylesheet" href="<?php echo $board_skin_url ?>/style.css">
<?php if($board[bo_2] == "black") { ?><link rel="stylesheet" href="<?php echo $board_skin_url ?>/css/black.css" /><?php } ?>

<?php if($view[wr_7] == 1) { ?>
<link rel="stylesheet" type="text/css" media="all" href="<?php echo $board_skin_url ?>/css/music.css" />

<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/jquery.jplayer.min.js"></script>
<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/jfunc.js"></script>
<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/jplay.js"></script>
<script type="text/javascript">
	<!--
	var popup_width = 450; 
	var silence_mp3 = "<?php echo $board_skin_url ?>/js/silence.mp3"; 
	var foxPP_bodycolour = "#fff"; 
	var foxPP_bodyimg = "";
	var foxPP_stylesheet = "<?php echo $board_skin_url ?>/css/music.css"; 
	var foxPP_fixedcss = "false"; 
	var popup_maxheight = "600";
//-->
</script>
<?php } ?>

<script type="text/javascript" src="<?php echo $board_skin_url ?>/js/jquery.mousewheel-3.0.6.pack.js"></script>
<script type="text/javascript" src="<?php echo $board_skin_url ?>/fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $board_skin_url ?>/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<link rel="stylesheet" type="text/css" href="<?php echo $board_skin_url ?>/fancybox/helpers/jquery.fancybox-buttons.css?v=1.0.5" />
<script type="text/javascript" src="<?php echo $board_skin_url ?>/fancybox/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<!-- <script type="text/javascript" src="<?php echo $board_skin_url ?>/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.0"></script> -->
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
</script>


<script src="<?php echo G5_JS_URL; ?>/viewimageresize.js"></script>
<div id="bd_<?php echo $wr_id?>" class="bd use_np hover_effect">
	<div class="bd_hd clear">
		<div class="bd_bc fl">
			<a href="<?php echo G5_URL?>"><strong>Home</strong></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/group.php?gr_id=<?php echo $group[gr_id]?>"><?php echo $group['gr_subject']?></a>
			<span>&rsaquo;</span><a href="<?php echo G5_BBS_URL?>/board.php?bo_table=<?php echo $board[bo_table]?>"><em><?php echo $board['bo_subject'] ?></em></a>
		</div>	

		<div class="bd_font fr" style="display:none">
			<a class="select tg_btn2" href="#" data-href=".bd_font_select"><b>T</b><strong>추천글꼴</strong><span class="arrow down"></span></a>
			<div class="bd_font_select tg_cnt2"><button type="button" class="tg_blur2"></button>
				<ul>
					<li class="ui_font on"><a href="#" title="나눔고딕 등의 여러글꼴을 섞어서 사용합니다">추천글꼴</a><em>✔</em></li>
					<li class="ng"><a href="#popup_menu_area">나눔고딕</a><em>✔</em></li>
					<li class="window_font"><a href="#">맑은고딕</a><em>✔</em></li>
					<li class="tahoma"><a href="#">돋움</a><em>✔</em></li>
				</ul><button type="button" class="tg_blur2"></button>
			</div>
		</div>	

	
		<div class="rd_nav img_tx fr m_btn_wrp">
			<div class="help bubble left m_no">
			<a class="text" href="#" onclick="jQuery(this).next().fadeToggle();return false">?</a>
				<div class="wrp">
					<div class="speech">
						<h4>단축키</h4>
						<p><strong><b class="ui-icon ui-icon-arrow-1-w"><span class="blind">Prev</span></b></strong>이전 문서</p>
						<p><strong><b class="ui-icon ui-icon-arrow-1-e"><span class="blind">Next</span></b></strong>다음 문서</p>
					</div>
					<i class="edge"></i>
					<i class="ie8_only bl"></i><i class="ie8_only br"></i>
				</div>
			</div>	
			<a class="tg_btn2 bubble m_no" href="#" data-href=".bd_font_select" title="글꼴 선택"><b>가</b><span class="arrow down"></span></a>
			<a class="font_plus bubble" href="#" title="크게"><b class="ui-icon ui-icon-zoomin">+</b></a>
			<a class="font_minus bubble" href="#" title="작게"><b class="ui-icon ui-icon-zoomout">-</b></a>
			<a class="back_to bubble m_no" href="#bd_<?php echo $wr_id?>" title="위로"><b class="ui-icon ui-icon-arrow-1-n">Up</b></a>
			<a class="back_to bubble m_no" href="#rd_end_<?php echo $wr_id?>" title="(목록) 아래로"><b class="ui-icon ui-icon-arrow-1-s">Down</b></a>
			<?php if ($view[wr_comment]) {?><a class="comment back_to bubble if_viewer m_no" href="#c_<?php echo $comment_id ?>" title="댓글로 가기"><b class="ui-icon ui-icon-comment">Comment</b></a><?php } ?>
			<?php for ($i=0; $i<count($view['file']); $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) { ?><a class="file back_to bubble m_no" href="#files_<?php echo $wr_id?>" onclick="jQuery('#files_<?php echo $wr_id?>').show();return false" title="첨부파일"><b class="ui-icon ui-icon-disk">Files</b><span class="tx">첨부파일</span></a><?php  break; } ?><?php } ?>
			<a class="bubble m_no" href="<?=$list_href?>" title="목록으로"><b class="ui-icon ui-icon-print">목록</b><span class="tx">목록으로</span></a>
			<?php if ($update_href) { ?><a class="edit bubble" href="<?php echo $update_href ?>" title="수정"><i class="ico_16px write"></i>수정</a><?php } ?>
		</div>
	</div>


	<div class="rd rd_nav_style2 clear">
		<div class="rd_hd clear" style="margin:0 -15px 20px">
		<?php if ($view[wr_8] == "1" || $gr_id == "blog") { ?>
			<div class="blog v3" style="text-align:center;;">
				<div class="top_area ngeb np_18px"></div>
					<h1 class="font ngeb" style=";-webkit-animation-name:rd_h1_v;-moz-animation-name:rd_h1_v;animation-name:rd_h1_v;"><?php echo cut_str(get_text($view['wr_subject']), 70);?></h1>	
					<div class="btm_area ngeb np_18px" style="text-align:"> 
						<?php if ($category_name) { ?><span><small>In </small><b title="Category"><?php echo $view['ca_name'].' '; ?></b></span><?php } ?>
						<span><small>by </small><b><?php echo $view['name'] ?></b></span>
						<span title="<?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?>"><small>posted </small><b class="date"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></b></span>
						<span>조회 수 <b><?php echo number_format($view['wr_hit']) ?></b></span> <span>댓글 <b><?php echo number_format($view['wr_comment']) ?></b></span>
					</div>
				</div>
		<?php } else { ?>		
			<div class="board clear xe_v3">
				<div class="top_area ngeb">
					<strong class="cate fl" title="Category"><?php if ($category_name) echo $view['ca_name'].' '; ?></strong>
					<div class="fr"><span class="date"><?php echo date("y-m-d H:i", strtotime($view['wr_datetime'])) ?></span></div>
					<h1 class="np_18px"><?php echo cut_str(get_text($view['wr_subject']), 70);?></h1>
				</div>
				<div class="btm_area clear">
					<div class="side"><?php echo $view['name'] ?></div>
					<div class="side fr"><span>조회 수 <b><?php echo number_format($view['wr_hit']) ?></b></span> <span>댓글 <b><?php echo number_format($view['wr_comment']) ?></b></span></div>
				</div>
			</div>		
		<?php } ?>	
			<div class="rd_nav_side">
				<div class="rd_nav img_tx fr m_btn_wrp">
					<div class="help bubble left m_no">
					<a class="text" href="#" onclick="jQuery(this).next().fadeToggle();return false">?</a>
						<div class="wrp">
							<div class="speech">
								<h4>단축키</h4>
								<p><strong><b class="ui-icon ui-icon-arrow-1-w"><span class="blind">Prev</span></b></strong>이전 문서</p>
								<p><strong><b class="ui-icon ui-icon-arrow-1-e"><span class="blind">Next</span></b></strong>다음 문서</p>
							</div>
							<i class="edge"></i>
							<i class="ie8_only bl"></i><i class="ie8_only br"></i>
						</div>
					</div>
					
					<a class="tg_btn2 bubble m_no" href="#" data-href=".bd_font_select" title="글꼴 선택"><b>가</b><span class="arrow down"></span></a>
					<a class="font_plus bubble" href="#" title="크게"><b class="ui-icon ui-icon-zoomin">+</b></a>
					<a class="font_minus bubble" href="#" title="작게"><b class="ui-icon ui-icon-zoomout">-</b></a>
					<a class="back_to bubble m_no" href="#bd_<?php echo $wr_id?>" title="위로"><b class="ui-icon ui-icon-arrow-1-n">Up</b></a>
					<a class="back_to bubble m_no" href="#rd_end_<?php echo $wr_id?>" title="(목록) 아래로"><b class="ui-icon ui-icon-arrow-1-s">Down</b></a>
					<?php if ($view[wr_comment]) {?><a class="comment back_to bubble if_viewer m_no" href="#c_<?php echo $comment_id ?>" title="댓글로 가기"><b class="ui-icon ui-icon-comment">Comment</b></a><?php } ?>
					<?php for ($i=0; $i<count($view['file']); $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) { ?><a class="file back_to bubble m_no" href="#files_<?php echo $wr_id?>" onclick="jQuery('#files_23409').show();return false" title="첨부파일"><b class="ui-icon ui-icon-disk">Files</b></a><?php  break; } ?><?php } ?>
					<a class="bubble m_no" href="<?=$list_href?>" title="목록으로"><b class="ui-icon ui-icon-print">목록</b></a>
				</div>
			</div>
		</div>
		
		<div class="rd_body clear">

<?php if($view[wr_7] == 1) { 

        $v_img_count = count($view['file']);
        if($v_img_count) {

            for ($i=0; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
					$upfile = $view['file'][$i]['path']."/".$view['file'][$i]['file'];
					// $filepath = G5_PATH."/data/file/$bo_table";
					$filepath = "../data/file/$bo_table";
					$fileurl = G5_DATA_URL."/file/$bo_table";
					$thumbs[$i] = thumbnail($view['file'][$i]['file'], $filepath, $filepath, 274, 274, false, true);
                }
            }
        }

?>
<div class="frameset2 clear" style="margin:30px 0">
	<div class="clear headtop2">
	<div class="track_item">
	<div class="cover_overlay"  title="<?php echo $view[subject]?>"></div>

	<img class="cover" src="<?php echo $fileurl?>/<?php echo $thumbs[0]?>" alt="<?php echo $view[subject]?>" /></div>
		<div style="position:relative;">
		<div id="jquery_jplayer"></div>
	</div>

<script type="text/javascript">
	var mp3jNew_0 = [ 
	{name: "<?php echo $view[wr_1]?>", mp3: "<?php echo $fileurl?>/<?php echo $view[file][2][file]?>", artist: "<?php echo $view[wr_2]?>"}<?php if($view[file][3][file]){ ?>,
	{name: "<?php echo $view[wr_1]?>", mp3: "<?php echo $fileurl?>/<?php echo $view[file][3][file]?>", artist: "<?php echo $view[wr_2]?>"}<?php } ?>];
 </script>
 <div class="wrap-MI" style="margin:20px 0 0 0">
	<div class="coverwrap"><img src="<?php echo $fileurl?>/<?php echo $thumbs[1]?>" class="attachment-albmlink" alt="<?php echo $view[subject]?>" title="<?php echo $view[subject]?>" /><a href="#"><span class="albmover"></span></a>
	</div>
	<div class="jp-innerwrap">
		<div class="innerx"></div>
		<div class="jp-interface">
			<div class="pinfo">
				<div id="T_mp3j_0" class="player-track-title smallfont" style="left:16px;"></div>
				<div id="C_mp3j_0" class="player-artist smallfont"></div>
			</div>
						
			<div class="MIsliderVolume" id="vol_mp3j_0"></div>
			<div class="bars_holder">
				<div class="loadMI_mp3j" id="load_mp3j_0"></div>
				<div class="posbarMI_mp3j" id="posbar_mp3j_0"></div>
			</div>
			<div class="transport-MI">
				<div id="stop_mp3j_0" class="stop_mp3j">Stop</div>
				<div class="buttons_mp3j" id="playpause_mp3j_0">Play Pause</div>
				<div class="Next_mp3j" id="Next_mp3j_0">Next&raquo;</div>
				<div class="Prev_mp3j" id="Prev_mp3j_0">&laquo;Prev</div>
			</div>
						
			<div id="P-Time-MI_0" class="jp-play-time vfont"></div>
		</div>
	</div>
				
	<div class="listwrap_mp3j" id="L_mp3j_0" style="width: 314px;">
		<div class="playlist-wrap-MI">
			<div class="playlist-colour"></div>
			<div class="playlist-wrap-MI">
				<ul class="UL-MI_mp3j" id="UL_mp3j_0"><li></li></ul>
			</div>
		</div>
	</div>
</div>
 
<div class="page-title2">
	<h1 class="vfont"><?php echo $view[wr_subject]?></h1>
	<ul>
		<li>청취 : <?php echo $view['wr_hit']?></li>
		<li>추천 : <?php echo $view['wr_good']?></li>
		<li>분류 : <? if ($is_category) { echo ($category_name ? "<span class=\"category\">[$view[ca_name]]</span>" : ""); } ?></li>
	</ul>
</div>
<script type="text/javascript">
<!--
	var mp3j_info = [{ list:mp3jNew_0, type:"MI", tr:0, lstate:false, loop:false, play_txt:"#USE_G#", pause_txt:"", pp_title:"Seehaa", autoplay:false, has_ul:1, transport:"playpause", status:"full", download:true, vol:55, height:105 }	];
//-->
</script>
</div>			
</div>

<script type="text/javascript">
<!--
	var foxpathtoswf = "<?php echo $board_skin_url ?>/js";
	var foxpathtoimages = "<?php echo $board_skin_url ?>/images";
	var FoxAnimSlider = false;
	var fox_playf = "true";
//-->
</script>
<?php } else if ($view[wr_9] == 1) {
        // 파일 출력
        $v_img_count = count($view['file']);
        if($v_img_count) {
            echo "<div style=\"text-align:center\">\n";
            echo "<div id=\"bo_v_img\">\n";

            for ($i=1; $i<=count($view['file']); $i++) {
                if ($view['file'][$i]['view']) {
                    //echo $view['file'][$i]['view'];
                    $str = get_view_thumbnail($view['file'][$i]['view']);
					$str=str_replace("bbs/view_image.php?bo_table={$bo_table}&amp;fn=", "data/file/{$bo_table}/", $str);
					$str=str_replace("bbs/view_image.php?fn=%2Fdata%2Feditor%2F", "data/editor/", $str);
					$str=str_replace("%2F", "/", $str);
					$str=str_replace("target=\"_blank\" class=\"view_image\"", "data-fancybox-group='{$bo_table}' class='fancybox'", $str);

			echo "<div class=\"document_{$wr_id}  wr_content\">".$str."</div>	"; 	                    
                }
            }

            echo "</div>\n";
            echo "</div>\n";
        }
        } else {

			if(!$view[wr_6]) {
				// 파일 출력
				$v_img_count = count($view['file']);
				if($v_img_count) {
					echo "<div style=\"text-align:center\">\n";
					echo "<div id=\"bo_v_img\">\n";

					for ($i=0; $i<=count($view['file']); $i++) {
						if ($view['file'][$i]['view']) {
							$str = get_view_thumbnail($view['file'][$i]['view']); 
							$str=str_replace("bbs/view_image.php?bo_table={$bo_table}&amp;fn=", "data/file/{$bo_table}/", $str);
							$str=str_replace("bbs/view_image.php?fn=%2Fdata%2Feditor%2F", "data/editor/", $str);
							$str=str_replace("%2F", "/", $str);
							$str=str_replace("target=\"_blank\" class=\"view_image\"", "data-fancybox-group='{$bo_table}' class='fancybox'", $str);

			echo "<div class=\"document_{$wr_id}  wr_content\">".$str."</div>	"; 							
						}
					}

					echo "</div>\n";
					echo "</div>\n";
				}
			} else {

			}
		}
?>

		<?php
			if($view[wr_6] == 1) {
				$str = get_view_thumbnail($view['rich_content']);
			} else {
				$str = get_view_thumbnail($view['content']);
			}
			$str=str_replace("bbs/view_image.php?bo_table={$bo_table}&amp;fn=", "data/file/{$bo_table}/", $str);
			$str=str_replace("bbs/view_image.php?fn=%2Fdata%2Feditor%2F", "data/editor/", $str);
			$str=str_replace("%2F", "/", $str);
			$str=str_replace("target=\"_blank\" class=\"view_image\"", "data-fancybox-group='{$bo_table}' class='fancybox'", $str);

			echo "<div class=\"document_{$wr_id}  wr_content\">".$str."</div>	"; 
		 ?>

		 <?php 
		 // 동영상
		 // 링크 : https://www.youtube.com/watch?feature=player_detailpage&v=Xc1KaePfc6Q
		 $youtube_link = $view['wr_10'];
		 $youtube_url = parse_url($youtube_link);
		 parse_str($youtube_url['query']);

		 // 다음팟 http://tvpot.daum.net/v/vf1f9xx6oCXBCGGx8GJRC8t
		 $daumpot_url = $view['wr_10'];
		 $daum_find = "daum";
		 if(strpos($daumpot_url, $daum_find)){
		 $daumpot_limit = parse_url($daumpot_url, PHP_URL_PATH);
		 $daumpot_limit = str_replace("/v/", "", $daumpot_limit);
		 }
		 ?>

		 <?php if($v){ ?>
		 <iframe width="700" height="434" src="//www.youtube.com/embed/<?php echo $v; ?>?feature=player_detailpage&vq=hd720" frameborder="0" allowfullscreen style="margin:30px 0;"></iframe>
		 <p></p>
		 <?php } ?>

		 <?php if($daumpot_limit){ ?>
		 <iframe title='' width='728px' height='450px' src='http://videofarm.daum.net/controller/video/viewer/Video.html?vid=<?php echo $daumpot_limit ?>&play_loc=undefined' frameborder='0' scrolling='no'  style="margin:30px 0;"></iframe>
		 <p></p>
		 <?php } ?>
		 		
			<div class="rd_t_f rd_tag css3pie clear">
				<div class="bg_f_color border_color">TAG &bull;</div>
					<ul>
						<li><?=$view[wr_related]?> <span class="comma">,</span></li>
					</ul>
				</div>
			</div>
	
			<div class="rd_ft">
			 <?php if ($is_signature) { ?>
				<div class="rd_sign clear">
				<h4><b class="tx_ico_circ bg_color"><i class="ie8_only color">●</i><b>?</b></b>Who's <em><?php echo $view[name]?></em></h4>
				<?php
				$mb_dir = substr($member['mb_id'],0,2);
				$photo_path = G5_DATA_PATH.'/member/'.$mb_dir;
				$photo_file = G5_DATA_URL.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';
				$photo_data = G5_DATA_PATH.'/member/'.$mb_dir.'/thumb-'.$member['mb_id'].'_2_60x60.jpg';

				if (file_exists($photo_data)) {
					echo '<img src="'.$photo_file.'" alt="profile image" class="profile iePngFix">';
				} else {
				echo "<span class='profile no_img'>?</span>";
				}
				?>
					<div class="get_sign"><?php echo $signature ?></div>
				</div>	
			<?php } ?>
				<div class="bd_prev_next clear">
					<div>
				 <?php if ($prev_href) { 
				$prev_img = goto_img($prev_href); 
				$filepath = "../data/file/$bo_table";
				$fileurl = G5_DATA_URL."/file/$bo_table";
				$prev_img_thumb = thumbnail($prev_img, $filepath, $filepath, 160, 100, true, true); 	
				$prev_img_thumb = $fileurl."/".$prev_img_thumb; 	
				if (!$prev_img) $prev_img_thumb = $board_skin_url."/img/no_img_zine.jpg";
				 ?>
				<a href="<?php echo $prev_href ?>" class="bd_rd_prev bubble no_bubble fl">
					<p><em class="link">« Prev</em> <?php echo cut_str($prev_wr_subject,40) ?></p>
					<span class="wrp prev_next"><span class="speech"><img src="<?php echo $prev_img_thumb?>" alt="<?php echo cut_str($prev_wr_subject,40) ?>" /><b><?php echo strip_tags($prev_wr_content) ?></b><span><em><?php echo $prev_wr_datetime ?></em><small>by </small><?php echo $prev_wr_name ?></span></span><i class="edge"></i><i class="ie8_only bl"></i><i class="ie8_only br"></i></span><i class="tx_arrow">〈</i>
				</a>
				<?php } ?>
				<?php if ($next_href) { 
				$next_img = goto_img($next_href); 
				$filepath = "../data/file/$bo_table";
				$fileurl = G5_DATA_URL."/file/$bo_table";
				$next_img_thumb = thumbnail($next_img, $filepath, $filepath, 160, 100, true, true); 
				$next_img_thumb = $fileurl."/".$next_img_thumb;
				if (!$next_img) $next_img_thumb = $board_skin_url."/img/no_img_zine.jpg";				
				?>				
				<a href="<?php echo $next_href ?>" class="bd_rd_next bubble no_bubble fr">
					<p><?php echo cut_str($next_wr_subject,40) ?><em class="link">Next »</em></p><span class="wrp prev_next"><span class="speech"><img src="<?php echo $next_img_thumb?>" alt="<?php echo cut_str($next_wr_subject,40) ?>" /><b><?php echo strip_tags($next_wr_content) ?></b><span><em><?php echo $next_wr_datetime ?></em><small>by </small><?php echo $next_wr_name ?></span></span><i class="edge"></i><i class="ie8_only bl"></i><i class="ie8_only br"></i></span><i class="tx_arrow">〉</i>
				</a>
				<?php } ?>
			</div>
		</div>	
		<? 
		function goto_img($str){ 
			global $g5, $bo_table; 
			if($wr_id=="") { $str = explode("wr_id=", $str); } else { $str = explode("$bo_table/", $str); } 
			$str = explode("&", $str[1]); 
			$wr_id_in = $str[0]; 
			$sql = " select bf_file  from $g5[board_file_table] where wr_id = $wr_id_in and bo_table = '$bo_table' and (bf_type = '1' || bf_type = '2' || bf_type = '3') order by bf_no limit 1"; 
			$row = sql_fetch($sql); 
			return $row[bf_file]; 
		} 
		?> 
        <!-- 스크랩 추천 비추천 시작 { -->
        <?php if ($scrap_href || $good_href || $nogood_href) { ?>
		<div class="rd_vote">
			 <?php if ($good_href) { ?><a class="bg_f_f9 bd_login" href="<?php echo $good_href.'&amp;'.$qstr ?>"  id="good_button" style="border:2px solid #87cefa;color:#87cefa;">
				<b>♥ <?php echo number_format($view['wr_good']) ?></b>
				<p>추천</p>
			</a><?php } ?>
			<?php if ($nogood_href) { ?><a class="bg_f_f9 blamed bd_login" href="<?php echo $nogood_href.'&amp;'.$qstr ?>"  id="nogood_button" >
				<b>♥ <?php echo number_format($view['wr_nogood']) ?></b>
				<p>비추천</p>
			</a><?php } ?>
		</div>	
        <?php } else {
            if($board['bo_use_good'] || $board['bo_use_nogood']) {
        ?>
		<div class="rd_vote">
			<?php if($board['bo_use_good']) { ?><a class="bg_f_f9 bd_login" href="<?php echo $good_href.'&amp;'.$qstr ?>" style="border:2px solid #87cefa;color:#87cefa;"  id="good_button">
				<b>♥  <?php echo number_format($view['wr_good']) ?></b>
				<p>추천</p>
			</a><?php } ?>
			<?php if($board['bo_use_nogood']) { ?><a class="bg_f_f9 blamed bd_login" href="<?php echo $nogood_href.'&amp;'.$qstr ?>" id="nogood_button">
				<b>♥ <?php echo number_format($view['wr_nogood']) ?></b>
				<p>비추천</p>
			</a><?php } ?>
		</div>
        <?php
            }
        }
        ?>
    <?php
    if ($view['file']['count']) {
        $cnt = 0;
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view'])
                $cnt++;
        }
    }
     ?>
	<?php if($cnt) { ?>
		<table id="files_<?php echo $wr_id?>" class="rd_fnt rd_file bd_tb">
		<caption class="blind">Atachment</caption>
        <?php
        // 가변 파일
        for ($i=0; $i<count($view['file']); $i++) {
            if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) {
         ?>
			<tr>
				<th scope="row" class="ui_font"><strong>첨부파일</strong> <span class="fnt_count">'<b><?php echo $i;?></b>'</span></th>
				<td>
					<ul>
						<li><img src="<?php echo $board_skin_url ?>/img/icon_file.gif" alt="첨부"> <a class="bubble" href="<?php echo $view['file'][$i]['href'];  ?>" title="[File Size:<?php echo $view['file'][$i]['size'] ?>/Download:<?php echo $view['file'][$i]['download'] ?> 회]"><strong><?php echo $view['file'][$i]['source'] ?></strong><?php echo $view['file'][$i]['bf_content'] ?></a><span class="comma">,</span></li>
					</ul>
				</td>
				<td style="white-space:nowrap"> <span>DATE : <?php echo $view['file'][$i]['datetime'] ?></span></td>
			</tr>
        <?php
            }
        }
         ?>
		</table>	
	<?php } ?>
	
    <?php
    if (implode('', $view['link'])) {
     ?>
		<table id="links_<?php echo $wr_id?>" class="rd_fnt rd_file bd_tb">
		<caption class="blind">Links</caption>
        <?php
        // 링크
        $cnt = 0;
        for ($i=1; $i<=count($view['link']); $i++) {
            if ($view['link'][$i]) {
                $cnt++;
                $link = cut_str($view['link'][$i], 70);
         ?>
			<tr>
				<th scope="row" class="ui_font"><strong>링크</strong> <span class="fnt_count">'<b><?php echo $i;?></b>'</span></th>
				<td>
					<ul>
						<li><img src="<?php echo $board_skin_url ?>/img/icon_link.gif" alt="링크"> <a href="<?php echo $view['link_href'][$i] ?>" target="_blank"><strong><?php echo $link ?></strong><span class="comma">,</span></a></li>
					</ul>
				</td>
				<td style="white-space:nowrap"> <span><?php echo $view['link_hit'][$i] ?>회 연결</span></td>
			</tr>
        <?php
            }
        }
         ?>
		</table>
    <?php } ?>
<?php
$sns_msg = urlencode(str_replace('\"', '"', $view['subject']));
$sns_url = googl_short_url('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$msg_url = $sns_msg.' : '.$sns_url;

// 카카오톡 매뉴얼 : https://github.com/kakao/kakaolink-web
$kakao_appid   = $_SERVER['HTTP_HOST']; // Mobile Site Domain 정확히 입력하지 않을 경우 이용이 제한될 수 있습니다.
$kakao_appname = urlencode(str_replace('\"', '"', $g5['title']));

$facebook_url  = 'http://www.facebook.com/sharer/sharer.php?s=100&p[url]='.$sns_url.'&p[title]='.$sns_msg;
$twitter_url   = 'http://twitter.com/home?status='.$msg_url;
$gplus_url     = 'https://plus.google.com/share?url='.$sns_url;
?>    
		<div class="rd_ft_nav clear">
			<div class="rd_nav img_tx to_sns fl"><a class="facebook " href="<?php echo $facebook_url?>" target="_blank" title="To Facebook"><i class="ico_16px facebook"></i><strong> Facebook</strong></a><a class="twitter " href="<?php echo $twitter_url?>" target="_blank" title="To Twitter"><i class="ico_16px twitter"></i><strong> Twitter</strong></a>
		</div>			
		
		<div class="rd_nav img_tx fr m_btn_wrp">		
			<a class="back_to bubble" href="#bd_<?php echo $wr_id?>" title="위로"><b class="ui-icon ui-icon-arrow-1-n">Up</b></a>
			<a class="back_to bubble" href="#rd_end_<?php echo $wr_id?>" title="(목록) 아래로"><b class="ui-icon ui-icon-arrow-1-s">Down</b></a>
			<a class="print_doc bubble m_no" href="#" title="인쇄"><b class="ui-icon ui-icon-print">Print</b></a>
			<?php for ($i=0; $i<count($view['file']); $i++) { if (isset($view['file'][$i]['source']) && $view['file'][$i]['source'] && !$view['file'][$i]['view']) { ?><a class="file" href="#" onclick="jQuery('#files_<?php echo $wr_id?>').slideToggle();return false"><b class="ui-icon ui-icon-disk">Files</b><span class="tx">첨부파일</span></a><?php  break; } ?><?php } ?>
			<?php if ($scrap_href) { ?><a href="<?php echo $scrap_href; ?>" title="스크랩" target="_blank" class="edit bubble" onclick="win_scrap(this.href); return false;"><i class="ico_16px home"></i>스크랩</a><?php } ?>
			<?php if ($update_href) { ?><a class="edit bubble" href="<?php echo $update_href ?>" title="수정"><i class="ico_16px write"></i>수정</a><?php } ?>
			<?php if ($delete_href) { ?><a class="edit bubble" href="<?php echo $delete_href ?>" onclick="del(this.href); return false;" title="삭제"><i class="ico_16px delete"></i>삭제 </a><?php } ?>
			<? if ($copy_href) { ?><a class="edit bubble" href="<?php echo $copy_href?>" title="복사" onclick="board_move(this.href); return false;"><b class="ico_16px copy"></b> 복사</a><? } ?>
			<?php if ($move_href) { ?><a class="edit bubble" href="<?php echo $move_href ?>" title="이동"  onclick="board_move(this.href); return false;"><b class="ico_16px move"></b>이동</a><?php } ?>
		</div>
	</div>
</div>

    <?php
    // 코멘트 입출력
   include_once('./view_comment.php');
    ?>
	
<div class="btm_mn clear" style="border-top:1px solid #CCC">
	<div class="fl">
		<a class="btn_img no" href="<?=$list_href?>" title="목록">목록</a>
		<a class="btn_img no back_to" href="#bd_<?php echo $wr_id?>" title="위로">위로</a>
	</div>
	<div class="fr">
		<? if ($reply_href) { ?><a class="btn_img no" href="<?=$reply_href?>" title="답변"><b class="ico_16px reply"></b>답변</a><? } ?>
		<? if ($write_href) { ?><a class="btn_img" href="<?=$write_href?>" title="쓰기"><b class="ico_16px write"></b> 쓰기</a><? } ?>
	</div>
</div>

<hr id="rd_end_<?php echo $wr_id?>" class="rd_end clear" />
<p class="blind">Designed by sketchbooks.co.kr / sketchbook5 board skin</p>
	<div id="bd_font_install">
		<div id="install_ng2">
			<button type="button" class="tg_blur2"></button><button class="tg_close2">X</button>
			<h3>나눔글꼴 설치 안내</h3><br />
			<h4>이 PC에는 <b>나눔글꼴</b>이 설치되어 있지 않습니다.</h4>
			<p>이 사이트를 <b>나눔글꼴</b>로 보기 위해서는<br /><b>나눔글꼴</b>을 설치해야 합니다.</p>
			<a class="do btn_img" href="http://hangeul.naver.com/" target="_blank"><span class="tx_ico_chk">✔</span> 설치</a>
			<a class="btn_img no close" href="#">취소</a>
			<button type="button" class="tg_blur2"></button>
		</div>
		<div class="fontcheckWrp">
			<div class="blind">
				<p id="fontcheck_ng3" style="font-family:'나눔고딕',NanumGothic,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
				<p id="fontcheck_ng4" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
			</div>	
			<div class="blind">
				<p id="fontcheck_np1" style="font-family:'나눔손글씨 펜','Nanum Pen Script',np,monospace,Verdana !important">Sketchbook5, 스케치북5</p>
				<p id="fontcheck_np2" style="font-family:monospace,Verdana !important">Sketchbook5, 스케치북5</p>
			</div> 
		</div>
	</div>
	<div style="clear:both; height:50px; border-top:1px dashed #ccc; margin:10px 0 0 0;"></div>
</div>
</div>



<script>
<?php if ($board['bo_download_point'] < 0) { ?>
$(function() {
    $("a.view_file_download").click(function() {
        var msg = "파일을 다운로드 하시면 포인트가 차감(<?php echo number_format($board['bo_download_point']) ?>점)됩니다.\n\n포인트는 게시물당 한번만 차감되며 다음에 다시 다운로드 하셔도 중복하여 차감하지 않습니다.\n\n그래도 다운로드 하시겠습니까?";

        if(confirm(msg)) {
            var href = $(this).attr("href")+"&js=on";
            $(this).attr("href", href);

            return true;
        } else {
            return false;
        }
    });
});
<?php } ?>

function board_move(href)
{
    window.open(href, "boardmove", "left=50, top=50, width=500, height=550, scrollbars=1");
}
</script>

<script>
$(function() {
    $("a.view_image").click(function() {
        window.open(this.href, "large_image", "location=yes,links=no,toolbar=no,top=10,left=10,width=10,height=10,resizable=yes,scrollbars=no,status=no");
        return false;
    });

    // 추천, 비추천
    $("#good_button, #nogood_button").click(function() {
        var $tx;
        if(this.id == "good_button")
            $tx = $("#bo_v_act_good");
        else
            $tx = $("#bo_v_act_nogood");

        excute_good(this.href, $(this), $tx);
        return false;
    });

    // 이미지 리사이즈
    $("#bo_v_atc").viewimageresize();
});

function excute_good(href, $el, $tx)
{
    $.post(
        href,
        { js: "on" },
        function(data) {
            if(data.error) {
                alert(data.error);
                return false;
            }

            if(data.count) {
                $el.find("strong").text(number_format(String(data.count)));
                if($tx.attr("id").search("nogood") > -1) {
                    $tx.text("이 글을 비추천하셨습니다.");
                } else {
                    $tx.text("이 글을 추천하셨습니다.");
                }
            }
        }, "json"
    );
}
</script>
<!-- } 게시글 읽기 끝 -->


<script>
$(function() {
    // 폰트 리사이즈 쿠키있으면 실행
    font_resize("container", get_cookie("ck_font_resize_rmv_class"), get_cookie("ck_font_resize_add_class"));
});
</script>


<div id="fontcheck" title="" style="position:absolute;top:-999px;left:-999px;visibility:hidden;font-size:72px">
	<p id="fontcheck_nanum1" style="float:left;font-family:NanumGothic,나눔고딕,monospace,Verdana !important">abcXYZ, 세종대왕,1234</p>
	<p id="fontcheck_nanum2" style="float:left;font-family:monospace,Verdana !important">abcXYZ, 세종대왕,1234</p>
</div>
		
<div class="wfsr"></div>


<script src="<?php echo $board_skin_url ?>/js/jquery-ui.min.js?<?php echo G5_TIME_YMD?>"></script>
<script src="<?php echo $board_skin_url ?>/js/jquery.cookie.js?<?php echo G5_TIME_YMD?>"></script>
<script src="<?php echo $board_skin_url ?>/js/board.js?<?php echo G5_TIME_YMD?>"></script>
<script src="<?php echo $board_skin_url ?>/js/webfont.js?<?php echo G5_TIME_YMD?>"></script>