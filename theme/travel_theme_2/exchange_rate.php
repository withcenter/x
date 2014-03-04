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
			 if ( $u ) $currency['usd'][] = $u;
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
				
		$currency['last_update'] = date("M d Y H:i A");
		etc::cache_write( $id, $currency );
	}	
?>
<table cellspacing=0 cellpadding=0 width='100%'>
	<td>CURRENCY</td><td>BUYING</td><td>SELLING</td>
	<?
		$count = 0;
		foreach( $currency as $curr_by_country => $curr_values ){
		if( $count == 3 ) break;
		?>
		<tr valign='top'>
			<td><?echo $curr_values['country'];?></td>
			<?for( $i = 1; $i < 3; $i++ ){?>
			<td><?=$curr_values[$i]?></td>
			<?}?>
		</tr>
		<?
			$count++;
			}
		?>		
</table>
<div class='last-update'>Last Update: <?=$currency['last_update']?></div>