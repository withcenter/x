<?php
/**
 *  @file head-main-menu.php
 *  @short 상단의 메인페이지에 출력할 메뉴 패치
 */

	if ( ms::main_site() ) include patch('head-main-site-menu');
	else include  patch('head-sub-site-menu');
	