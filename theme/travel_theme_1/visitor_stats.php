<?
$file_name = etc::domain()."_".basename(__FILE__);
/*************get_cache*****************/
//get_cache(file path full directory, EXPIRATION TIME);
//*NOTE that leaving it blank or adding "0" as expiration time disables time expiration for the file/
$visits = etc::cache_read( $file_name );
if ( empty($visits) ) {
	$current_date = date('Y-m-d');
	$week_now = date('W')-1;
	$year_now_week_compare = date('Y');
	$month_now = date('m');
	$year_now_month_compare = date('Y');
	$year_now = date('Y');

	$month_text = date('M');

	for( $ctr = 0; $ctr < 4; $ctr ++){
		$visits_week[] = db::rows("SELECT * FROM ".$g5['visit_sum_table']." WHERE WEEK(vs_date) = $week_now AND YEAR(vs_date) = $year_now_week_compare");
		$visits_week[$ctr]['week'] = ($week_now+1)."주<br/>".$year_now_week_compare;
		$week_now = $week_now - 1;
		if( $week_now == 0 ){
			$week_now = 52;	
			$year_now_week_compare = $year_now_week_compare - 1;
		}
		if( $visits_week[$ctr] == '') $visits_week[$ctr] = 0;
		if( !isset($visits_week[$ctr][0]['vs_count'] )) $visits_week[$ctr][0]['vs_count']	= 0;
	}

	for( $ctr = 0; $ctr < 4; $ctr ++){	
		$visits_month[] = db::rows( "SELECT * FROM ".$g5['visit_sum_table']." WHERE MONTH(vs_date) = $month_now AND YEAR(vs_date) = $year_now_month_compare");	
		$visits_month[$ctr]['month'] = $month_text."<br/>".$year_now_month_compare ;
		$month_now = $month_now - 1;
		if( $month_now == 0 ) {
			$month_now = 12;
			$year_now_month_compare = $year_now_month_compare - 1;
		}
		$month_text = date('M', strtotime("-".($ctr+1)." month", strtotime($current_date)));	
		if( !isset($visits_month[$ctr][0]['vs_count'] )) $visits_month[$ctr][0]['vs_count']	= 0;
	}

	for( $ctr = 0; $ctr < 4; $ctr ++){	
		$visits_year[] = db::rows( "SELECT * FROM ".$g5['visit_sum_table']." WHERE YEAR(vs_date) = $year_now");	
		$visits_year[$ctr]['year'] = $year_now;
		$year_now = $year_now - 1;
		if( !isset($visits_year[$ctr][0]['vs_count'] )) $visits_year[$ctr][0]['vs_count']	= 0;

	}
	
	if ( $visits_week ) {
		$count = 0;
		$visits['week']['total'] = 0;
		foreach( $visits_week as $v ){
		$visits['week'][$count]['title'] = $v['week'];
			foreach( $v as $weekly ){			
					if( isset($weekly['vs_count'] )){
						$visits['week']['total'] += $weekly['vs_count'];
						$visits['week'][$count]['visit_sum'] += $weekly['vs_count'];					
					}
				}
			$count++;
		}
	}

	if ( $visits_month ) {
		$count = 0;
		$visits['month']['total'] = 0;
		foreach( $visits_month as $v ){
		$visits['month'][$count]['title'] = $v['month'];	
			foreach( $v as $monthly ){	
					if( isset($monthly['vs_count'] )){
						$visits['month']['total'] += $monthly['vs_count'];
						$visits['month'][$count]['visit_sum'] += $monthly['vs_count'];					
					}
					
				}
			$count++;
		}
	}

	if ( $visits_year ) {
		$count = 0;
		$visits['year']['total'] = 0;
		foreach( $visits_year as $v ){
		$visits['year'][$count]['title'] = $v['year'];
			foreach( $v as $yearly ){
					if( isset($yearly['vs_count'] )){
						$visits['year']['total'] += $yearly['vs_count'];
						$visits['year'][$count]['visit_sum'] += $yearly['vs_count'];					
					}
				}
			$count++;
		}
	}
	etc::cache_write( $file_name, $visits );
	
}



function get_cache( $cache_file, $time = 0 ){
	$file_path = G5_DATA_PATH."/cache/".$cache_file;
	
	if(!G5_USE_CACHE) {			
		if(!file_exists($file_path)) {
            $cache_fwrite = true;
        } else {			
            if( $time > 0) {
                $filetime = filemtime($file_path);
                if($filetime && $filetime < (G5_SERVER_TIME - $time)) {
                    @unlink($file_path);
                    $cache_fwrite = true;									
                }
            }
            if(!$cache_fwrite){
                return $file_path;		
			}
        }
	}
	return $cache_fwrite;
}

	/***************write_cache*************/
	//write_cache(full path directory, the variable name which will hold the array, variable values)
function write_cache($cache_file, $var_name, $content){
	$file_path = G5_DATA_PATH."/cache/".$cache_file;
	$handle = fopen($file_path, 'w');
	$cache_content = "<?php\nif (!defined('_GNUBOARD_')) exit;\n\$".$var_name."=".var_export($content, true)."?>";
	fwrite($handle, $cache_content);
	fclose($handle);	
}
?>
<div id = 'visitor_stats'>
	<div class='inner'>
		<div class='head'><img src='<?=x::url_theme()?>/img/visitors_stats.png'/><div class='title'>방문자 통계</div></div>
		<div id='visitor-content'>
			<table class='sorted-order week' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits['week'][$i]['visit_sum']/$visits['week']['total']*100),2)."%";
					?>					
							<td>
								<div class='bars'>
									<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;">
									
									</div>
								</div>
								<div><?=$visits['week'][$i]['title']?></div>
								<div>(<?=$visits['week'][$i]['visit_sum']?>)</div>								
								<div class='week-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
			<table class='sorted-order month' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits['month'][$i]['visit_sum']/$visits['month']['total']*100),2)."%";
					?>
							<td>
							<div class='bars'>
							<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;"></div>
							</div>							
							<div><?=$visits['month'][$i]['title']?></div>
							<div>(<?=$visits['month'][$i]['visit_sum']?>)</div>
							<div class='month-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
			<table class='sorted-order year' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits['year'][$i]['visit_sum']/$visits['year']['total']*100),2)."%";
					?>
							<td>
								<div class='bars'>
								<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;"></div>	
								</div>								
								<div>Year<br/><?=$visits['year'][$i]['title']?></div>
								<div>(<?=$visits['year'][$i]['visit_sum']?>)</div>
								<div class='year-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
		</div>
		<div class='sort-list'>
			<div class='sort-by' sort='week'>한주</div>
			<div class='sort-by' sort='month'>한달</div>
			<div class='sort-by no-margin' sort='year'> 일년</div>
		</div>
		<div style='clear:both;'></div>
	</div>
</div>
