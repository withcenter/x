<?
$current_date = date('Y-m-d');
$week_now = date('W')-1;
$month_now = date('m');
$year_now = date('Y');

$month_text = date('M');

for( $ctr = 0; $ctr < 4; $ctr ++){
	$visits_week[] = db::rows("SELECT * FROM ".$g5['visit_sum_table']." WHERE WEEK(vs_date) = $week_now");
	$visits_week[$ctr]['week'] = $week_now+1 ;
	$week_now = $week_now - 1;
	if( $visits_week[$ctr] == '') $visits_week[$ctr] = 0;
	if( !isset($visits_week[$ctr][0]['vs_count'] )) $visits_week[$ctr][0]['vs_count']	= 0;
}

for( $ctr = 0; $ctr < 4; $ctr ++){	
	$visits_month[] = db::rows( "SELECT * FROM ".$g5['visit_sum_table']." WHERE MONTH(vs_date) = $month_now");	
	$visits_month[$ctr]['month'] = $month_text ;
	$month_now = $month_now - 1;
	if( $month_now == 0 ) $month_now = 12;
	$month_text = date('M', strtotime("-".($ctr+1)." month", strtotime($current_date)));	
	if( !isset($visits_month[$ctr][0]['vs_count'] )) $visits_month[$ctr][0]['vs_count']	= 0;
}

for( $ctr = 0; $ctr < 4; $ctr ++){	
	$visits_year[] = db::rows( "SELECT * FROM ".$g5['visit_sum_table']." WHERE YEAR(vs_date) = $year_now");	
	$visits_year[$ctr]['year'] = $year_now;
	$year_now = $year_now - 1;
	if( !isset($visits_year[$ctr][0]['vs_count'] )) $visits_year[$ctr][0]['vs_count']	= 0;

}
//di($visits_year);exit;
$count = 0;
foreach( $visits_week as $visits ){
$week_is[] = $visits['week'];
	foreach( $visits as $weekly ){			
			if( isset($weekly['vs_count'] )){
				$visits_this_week[$count] += $weekly['vs_count'];
				$visits_this_week_total += $weekly['vs_count'];
			}
		}
	$count++;
}

$count = 0;
foreach( $visits_month as $visits ){
$month_is[] = $visits['month'];
	foreach( $visits as $monthly ){	
			if( isset($monthly['vs_count'] )){
				$visits_this_month[$count] += $monthly['vs_count'];
				$visits_this_month_total += $monthly['vs_count'];
			}
			
		}
	$count++;
}
$count = 0;
foreach( $visits_year as $visits ){
$year_is[] = $visits['year'];
	foreach( $visits as $yearly ){
			if( isset($yearly['vs_count'] )){
				$visits_this_year[$count] += $yearly['vs_count'];
				$visits_this_year_total += $yearly['vs_count'];
			}
		}
	$count++;
}
//di($week_is);
//di($year_is);
//di($visits_month);
//di($visits_year);
//di( $visits_this_month );
//di( $visits_this_week );
//di( $visits_this_year );

?>
<div id = 'visitor_stats'>
	<div class='inner'>
		<div class='head'><img src='<?=x::url_theme()?>/img/visitors_stats.png'/><div class='title'>VISITOR STATS</div></div>
		<div id='visitor-content'>
			<table class='sorted-order week' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits_this_week[$i]/$visits_this_week_total*100),2)."%";
					?>					
							<td>
								<div class='bars'>
									<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;">
									
									</div>
								</div>
								<div>Week <?=$week_is[$i]?></div>
								<div>(<?=$visits_this_week[$i]?>)</div>								
								<div class='week-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
			<table class='sorted-order month' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits_this_month[$i]/$visits_this_month_total*100),2)."%";
					?>
							<td>
							<div class='bars'>
							<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;"></div>
							</div>							
							<div><?=$month_is[$i]?></div>
							<div>(<?=$visits_this_month[$i]?>)</div>
							<div class='month-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
			<table class='sorted-order year' width='100%' cellpadding=0 cellspacing=0 style="background:url('<?=x::url_theme()?>/img/graph.png'); background-repeat:no-repeat; background-position:0 5px; ">
				<tr valign='top'>
					<?for( $i = 3; $i >= 0; $i-- ){
						$percentage = round(($visits_this_year[$i]/$visits_this_year_total*100),2)."%";
					?>
							<td>
								<div class='bars'>
								<div class='grey-bar' style="background:url('<?=x::url_theme()?>/img/bars.png'); height:<?=$percentage?>;"></div>	
								</div>								
								<div><?=$year_is[$i]?></div>
								<div>(<?=$visits_this_year[$i]?>)</div>
								<div class='year-percent'><?=$percentage?></div>
							</td>
					<?}?>
				</tr>
			</table>
		</div>
		<div class='sort-list'>
			<div class='sort-by' sort='week'>WEEK</div>
			<div class='sort-by' sort='month'>MONTH</div>
			<div class='sort-by no-margin' sort='year'>YEAR</div>
		</div>
		<div style='clear:both;'></div>
	</div>
</div>