<?php

class html {
	/**
	 *  @deprecated. Do not use this function.
	 *  @brief 기존 그누보드의 메뉴를 없애고 새로 작성한다.
	 *  
	 *  @param [in] $html Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details 기존 그누보드에서 <nav id='gnb'> 을 찾아서 패치를 하므로
	 *  HTML 내에 nav id='gnb' 가 존재 해야 한다.
	 */
	static function patch_menu( $html )
	{
	
		return $html;
		/*
		if ( admin_page() ) return $html;
		
		$ds = '<nav id="gnb">';
		$de = '</nav>';
		list ( $a, $b ) = explode( $ds, $html );
		list ( $c, $d ) = explode( $de, $b );
		
		
		ob_start();
		include x::dir() . ds . '/patch/menu.php';
		$menu = ob_get_clean();
		return $a . $ds . $menu . $de . $d;
		*/
	}
}



