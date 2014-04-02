<?php
	$id = "exchange_rate";
	$expire_time = 60 * 12; //minutes
	
	$currency = etc::cache_read( $id, $expire_time);
	
	if( !isset( $currency ) ){
		$url = "http://info.finance.naver.com/marketindex/exchangeList.nhn";
		$html = file_get_contents( $url );
		$html = strip_tags($html);
		$html = trim($html);

		$currecy = array();
		// 페소 환율 //
		$php_pos = strpos( $html, 'PHP' );
		$php_tmp = substr($html, $php_pos+3, 90 );
		$php_tmp2 = explode("\r\n", $php_tmp);
		$currency['php']['country'] = "<img src ='".x::url_theme()."/img/ph-flag.png'/>".'PHP';
		foreach ( $php_tmp2 as $p ) {
			 $p = trim($p);
			 if ( $p ) $currency['php'][] = $p;
		}

		// USD 환율 //
		$usd_pos = strpos($html, 'USD' );
		$usd_tmp = substr($html, $usd_pos+3, 100 );
		$usd_tmp2 = explode("\r\n", $usd_tmp);
		$currency['usd']['country'] = "<img src ='".x::url_theme()."/img/us-flag.png'/>".'USD';
		foreach ( $usd_tmp2 as $u ) {
			 $u = trim($u);
			 $u = str_replace(',', '', $u );
			 if ( $u ) $currency['usd'][] = round($u);
		}
		
		// THB //
		$thb_pos = strpos($html, 'THB' );
		$thb_tmp = substr($html, $thb_pos+3, 100 );
		$thb_tmp2 = explode("\r\n", $thb_tmp);
		$currency['thb']['country'] = "<img src ='".x::url_theme()."/img/th-flag.png'/>".'THB';
		foreach ( $thb_tmp2 as $u ) {
			 $u = trim($u);
			 $u = str_replace(',', '', $u );
			 if ( $u ) $currency['thb'][] = $u;
		}
				
		$currency['last_update'] = time();
		etc::cache_write( $id, $currency );
	}	
?>
<div class='exchange-info'>
<table cellspacing=0 cellpadding=0 width='100%'>
	<tr class='header-title'>
		<td>국가</td><td align='right'>기준</td><td align='right'>살때</td><td align='right'>팔때</td>
	</tr>
	<?
		$count = 0;
		foreach( $currency as $curr_by_country => $curr_values ){
			if ( $count == 3 ) break;
		?>
		<tr valign='top'>
			<td><?echo $curr_values['country'];?></td>
			<?for( $i = 0; $i < 3; $i++ ){?>
			<td align='right'><?=$curr_values[$i]?></td>
			<?}?>
		</tr>
		<?
			$count++;
			}
		?>
	<tr valign='top'>
		<td colspan=4 align='right'>
			<span class='exchange-date'><span class='bottom-title'>환율 업데이트</span> <span><?=date('Y-m-d H:i', $currency['last_update'])?></span><div style="clear:both"></div></span>
		</td>
	</tr>
</table>
</div>