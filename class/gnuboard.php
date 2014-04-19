<?php
/**
 *  @file class/gnuboard.php
 *  
 *  @brief 그누보드 관련 라이브러리
 *  
 */
class g extends gnuboard {}
class gnuboard {
	const SELECT_DEFAULT = "idx,domain,bo_table,wr_id,wr_parent,wr_is_comment,wr_comment,ca_name,wr_datetime,wr_hit,wr_good,wr_nogood,wr_name,mb_id,wr_subject";
	const SELECT_DEFAULT_WITH_CONTENT = "idx,domain,bo_table,wr_id,wr_parent,wr_is_comment,wr_comment,ca_name,wr_datetime,wr_hit,wr_good,wr_nogood,wr_name,mb_id,wr_subject,wr_content";
	
	
	/**
	 *  @brief gets installation dir
	 *  
	 *  @return string gnuboard5 installed path
	 *  
	 *  @details this returns the value of G5_PATH
	 *  @note if G5_NEW_PATH is defined, it returns G5_NEW_PATH.
	 *  	You can define G5_NEW_PATH when G5_PATH has wrong value like when it is being installed.
	 *  @code		
			define('G5_NEW_PATH', '..');
			echo 'dir:'.g::dir() ;
	 *  @endcode
	 */
	static function dir()
	{
		if ( defined( 'G5_NEW_PATH' ) ) return G5_NEW_PATH;
		else return G5_PATH;
	}
	
	/**
	 *  @warning must use g::url() instead of G5_URL
	 *  @note G5_URL has a bug. it does not get proper domain based on the web browser's URL addresss.
	 *  @see https://docs.google.com/a/withcenter.com/document/d/1cqG9sghuNGyrSKsZBaV4dmretcA6tb_WfOD1jlyldLk/edit#heading=h.xe27kp8u6rdk
	 */
	static function url()
	{
		$url = G5_URL;
		$pu = parse_url( $url);
		if ( $pu['host'] != etc::domain() ) {
				$url = str_replace( $pu['host'], etc::domain(), $url );
		}
		if ( $url[ count( $url ) -1 ] != '/' ) $url .= '/';
		return $url;
	}

	/** @short returns url of base domain
	 *
	 */
	static function url_base()
	{
		$url = self::url();
		$old = etc::domain();
		$new = 'www.' . etc::base_domain();
		return str_replace($old, $new, $url);
	}
	
	
	/** @short returns the url of skin
	 *
		@code
			$url_icon = g::url_skin('img/icon.png');
		@endcode
			will returns like "http://test6.work.org/g5-5.0b24/x/skin/latest/x-rwd-text-with-thumbnail/img/icon.png"
	 */
	static function url_skin( $path )
	{
		$file = etc::last_included();
		if ( strpos( $file, 'latest' ) ) {
			global $latest_skin_url;
			return $latest_skin_url . '/' . $path;
		}
	}
	
	
	
	/**
	 *	@brief returns the URL of a forum
	 * @code
			<?=g::url_board('qna')?>
	 *	@endcode
	 */
	static function url_board($id=null)
	{
		if ( empty($id) ) $id = $GLOBALS['bo_table'];
		return self::url() . "/bbs/board.php?bo_table=$id";
	}
	static function url_forum($id=null)
	{
		return self::url_board($id);
	}
	static function url_forum_list($id=null)
	{
		return self::url_board($id);
	}
	static function url_write( $id )
	{
		return g::url() . "/bbs/write.php?bo_table=" . $id;
	}
	
	
	
	
	/**
	 *  @brief 메뉴 정보 가져와서 리턴한다.
	 *  
	 *  @return array 메뉴 정보
	 *  
	 *  @details 메인 메뉴는 1 차원, 서브 메뉴는 2차원으로 리턴된다.
	 *  
	 *  @example patch/menu.php
	 */	
	static function get_menu()
	{
		global $g5;
		$sql = " select * from {$g5['group_table']} where gr_show_menu = '1' and gr_device <> 'mobile' order by gr_order ";
		$result = sql_query($sql);
		$rows = array();
		$subs = array();
		for ($gi=0; $row=sql_fetch_array($result); $gi++) { // gi 는 group index
			$rows[$gi] = $row;
			$sql2 = " select * from {$g5['board_table']} where gr_id = '{$row['gr_id']}' and bo_show_menu = '1' and bo_device <> 'mobile' order by bo_order ";
			$result2 = sql_query($sql2);
			for ($bi=0; $row2=sql_fetch_array($result2); $bi++) { // bi 는 board index
				$subs[$gi][$bi] = $row2;
			}	
		}
		return array( $rows, $subs );
	}
	


	/**
	 *  @brief creates a group of forums.
	 *  All the forum of GNUBoard must be in a group which means every forum belongs to a group.
	 *  
	 *  @param [in] $o 연관 배열로
	 *  $o['id'] 그룹 아이디
	 *  $o['subject'] 그룹 제목
	 *  $o['devide'] 모바일 웹으로 보여 줄지 말지를 결정. 기본 값 both
	 *  @return Return_Description
	 *  
	 *  @details 게시판 그룹 생성은 gnuboard5 의 쿼리 부분을 echo 해서 필요한 부분을 추가한 것이다.
	 *  @code
			if ( ! g::group_exist('multisite') ) g::group_create(array('id'=>'multisite', 'subject'=>'multisite'));

	 *  @endcode
	 *  
	 */
	static function group_create( $o )
	{
		global $g5;
		if ( empty($o['device']) ) $o['device'] = 'both';
		$q = "
			insert into {$g5['group_table']}
			set
				gr_id		= '$o[id]',
				gr_subject	= '$o[subject]',
				gr_device	= '$o[device]'
		";
		db::query($q);
	}
	
	/**
	 *  @brief 그룹이 존재하면 참을 리턴한다.
	 *  
	 *  @return boolean
	 *  
	 *  @details 게시판 그룹이 존재하면 참을 리턴한다.
	 
	 *	 @code
			if ( ! g::group_exist('multisite') ) g::group_create(array('id'=>'multisite', 'subject'=>'multisite'));
		  @endcode
	 */
	static function group_exist($id)
	{
		global $g5;
		return db::result( " select count(*) as cnt from {$g5['group_table']} where gr_id = '$id' " );
	}
	
	
	/**
	 *  @brief
	 *  Creates a forum of a group.
	 *  게시판을 생성한다.
	 *  
	 *  @param [in] $o 연관 배열. 게시판 생성을 위한 설정 값을 연관 배열로 입력 받는다.
	 *  $o[id]			게시판 아이디. bo_table 레코드에 저장이 된다.
	 *  $o[group_id]	그룹 아이디. gr_id 에 저장이 된다.
	 *  $o[subject]		게시판 제목. bo_subject 와 bo_mobile_subject 에 저장된다.
	 *  $o[device]		사용할 장치. 기본 값은 both 이다.
	 *  @return 성공 시 거짓. 실패 시 참.
	 *  
	 *  
	 *  @details 
	 *  To create a forum,
	 *  <ol>
	 *  	<li> it must insert forum data into g5_board </li>
	 *  	<li> then, it must create board table </h1>
	 *  </ol>
	 *  게시판 생성은 g5-5.0b17 의 board_form_update.php 에서 SQL Query 를 echo 하여 필요한 부분만 구성한 것이다.
	 *  
	 *  @code
	 *  
		$o = array(
			'id'	=> self::board_id( $domain ),
			'subject'	=> $title,
			'group_id'	=> 'multisite',
		);
		g::board_create($o);
	 *  
	 *  @endcode
	 *  @code
			if ( ! g::group_exist('multisite') ) g::group_create( array('id'=>'multisite', 'subject'=>'multisite') );
			if ( ! g::forum_exist( 'default' ) ) g::board_create( array('id'=>'default', 'subject'=>'Default Forum', 'group_id'=>'multisite') );
	 *  @endcode
	 */
	static function board_create( $o )
	{
		if ( empty($o['device']) ) $o['device'] = 'both';
		global $g5;
		
		if ( !$bo_skin = $o['bo_skin'] ) $bo_skin = 'x/skin/board/multi';
		
		$q = "
			insert into {$g5['board_table']}
			set
				bo_table = '$o[id]',
				bo_count_write = '0',
				bo_count_comment = '0',
				gr_id = '$o[group_id]',
				bo_subject = '$o[subject]',
				bo_mobile_subject = '$o[subject]',
				bo_device = 'both',
				bo_admin = '$o[bo_admin]',
				bo_list_level = '1',
				bo_read_level = '1',
				bo_write_level = '1',
				bo_reply_level = '1',
				bo_comment_level = '1',
				bo_html_level = '1',
				bo_link_level = '1',
				bo_count_modify = '1',
				bo_count_delete = '1',
				bo_upload_level = '1',
				bo_download_level = '1',
				bo_read_point = '0',
				bo_write_point = '0',
				bo_comment_point = '0',
				bo_download_point = '0',
				bo_use_category = '',
				bo_category_list = '',
				bo_use_sideview = '',
				bo_use_file_content = '',
				bo_use_secret = '0',
				bo_use_dhtml_editor = '$o[bo_use_dhtml_editor]',
				bo_use_rss_view = '',
				bo_use_good = '',
				bo_use_nogood = '',
				bo_use_name = '',
				bo_use_signature = '',
				bo_use_ip_view = '',
				bo_use_list_view = '$o[bo_use_list_view]',
				bo_use_list_file = '',
				bo_use_list_content = '',
				bo_use_email = '',
				bo_use_cert = '',
				bo_use_sns = '',
				bo_table_width = '100',
				bo_subject_len = '60',
				bo_mobile_subject_len = '30',
				bo_page_rows = '15',
				bo_mobile_page_rows = '15',
				bo_new = '24',
				bo_hot = '100',
				bo_image_width = '600',
				bo_skin = '$bo_skin',
				bo_mobile_skin = 'basic',
				bo_include_head = '_head.php',
				bo_include_tail = '_tail.php',
				bo_content_head = '',
				bo_content_tail = '',
				bo_mobile_content_head = '',
				bo_mobile_content_tail = '',
				bo_insert_content = '',
				bo_gallery_cols = '4',
				bo_gallery_width = '174',
				bo_gallery_height = '124',
				bo_mobile_gallery_width = '125',
				bo_mobile_gallery_height= '100',
				bo_upload_count = '2',
				bo_upload_size = '1048576',
				bo_reply_order = '1',
				bo_use_search = '1', bo_order = '',
				bo_write_min = '',
				bo_write_max = '',
				bo_comment_min = '',
				bo_comment_max = '',
				bo_sort_field = '',
				bo_1_subj = '',
				bo_2_subj = '',
				bo_3_subj = '',
				bo_4_subj = '',
				bo_5_subj = '',
				bo_6_subj = '',
				bo_7_subj = '',
				bo_8_subj = '',
				bo_9_subj = '',
				bo_10_subj = '',
				bo_1 = '',
				bo_2 = '',
				bo_3 = '',
				bo_4 = '',
				bo_5 = '',
				bo_6 = '',
				bo_7 = '',
				bo_8 = '',
				bo_9 = '',
				bo_10 = '' 
		";
		db::query($q);
		
		
		
		/// create board table
		$file = file( self::dir() . '/adm/sql_write.sql');
		$sql = implode($file, "\n");
		$create_table = $g5['write_prefix'] . $o['id'];
		$source = array('/__TABLE_NAME__/', '/;/');
		$target = array($create_table, '');
		$sql = preg_replace($source, $target, $sql);
		db::query($sql, FALSE);
	}
	
	
	/**
	 *  @brief Uploads ( write or record ) a new post into a forum programtically.
	 *  
	 *  @param [in] $o options to post
	 * $o['domain']				is the domain of the site to save data into x_post_data. if it is empty, it uses from etc::domain()
	 *  $o['bo_table']				is the board table name ( board_id )
	 *  $o['wr_subject']			is the subject of the post.
	 *  $o['ca_name']
	 *  $o['wr_option']
	 *  $o['wr_content']
	 *  $o['wr_link1']
	 *  $o['wr_link2']
	 *  $o['mb_id']					user id
	 *  $o['wr_name']
	 *  $o['wr_email']
	 *  $o['wr_homepage']
	 *  $o['wr_datetime']			the date of update. if empty, then set to the current time.
	 *  $o['wr_file']				is the file information
	 *  $o['wr_1'] ~ 2,3,4,5,6,7,8,9	is the extra fields.
	 *  $o['file_1'] ~ 2, 3, 4, 5	is the path of files to be uploaded.
	 *  
	 *  $o['html']					can have 'html1' or 'html2'
	 *  
	 *  @return wr_id of the post
	 *  
	 *  
	 *  @details Normally posts are posted through web browsers.
	 *  With this function you can post articles programatically.
	 *  
	 *  @note you can upload files along with the text.
	 *  
	 *  @code uploading a post with image
	 *  	g::write(
	 *  		array(
	 *  			'bo_table'		=> "qna",
	 *  			'wr_subject'	=> "This is a sample post upload ... 1",
	 *  			'wr_content'	=> "This is the content",
	 *  			'file_1'		=> "C:\\tmp\\abc.jpg"
	 *  		)
	 *  	)
	 *  @endcode
	 *  @note it does not put record in board_new_table.
	 *  @note it does not increase write-point of the member.
	 *  @note it does not check the permission off the member id.
	 *  
	 *  
	 *  @code
	 *  while (@ob_end_flush());
	for ( $i=0; $i < 10000; $i ++ ) {
		$wr_id = g::write(
			array(
				'mb_id'			=> "test12",
				'mb_name'		=> "My Name",
				'mb_email'		=> "my@email.com",
				'ca_name'		=> 'ABC - CATEGORY',
				'bo_table'		=> "ms_test12_1",
				'wr_subject'	=> "Art.: $i - This is a sample post upload ... 1",
				'wr_content'	=> "Content: $i<hr>This is the content<br><h1>Hello there...</h1>How are you?<br>\n\r\nTTTTT\t....How are you?<br>Later..",
				'wr_link_1'		=> "http://philgo.com",
				'wr_link_2'		=> "http://google.com",
				'wr_homepage'	=> "http://jaehosong.com",
				'file_1'		=> "C:\\tmp\\abc.jpg",
				'file_2'		=> "C:\\tmp\\abc.jpg",
				'file_3'		=> "C:\\tmp\\abc.jpg",
				'html'			=> 'html2',
				)
		);
		echo "$wr_id, ";
		flush();
	}
	 *	@endcode
	
	 *  
	 */
	static function write( $o )
	{
		global $g5;
		$mb_id			= $o['mb_id'];
		$wr_name		= $o['mb_name'];
		$wr_email		= $o['mb_email'];
		$wr_subject		= $o['wr_subject'];
		$wr_content		= $o['wr_content'];
		$wr_link1		= $o['wr_link1'];
		$wr_link2		= $o['wr_link2'];
		$wr_homepage	= $o['wr_homepage'];
		$html			= $o['html'];
		$ca_name		=	$o['ca_name'];
		$secret			= $o['secret'];
		
		if ( $o['wr_1'] ) $wr_1 = $o['wr_1'];
		if ( $o['wr_2'] ) $wr_2 = $o['wr_2'];
		if ( $o['wr_3'] ) $wr_3 = $o['wr_3'];
		if ( $o['wr_4'] ) $wr_4 = $o['wr_4'];
		if ( $o['wr_5'] ) $wr_5 = $o['wr_5'];
		if ( $o['wr_6'] ) $wr_6 = $o['wr_6'];
		if ( $o['wr_7'] ) $wr_7 = $o['wr_7'];
		
		$write_table	= g::write_table( $o['bo_table'] );
		$wr_num			= get_next_num($write_table);
		
		
		$sql = " insert into $write_table
                set wr_num = '$wr_num',
                     wr_reply = '$wr_reply',
                     wr_comment = 0,
                     ca_name = '$ca_name',
                     wr_option = '$html,$secret',
                     wr_subject = '$wr_subject',
                     wr_content = '$wr_content',
                     wr_link1 = '$wr_link1',
                     wr_link2 = '$wr_link2',
                     wr_link1_hit = 0,
                     wr_link2_hit = 0,
                     wr_hit = 0,
                     wr_good = 0,
                     wr_nogood = 0,
                     mb_id = '$mb_id',
                     wr_password = '$wr_password',
                     wr_name = '$wr_name',
                     wr_email = '$wr_email',
                     wr_homepage = '$wr_homepage',
                     wr_datetime = '".G5_TIME_YMDHIS."',
                     wr_last = '".G5_TIME_YMDHIS."',
                     wr_ip = '{$_SERVER['REMOTE_ADDR']}',
                     wr_1 = '$wr_1',
                     wr_2 = '$wr_2',
                     wr_3 = '$wr_3',
                     wr_4 = '$wr_4',
                     wr_5 = '$wr_5',
                     wr_6 = '$wr_6',
                     wr_7 = '$wr_7',
                     wr_8 = '$wr_8',
                     wr_9 = '$wr_9',
                     wr_10 = '$wr_10' ";

		db::query($sql);
		$wr_id = db::insert_id();
		
		if ( empty($o['domain']) ) $o['domain'] = etc::domain();
		$p = array(
			'domain'					=> $o['domain'],
			'bo_table'					=> $o['bo_table'],
			'wr_id'						=> $wr_id,
			'wr_parent'				=> $wr_id,
			'wr_option'				=> "$html,$secret",
			'ca_name'				=> $ca_name,
			'wr_subject'				=> $wr_subject,
			'wr_content'				=> $wr_content,
			'mb_id'						=> $mb_id,
			'wr_name'				=> $wr_name,
			'wr_datetime'			=> G5_TIME_YMDHIS
		);
		x::post_data_insert( $p );
		
		
		
		$count = self::count_write( $o['bo_table'] );
		
		
		db::update( $g5['board_table'], array('bo_count_write' => $count + 1), array('bo_table'=>$o['bo_table']) );
		
		
		
		$re = self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_1'] ) );
		print_r($re);
		self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_2'] ) );
		self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_3'] ) );
		
		
		
		
	
		
		//
		return $wr_id;
	}
		/**
	 *  @brief returns the number of post.
	 *  
	 *  @param [in] $bo_table bo_table
	 *  
	 *  @param [in] $type string. default 'parent'.
	 *  if it is null, then it count all the record(parent & comemnt) of the forums.
	 *  if it is 'parent', then it only count the parent post.
	 *  if it is passed as 'comment', it only count 'comment'.
	 *  @return int
	 *  
	 *  @details use this function to count posts or comemnt.
	 */
	static function count_write($bo_table, $type='parent')
	{
		$cfg = self::config( $bo_table );
		if ( $type == 'parent' ) return $cfg['bo_count_write'];
		else if ( $type == 'comment' ) return $cfg['bo_count_comment'];
		else return $cfg['bo_count_write'] + $cfg['bo_count_comment'];
	
		/** @deprecated
			$q = "SELECT COUNT(*) FROM $write_table WHERE wr_parent=0";
			return db::result( $q );
		*/
	}
	
	/** @short alias of count_write() */
	static function count_post($bo_table, $type='parent')
	{
		return self::count_write( $bo_table, $type );
	}
	
	/**
	 *  @brief attach(upload) or update a file to/for a post.
	 *  
	 *  @param [in] 
	 
	$o = array();
	$o['bo_table']			= $input['blogid'];
	$o['wr_id']				= 0;
	$o['path']				= $path;
	$o['bf_content']		= $input['id'];
	$o['filename']			= $filename;
	$url = g::write_file( $o );
	
	 *  @return 0 if no file. otherwise int but non-zero.
	 *  returns string if successful.
	 *  
	 *  @details 
	 *  upload( or attach ) a file programatically.
	 *  @warning
	 *  	bf_no will be increase by 1 every time a file is attached.
	 *	@code
		
		self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_1'] ) );
		self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_2'] ) );
		self::write_file( array( 'bo_table'=>$o['bo_table'], 'wr_id'=>$wr_id, 'path'=>$o['file_3'] ) );
		
	@endcode
	 * @warning it will cause error(warning) if the data folder does not exist. remember G5 only create data folder when a file is first uploaded.
	 */
	static function write_file( $o )
	{
		global $g5;
		
		
		$bo_table			= $o['bo_table'];
		$wr_id				= $o['wr_id'];
		$path				= $o['path'];
		$bf_content			= $o['bf_content'];
		$filename			= $o['filename'];
		
		
		if ( empty($path) ) return 0;
		if ( !file_exists($path) ) return -1;
		$size = filesize($path);
		if ( empty($filename) ) {
			$pi = pathinfo($path);
			$filename = $pi['basename'];
		}
		$filename  = preg_replace('/(<|>|=)/', '', $filename);
		
		$chars_array = array_merge(range(0,9), range('a','z'), range('A','Z'));
		shuffle($chars_array);
        $shuffle = implode('', $chars_array);
		$file = date('ymdHi').'_' . substr($shuffle,0,8) . '_' . str_replace('%', '', urlencode(str_replace(' ', '_', $filename)) );
		
		$path_dir = G5_DATA_PATH.'/file/'.$bo_table;
		if ( ! is_dir( $path_dir ) ) {
			mkdir( $path_dir, 0777, true );
		}
		$dest_file = $path_dir .'/'.$file;
		//dlog("Copy: $path to $dest_file");
		copy( $path, $dest_file );
		
		chmod($dest_file, G5_FILE_PERMISSION);
		
		
		// link from write_table to board_file
		
		$cnt = db::result("SELECT count(*) FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}'");
		if ( $cnt ) {
			$bf_no = db::result("SELECT max(bf_no) FROM {$g5['board_file_table']} WHERE bo_table = '{$bo_table}' AND wr_id = '{$wr_id}'");
			$bf_no ++;
		}
		else $bf_no = 0;
		
		
		$timg = @getimagesize($path);
		
		        $sql = " insert into {$g5['board_file_table']}
                    set bo_table = '{$bo_table}',
                         wr_id = '{$wr_id}',
                         bf_no = '{$bf_no}',
                         bf_source = '{$pi['basename']}',
                         bf_file = '$file',
                         bf_content = '$bf_content',
                         bf_download = 0,
                         bf_filesize = '$size',
                         bf_width = '{$timg['0']}',
                         bf_height = '{$timg['1']}',
                         bf_type = '{$timg['2']}',
                         bf_datetime = '".G5_TIME_YMDHIS."' ";
        db::query($sql);
		
		
		self::board_file_update_count( $bo_table, $wr_id );
		return self::url_file( $bo_table, $file );
	}
	
	/** @short updates the number of file for that post
	 *
	 */
	static function board_file_update_count( $bo_table, $wr_id )
	{
		// update the number of file for the post.
		$board_file_table = self::board_file_table();
		$write_table	= g::write_table( $bo_table );
		//dlog("write_table: $write_table");
		$cnt = db::result(" select count(*) as cnt from $board_file_table where bo_table = '$bo_table' and wr_id = '$wr_id' ");
		db::query(" update {$write_table} set wr_file = '{$cnt}' where wr_id = '{$wr_id}' ");
	}
	static function board_config_table()
	{
		global $g5;
		return $g5['board_table'];
	}
	static function board_file_table()
	{
		global $g5;
		return $g5['board_file_table'];
	}
	
	/** @short returns the URL of the uploaded file.
	 *
	 *
	 */
	static function url_file($bo_table, $file )
	{
		return G5_DATA_URL.'/file/'.$bo_table.'/'.urlencode($file);
	}
	
	
	
	/**
	 *  @brief updates fields of a post ( in a forum table )
	 *  
	 *  @param [in] $o option
	 *  @return none
	 *  
	 *  @details use this function to update some fields of the post.
	 *  @code
	 *  g::update(
			array(
				'bo_table'	=> $bo_table,
				'wr_id'		=> $wr_id,
				'wr_10'		=> $blog_no
			)
		);
		
		@endcode
	 */
	static function update( $o )
	{
		$write_table = self::table_name($o['bo_table']);
		
		$fd = array();
		if ( isset($o['wr_subject']) ) $fd[] = "wr_subject = '$o[wr_subject]'";
		if ( isset($o['wr_content']) ) $fd[] = "wr_content = '$o[wr_content]'";
		if ( isset($o['wr_last']) ) $fd[] = "wr_last = '" . G5_TIME_YMDHIS."'";
		if ( isset($o['wr_ip']) ) $fd[] = "wr_ip = '{$_SERVER['REMOTE_ADDR']}'";
		
		for ( $i=1; $i<=10; $i++ ) {
			if ( isset($o["wr_$i"]) ) {
				$v = $o["wr_$i"];
				$fd[] = "wr_$i = '$v'";
			}
		}
		
		
		$fds = implode(',', $fd);
		
		$sql = " update $write_table
					set $fds
					where wr_id=$o[wr_id]
				";
				
		db::query($sql);
	}
	
	
	
	/**
	 *  @brief updates a field of a bo_table configuration - g5_board.
	 *  
	 *  @param [in] $bo_table forum id
	 *  @param [in] $field field of the forum configuration table.
	 *  @param [in] $value value of the field.
	 *  @return none
	 *  
	 *  @details use this function to update board configuration
	 *  
	 *  @code
	 *  	g::update_config( $bo_table, 'bo_1_subj', $list_style );
	 *  @endcode
	 *  
	 */
	static function update_config( $bo_table, $field, $value )
	{
		global $g5;
		db::update( $g5['board_table'], array($field=>$value), array('bo_table' => $bo_table ) );
	}
	
	
	
	
	
	/**@short updates x_post_data table
	 *
	 */
	static function post_data_update($bo_table, $wr_id, $field, $value, $raw=false)
	{
		if ( $raw == false ) $value = "'$value'";
		db::query("
			UPDATE x_post_data
				SET
					`$field`=$value
			WHERE
				bo_table='$bo_table'
				AND
				wr_id='$wr_id'
		");
	}
	
	
	/**
	 *  @brief Brief
	 *  
	 *  @param [in] $id Parameter_Description
	 *  @return 
	 *  
	 *  @details 
	 */
	static function config($id)
	{
		global $g5;
		return db::row("SELECT * FROM $g5[board_table] WHERE bo_table = '$id'");
	}
	

	/** @short returns forum table name
	 *
	 *
	 */
	static function write_table($bo_table)
	{
		global $g5;
		return $g5['write_prefix'] . $bo_table;
	}
	
	/**
	 *  @brief returns write_table name
	 *  
	 *  @param [in] $bo_table Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details Details
	 *  @code
	 *  	g::table_name( $extra['menu_1'] );
	 *  @endcode
	 */
	static function table_name($bo_table)
	{
		return self::write_table($bo_table);
	}
	
	
	/** @short return the bo_table of n'th menu
	 *
	 * @warning Must use this function to get board_table name.
	 *
	 * @note bo_table() returns fourm id, while table_name() returns write_table name.
	 * @param [in] $n nth menu
		@note if $n is 0, then it only returns the bo_table itself.
			ex)
				bo_table(0, 'abc.def.kr'); // may return "ms_abc"
				while
				bo_table(1, 'abc.def.kr'); // may return "ms_abc_1"
				
				
	 * @param [in] $domain is the domain of the site.
	 *
	 * @return string bo_table
	 *
	 * @code
			bo_table(1);
	 * @endcode
	 *
	 * @warning if 'basedomain' is accessed, then it assumes that the site is accessed with "www."
	 */
	static function bo_table($n, $domain=null)
	{
		if ( empty($domain) ) {
			$domain = etc::domain();
		}
		
		$bo_table = "ms_" . etc::last_domain( $domain );
		$bo_table = str_replace('-', '_', $bo_table);					/// @bufix : table name cannot have '-'
		if ( $n ) $bo_table .= '_'.$n;
		return $bo_table;
	}
	
	
	
	
	
	
	/** @short returns member information
	 *
	 */
	static function member($mb_id)
	{
		return get_member($mb_id);
	}
	
	
	
	/** @short returns gnuboard password from plain text input
	 *
	 * @code
			if ( g::password($input['password']) != $user["mb_password"] ) response_faultCode(-1, "Password does not match. UserID :$user[mb_id]");
		@endcode
		
	 */
	static function password( $word )
	{
		return db::result(" select password('$word')");
	}
	
	
	

	/** @short returns forum information
	 *
	 * @code
		di ( g::board_config() );
		di ( g::board_config( array('order by' => 'bo_subject ASC') ) );
		@endcode
	 */
	static function board_config( $o = array() )
	{
		global $g5;
		$order_by = null;
		if ( $o['order by'] ) $order_by = "ORDER BY " . $o['order by'];
		return db::rows("SELECT bo_table,bo_subject FROM $g5[board_table] $order_by");
	}
	
	
	/**
	 *  @brief returns a row of bo_table ( forum )
	 *  
	 *  @param [in] $bo_table table name
	 *  @param [in] $wr_id post no
	 *  @return an assoc row of the field.
	 *  
	 *  @details use this function to get the fields of a post.
	 */
	static function post( $bo_table, $wr_id )
	{
		$bo_table = self::table_name( $bo_table );
		return db::row("SELECT * FROM $bo_table WHERE wr_id=$wr_id");
	}
	static function get( $bo_table, $wr_id )
	{
		return self::post($bo_table, $wr_id);
	}
	
	static function post_url( $bo_table, $wr_id )
	{
		return g::url() . "/bbs/board.php?bo_table=$bo_table&wr_id=$wr_id";
	}
	
	

	
	/**
	 *  @brief return true if the forum exists.
	 *  
	 *  @param [in] $bo_table forum id
	 *  @return boolean
	 *  
	 *  @details use this function to check if the board(forum) exists or not.
	 */
	static function forum_exist($bo_table)
	{
		return db::table_exist( self::table_name($bo_table) );
	}
	
	/**
	 *  @brief Brief
	 *  
	 *  @param [in] $html Parameter_Description
	 *  @param [in] $bo_table Parameter_Description
	 *  @param [in] $width Parameter_Description
	 *  @param [in] $height Parameter_Description
	 *  @return Return_Description
	 *  
	 *  @details Details
	 *  
	 *  @code for blog board theme
	 *  	 $thumb = get_list_thumbnail($forum, $row['wr_id'], 450, 350);
	 *  	 if ( empty($thumb['src']) )  $thumb['src'] = g::thumbnail_from_image_tag( $row['wr_content'], $forum, 450, 350 );
	 *  @endcode
	 *  @code for a board skin.
	 *  	$thumb = get_list_thumbnail($board['bo_table'], $list[$i]['wr_id'], $board['bo_gallery_width'], $board['bo_gallery_height']);
	 *  	 if ( empty($thumb['src']) ) $thumb['src'] = g::thumbnail_from_image_tag( $list[$i]['wr_content'], $bo_table, $board['bo_gallery_width'], $board['bo_gallery_height'] );
	 *  @endcode
	 *  @todo once it has thumbnail image, then do not repeat creating thumbnail.
	 */
	static function thumbnail_from_image_tag( $html, $bo_table, $width=200, $height=200 )
	{
		if ( empty($html) ) return null;
		$image = get_editor_image($html);
		if ( empty( $image[1][0] ) ) return null;
		
		preg_match( "/http([^'\" ]*)/", $image[1][0], $ms );
		$file = $ms[0];
		
		if ( empty($file) ) return null;
		
		require_once x::dir() . '/etc/phpthumb/ThumbLib.inc.php';
		
		$output_filename = "thumb-" . basename($file).'_thumbnail_x'.$width.'_h'.$height . '.png';
		$dest_file = G5_DATA_PATH . '/file/' . $bo_table . '/' . $output_filename;
		// dlog("---------------------------------------- desg_file : $dest_file");
		if( ! file_exists( $dest_file ) ) {
			dlog("---------------------------------------- desg_file does not exist. : creating $dest_file");
			$phpThumb = PhpThumbFactory::create( $file );
			$phpThumb->adaptiveResize($width, $height);		
			$phpThumb->save($dest_file, 'png');
		}
		else {
			// dlog("---------------------------------------- desg_file Exist. NO CREATE: returning the url $dest_file");
		}
		return G5_DATA_URL . '/file/' . $bo_table . '/' . $output_filename;
	}
	
	
	
	
	/** @short returns the number of new (un-read) memo
	 *
	 *
	 */
	static function memo_count_new()
	{
		global $g5, $member, $is_member;

	    if ($is_member) {
			$sql = " select count(*) as cnt from {$g5['memo_table']} where me_recv_mb_id = '{$member['mb_id']}' and me_read_datetime = '0000-00-00 00:00:00' ";
			$row = sql_fetch($sql);
			return $row['cnt'];
		}
	}
	
	/** @short returns posts
	 *
	 *
	 * @param $option mixed
			if it's a string then, it is bo_table.
			or it is an array for options.
				when it is passed as array, you can ommit bo_table.
	 *
	 *
	 
	 * @param $option['limit'] limits the number of results.
			examples of value
				5
				0,9
				10,20
	 * @param $option['select'] holds fields to extract.
			The default is all the fields except 'wr_content']
		
	 * @param $option['extra'] will be added in the SQL condition.
		'extra' can be any of the SQL condition form.
		ex) 'bo_table'='abc' OR ( 'bo_table'='def' AND 'bo_subject'='opq' )
		
			
		
	 *
	 * @code normal usage
			$rows = g::posts( $bo_table );
			$rows = g::posts( array( 'domain'=>etc::domain(), 'limit'=>15) );
	 * @endcode
	 * @code LATEST POST Without Scret
				$posts = g::posts(
					array(
						'domain'				=> etc::domain(),
						'wr_option'			=> array( "NOT LIKE '%secret%'" ),
						'limit'					=> 3,
					)
				);
	 * @endcode
	 * @code Latest post ORDER BY wr_hit		
					$posts = g::posts(
						array(
							'domain'				=> etc::domain(),
							//'bo_table'				=> 'qna',
							//'wr_is_comment'	=> 0,
							'wr_datetime'=> '>=' . g::datetime( time() - ONEDAY * 7),
							'order by'=>'wr_hit DESC',
							'limit'=>5
						)
					);
	 @endcod
	 
	 
	 
	 * @code
			if ( g::forum_exist( $id ) ) {
				$posts = g::posts( array( 'bo_table' => $id, 'limit'=>5 ) );
			}
	 *  @endcode
	 *  
	 *  @code how to use LIKE
	 *  		'wr_option'			=> array( "LIKE '%secret%'" ),
	 *			or
	 *			'extra'					=> "'wr_option' LIKE '%secret%'",
	 *  @endcode
	 *
	 * @code How to get posts from multiple forums.
					$ids = array();
					for ( $i=1; $i<=5; $i++ ) {
						if ( empty($widget_config["forum$i"]) ) continue;
						$ids[] = "bo_table='".$widget_config["forum$i"]."'";
					}
					if ( $ids ) {
						$extra = "(" . implode( " OR ", $ids ) . ")";
					}
					$posts = x::posts(
						array(
							'extra'			=> $extra
						)
					);
	 * @endcode
	 * 
	 *
	 *  @note see sql::cond to know how to use Expression
	 *  @return array. the return value is the same as that of latest.lib.php
	 */
	static function posts( $option, $return_sql = false )
	{
		global $g5;
		
		$o			= array();
		$cond		= array();
		
		
		if ( is_array( $option ) ) $o = $option;
		else $o['bo_table'] = $option;
		
		db::option( $o );
		if ( $o['domain'] ) $cond[] = db::cond('domain');
		if ( $o['bo_table'] ) $cond[] = db::cond('bo_table');
		if ( $o['wr_datetime'] ) $cond[] = db::cond('wr_datetime');
		if ( ! isset( $o['wr_is_comment']  ) ) $cond[] = "wr_is_comment=0";
		else $cond[] = db::cond('wr_is_comment');
		
		
		if ( $o['wr_option'] ) $cond[] = db::cond('wr_option');
		
		if ( $o['wr_link1'] ) $cond[] = db::cond('wr_link1');
		if ( $o['wr_link2'] ) $cond[] = db::cond('wr_link2');
		
		if ( $o['extra'] ) $cond[] = $o['extra'];
		
		if ( $cond ) $where = "WHERE " . implode( ' AND ', $cond );
		else $where = null;
		
		
		if ( empty($o['select']) ) $o['select'] = self::SELECT_DEFAULT;
		
		
		if ( isset( $o['order by'] ) ) $order_by = $o['order by'];
		else $order_by = "wr_datetime DESC";
		
		if ( ! empty( $o['limit'] ) ) $limit = "$o[limit]";
		else $limit = "0,10";
		
		
		
		
		
		$sql = "
			SELECT $o[select]
			FROM x_post_data
			$where
			ORDER BY $order_by
			LIMIT $limit
		";
		if ( $return_sql ) return $sql;
		$rows = db::rows( $sql );
		return self::pre($rows);
	}
	
	
	static function pre($rows)
	{
		$posts = array();
		foreach( $rows as $row ) {
			$post = $row;
			$post['subject']	= &$post['wr_subject'];
			$post['content']	= &$post['wr_content'];
			$post['url']			= site_url($row['domain']) . "/bbs/board.php?bo_table=" . $row['bo_table'] . "&wr_id=".$row['wr_id'];
			$posts[] = $post;
		}
		return $posts;
	}
	
	
	
	static function posts_old( $o )
	{
		$bo_table = self::table_name( $o['bo_table'] );
		
		$cond = array();
		if ( $o['mb_id'] ) $cond['mb_id'] = $o['mb_id'];
		
		$q_where = null;
		if ( $cond ) {
			$q_where = implode(" AND ", $cond );
		}
		
		if ( $o['limit'] ) $limit = "LIMIT $o[limit]";
		else $limit = "LIMIT 10";
		
		
		if ( $o['order by'] ) $order_by = "ORDER BY " . $o['order by'];
		else $order_by = "ORDER BY wr_id DESC";
		
		$rows = db::rows("SELECT * FROM $bo_table $q_where $order_by $limit");
		
		return $rows;
	}
	
	
	
	/** @short updates member field
	 *
	 */
	static function update_member( $id, $field, $value )
	{
		global $g5;
		$q = "UPDATE {$g5['member_table']} SET $field='$value' WHERE mb_id='$id'";
		db::query( $q );
	}
	
	/**
		* @brief returns the member count per each domain.
		* Use this function when you need to know how many members are in each domain.
		*
		*/
	static function member_count_by_domain()
	{
		global $g5;
		$q = "SELECT ".REGISTERED_DOMAIN.",count(*) as cnt FROM $g5[member_table] GROUP BY ".REGISTERED_DOMAIN." ORDER BY cnt DESC";
		return db::rows( $q );
	}
	
	
	/** @short returns gnuboard5 datetime format
	 *
	 */
	static function datetime($stamp=null) {
		if ( empty($stamp) ) $stamp = time();
		return date('Y-m-d H:i:s', $stamp);
	}
	
	
	
	static function post_thumbnail($bo_table, $wr_id, $thumb_width, $thumb_height, $is_create=false, $is_crop=true, $crop_mode='center', $is_sharpen=true, $um_value='80/0.5/3')
	{
		if ( db::table_exist( self::table_name( $bo_table ) ) ) 
			return get_list_thumbnail($bo_table, $wr_id, $thumb_width, $thumb_height, $is_creat, $is_crop, $crop_mode, $is_sharpen, $um_value);
		else
			return array();
	}
	
	static function visit()
	{
		global $config;
		preg_match("/오늘:(.*),어제:(.*),최대:(.*),전체:(.*)/", $config['cf_visit'], $visit);
		return $visit;
	}
	
	
} // eo class

