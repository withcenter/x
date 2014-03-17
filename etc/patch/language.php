<?php
	/** @short no more language patch is done here.
	 *  
	 */
return;

/**
 *  @note
 *  <ol>
 *  	<li> Search string to patch.</li>
 *  	<li> Write patch code in this script.</li>
 *  	<li> Patch language</li>
 *  	<li> Edit language-pack file</li>
 *  	<li> Check in web browser</li>
 *  </ol>
 */
	$language_code = null;

	patch_language( g::dir() . '/bbs/member_confirm.php',
		array(
			"'회원 비밀번호 확인'"		=> "_l('Password Confirm')",
		)
	);
	
	
	patch_language( g::dir() . '/skin/member/basic/member_confirm.skin.php',
		array(
			"비밀번호를 한번 더 입력해주세요."		=> "<?php echo _l('Password Confirm Input Password Again');?>",
			"회원님의 정보를 안전하게 보호하기 위해 비밀번호를 한번 더 확인합니다."		=> "<?php echo _l('Password Confirm Input Password Again Desc');?>",
			"비밀번호를 입력하시면 회원탈퇴가 완료됩니다."	=> "<?php echo _l('Password Confirm Input Password Again For Leave');?>",
			"회원아이디"	=> "<?php echo _l('User ID');?>",
			"메인으로 돌아가기"	=> "<?php echo _l('GO BACK TO FIRST PAGE');?>",
			"확인"	=> "<?php echo _l('SUBMIT');?>",
		)
	);
	
	patch_language( g::dir() . '/skin/member/basic/login.skin.php',
		array(
			"회원로그인 안내"		=> "<?php echo _l('User Login Information');?>",
			"회원아이디 및 비밀번호가 기억 안나실 때는 아이디/비밀번호 찾기를 이용하십시오." => "<?php echo _l('Use Password Lost Menu If You Lost ID Or Password');?>",
			"아직 회원이 아니시라면 회원으로 가입 후 이용해 주십시오." => "<?php echo _l('Register First To Use This Page');?>",
			"메인으로 돌아가기"	=> "<?php echo _l('GO BACK TO FIRST PAGE');?>",
		)
	);
	
	
	patch_language( g::dir() . '/bbs/current_connect.php',
		array(
			"'현재접속자'"		=> "_l('Connected User')",
		)
	);
	
	patch_language( g::dir() . '/adm/admin.menu100.php',
		array(
			"'환경설정'"		=> "_l('Setting')",
			"'기본환경설정'"		=> "_l('Basic')",
			"'관리권한설정'"		=> "_l('Admin Permission')",
			"'메일 테스트'"		=> "_l('Mail Test')",
			"'세션파일 일괄삭제'"		=> "_l('Delete All sesion files')",
			"'캐시파일 일괄삭제'"		=> "_l('Delete All cache files')",
			"'캡챠파일 일괄삭제'"		=> "_l('Delete All Captcha files')",
			"'썸네일파일 일괄삭제'"		=> "_l('Delete All thubnail')",
			"'네이버 신디케이션 핑'"		=> "_l('Naver Syndication Ping')",
		)
	);
	
	patch_language( g::dir() . '/adm/admin.menu200.php',
		array(
			"'회원관리'"		=> "_l('Member')",
			"'회원메일발송'"		=> "_l('Email Members')",
			"'접속자집계'"		=> "_l('Vistor Stat')",
			"'접속자검색'"		=> "_l('Search Visitors')",
			"'포인트관리'"		=> "_l('Points Management')",
			"'투표관리'"		=> "_l('Polls Management')",
		)
	);
	
	patch_language( g::dir() . '/adm/admin.menu300.php',
		array(
			"'게시판관리'"		=> "_l('Forum')",
			"'게시판그룹관리'"		=> "_l('Forum Group')",
			"'인기검색어관리'"		=> "_l('Popular Keywords')",
			"'1:1문의설정'"		=> "_l('Support Setting')",
		)
	);
	
	patch_language( g::dir() . '/adm/admin.tail.php',
		array(
			"귀하께서 사용하시는 브라우저는 현재 <strong>자바스크립트를 사용하지 않음</strong>으로 설정되어 있습니다."=> "<?php echo _l('Allow Javascript');?>",
			"<strong>자바스크립트를 사용하지 않음</strong>으로 설정하신 경우는 수정이나 삭제시 별도의 경고창이 나오지 않으므로 이점 주의하시기 바랍니다."=> "<?php echo _l('Allow Javascript Desc');?>",
			"소유하신 도메인"=>"<?php echo _l('Your Domain');?>",
			"상단으로"=>"<?php echo _l('Go to Top');?>",
		)
	);

	patch_language( g::dir() . '/adm/auth_list.php',
		array(
				"'최고관리자만 접근 가능합니다.'"=>"_l('Only Super Admin can acess this page')",
				'"관리권한설정"'=>"_l('Management Permission')",
				"설정된 관리권한"		=> "<?php echo _l('Acepted Management Permission');?>",
				"회원아이디"		=> "<?php echo _l('User Account');?>",
				"필수"		=> "<?php echo _l('Required');?>",
				"검색"		=> "<?php echo _l('Search');?>",
				"목록"		=> "<?php echo _l('List');?>",
				">전체<"		=> "><?php echo _l('All');?><",
				"닉네임"		=> "<?php echo _l('Nickname');?>",
				">메뉴<"		=> "><?php echo _l('Menu');?><",
				"권한"		=> "<?php echo _l('Permission');?>",
				"선택삭제"    => "<?php echo _l('Selected delete');?>",
		)
	);
	
	patch_language( g::dir() . '/adm/index.php',
		array(
			"목록"		=> "<?php echo _l('List');?>",
			"총회원수"	=> "<?php echo _l('No of Members');?>",
			"회원아이디"	=> "<?php echo _l('Member Account');?>",
			"이름"		=> "<?php echo _l('Name');?>",
			"닉네임"		=> "<?php echo _l('Nickname');?>",
			"권한"		=> "<?php echo _l('Permission');?>",
			"포인트"		=> "<?php echo _l('Point');?>",
			"수신"		=> "<?php echo _l('Mail');?>",
			"공개"		=> "<?php echo _l('Public');?>",
			"인증"		=> "<?php echo _l('Authorization');?>",
			"'관리자메인'" => "_l('Admin main')",
			"'예'"		=> "_l('Yes')",
			"'아니오'"	=> "_l('No')",
			"회원 전체보기" => "<?php echo _l('View All Members');?>",
			"최근게시물" => "<?php echo _l('Recent Posts');?>",
			"게시판" => "<?php echo _l('Forum');?>",
			"제목" => "<?php echo _l('Subject');?>",
			"일시" => "<?php echo _l('Date');?>",
			"제목" => "<?php echo _l('Subject');?>",
			"더보기" => "<?php echo _l('More');?>",
			"발생내역" => "<?php echo _l('Incident');?>",
			"합"=> "<?php echo _l('Total');?>",
			"내역 전체보기" => "<?php echo _l('View All History');?>"
		)
	);
	
	patch_language( g::dir() . '/adm/member_list.php',
		array(
				"탈퇴회원수" => "<!--탈퇴/회원수 -->",
				"차단회원수" => "<!--차단/회원수 -->",
				'>탈퇴함<' 	=> ">'._l('Resigned').'<",
				'>차단됨<' 	=> ">'._l('Blocked').'<",
				"'차단해제'"	=> "_l('Unblock')",
				"'차단하기'"  => "_l('Block')",
				"'휴대폰'"	=> "_l('Mobile')",
				"'아이핀'"	=> "_l('I-PIN')",
				"'관리자'"	=> "_l('Administrator')",
				'"정상"'		=> "_l('Normal')",
				"자료가 없습니다."	=> '"._l("No data")."',
				"회원자료 삭제 시 다른 회원이 기존 회원아이디를 사용하지 못하도록 회원아이디, 이름, 닉네임은 삭제하지 않고 영구 보관합니다." => "<?php echo _l('To delete user');?>",
				"'회원관리'"	=> "_l('Member Management')",
				">전체목록</" => ">'._l('List All').'</",
				"총회원수"=> "<?php echo _l('No of member');?>",
				">명 중," =>  "><?php echo _l('No of member after');?>",
				">차단 <" => "><?php echo _l('No of blocked');?><",
				"></a>명," => "></a><?php echo _l('No of blocked after');?>",
				">탈퇴 <" => "><?php echo _l('No of resign');?><",
				"></a>명" => "></a><?php echo _l('No of resign after');?>",
				">검색대상<" => "><?php echo _l('Search Member');?><",
				">회원아이디<" => "><?php echo _l('Member ID');?><",
				">닉네임<" => "><?php echo _l('Nickname');?><",
				">이름<" => "><?php echo _l('Name');?><",
				">권한<" => "><?php echo _l('Permission');?><",
				">전화번호<" => "><?php echo _l('Landline');?><",
				">휴대폰번호<" => "><?php echo _l('Mobile');?><",
				">포인트<" => "><?php echo _l('Point');?><",
				">가입일시<" => "><?php echo _l('Registered Date');?><",
				">추천인<" => "><?php echo _l('Referral');?><",
				">검색어<" => "><?php echo _l('Search Keyword');?><",
				"> 필수<" => "> <?php echo _l('Required');?><",
				'"검색"' => '"<?php echo _l("Search");?>"',
				">회원추가<" => "><?php echo _l('Add Member');?><",
				"목록</" => "<?php echo _l('List');?></",
				">회원 전체<" => "><?php echo _l('All Members');?><",
				">아이디<" => "><?php echo _l('ID');?><",
				"본인확인<" => "<?php echo _l('Identity');?><",
				"휴대폰<" => "<?php echo _l('Mobile');?><",
				"상태/" => "<?php echo _l('Status');?>/",
				"최종접속<" => "<?php echo _l('Recent visit');?><",
				">접근<" => "><?php echo _l('Access');?><",
				"r>그룹" => "r><?php echo _l('Group');?>",
				">관리<" => "><?php echo _l('Management');?><",
				"?>메일<" => "?><?php echo _l('Email');?><",
				"r>수신" => "r><?php echo _l('Received');?>",
				"?>성인<" => "?><?php echo _l('Adult');?><",
				"r>인증" => "r><?php echo _l('Authorization');?>",
				"> 포인트" => "?><?php echo _l('Point');?>",
				">가입일" => "?><?php echo _l('Registered Date');?>",
				">아이핀<" => "><?php echo _l('I-PIN');?><",
				"선택수정" => "<?php echo _l('Seleted Modification');?>",
				"선택삭제" => "<?php echo _l('Seleted Deletion');?>",
				" 하실 항목을 하나 이상 선택하세요." =>  "<?php echo _l('Please select at least two');?>",
				"선택한 자료를 정말 삭제하시겠습니까?" => "<?php echo _l('Are you sure to delete this data you select?');?>",
				">그룹</" => ">'._l('Group').'</",
				">정보" =>  "?><?php echo _l('Information');?>", 
				">공개<" => "><?php echo _l('in public');?><",
				">차단<" => "><?php echo _l('Block');?><",
		)
	);
	patch_language( g::dir() . '/adm/member_list_delete.php',
		array(
			"회원자료가 존재하지 않습니다." => '"._l("No Member Data")."',
			"로그인 중인 관리자는 삭제 할 수 없습니다." => '"._l("You cannot delete the admin who logged in currently")."',
			"최고 관리자는 삭제할 수 없습니다." => '"._l("Super admin cannot be deleted.")."',
			"자신보다 권한이 높거나 같은 회원은 삭제할 수 없습니다." => '"._l("You cannot delete the member who have the same or higher level than yours.")."',
		)
	);

	patch_language( g::dir() . '/adm/admin.head.php',
		array(
			"본문 바로가기" => "<?php echo _l('Go to Post');?>",
			"관리자정보" => "<?php echo _l('Admin Info');?>",
			"기본환경" => "<?php echo _l('Basic Setting');?>",
			"커뮤니티" => "<?php echo _l('Community');?>",
			"로그아웃" => "<?php echo _l('Logout');?>",
		)
	);
	
	patch_language( g::dir() . '/head.php',
		array(
			"외부 로그인" => "<!--외부로//그인-->",
			"현재 접속자수" => "<!-- 현재 접//속//자수-->",
			"본문 바로가기" => "<?php echo _l('Go to Post');?>",
			"사이트 내 전체검색" => "<?php echo _l('Search all in site');?>",
			">검색어<" => "><?php echo _l('Search Keyword');?><",
			"> 필수"=> "> <?php echo _l('Required');?>",
			"관리자" => "<?php echo _l('Admin');?>",
			"정보수정" => "<?php echo _l('Edit Info');?>",
			"로그아웃" => "<?php echo _l('Logout');?>",
			"회원가입" => "<?php echo _l('Register');?>",
			"로그인" => "<?php echo _l('Login');?>",
			"1:1문의" => "<?php echo _l('1:1 Support');?>",
			"접속자" => "<?php echo _l('Current Users');?>",
			"새글"  => "<?php echo _l('New Post');?>",
		)
	);
	
	patch_language( g::dir() . '/skin/outlogin/basic/outlogin.skin.1.php',
		array(
			"회원로그인" => "<?php echo _l('Member Login');?>",
			">회원아이디" => "><?php echo _l('Member ID');?>",
			">필수" => "><?php echo _l('Required');?>",
			">비밀번호" => "><?php echo _l('Password');?>",
			"회원가입" => "<?php echo _l('Register');?>",
			"정보찾기" => "<?php echo _l('Find Password');?>",
			">자동로그인" => "<?php echo _l('Remember me');?>",
			'"로그인"'	=> '"<?php echo _l("Login");?>"',
			
		)
	);
	
	patch_language( g::dir() . '/skin/outlogin/basic/outlogin.skin.2.php',
		array(
			"나의 회원정보" => "<?php echo _l('My Profile');?>",
			"관리자 모드" => "<?php echo _l('Admin mode');?>",
			"안 읽은" => "<?php echo _l('Unreaded');?>",
			"쪽지" => "<?php echo _l('Message');?>",
			"포인트" => "<?php echo _l('Point');?>",
			"스크랩" => "<?php echo _l('Scrap');?>",
			"정보수정" => "<?php echo _l('Edit Info');?>",
			"로그아웃" => "<?php echo _l('Logout');?>",
		)
	);
	
	patch_language( g::dir() . '/skin/popular/basic/popular.skin.php',
		array(
			"인기검색어 시작" => "<!-- 인//기검//색어 시작",
			"인기검색어 끝" => "<!-- 인기검//색어 끝",
			"인기검색어" => "<?php echo _l('Popular keyword');?>",
		)
	);
	
	patch_language( g::dir() . '/skin/visit/basic/visit.skin.php',
		array(
			"접속자집계 시작" => "접//속자//집계 시작",
			"접속자집계 끝" => "접//속자//집계 끝",
			"접속자집계" => "<?php echo _l('Visitor Stat');?>",
			"오늘" => "<?php echo _l('Today');?>",
			"어제" => "<?php echo _l('Yesterday');?>",
			"최대" => "<?php echo _l('Maximun of visitors');?>",
			"전체" => "<?php echo _l('Total of visitors');?>",
			"상세보기" => "<?php echo _l('More');?>"
		)
	);
	
	patch_language( g::dir() . '/tail.php',
		array(
			"소유하신 도메인" => "<?php echo _l('Your Domain');?>",
			"상단으로" => "<?php echo _l('Go to Top');?>",
			"모바일 버전으로 보기" => "<?php echo _l('View Mobile Version');?>"
		)
	);
	
	patch_language( g::dir() . '/skin/board/basic/list.skin.php',
		array(
				"개별 페이지 접근 불가" => "개별 페//이지 접근 불가",
				"<!-- 페이지 -->" => "<!-- 페//이지 -->",
				"게시판 검색 시작" => "게시판 검//색 시작",
				"게시판 검색 끝" => "게시판 검//색 끝",
				"게시판 페이지 정보 및 버튼 시작" => "게시판 페//이지 정보 및 버튼 시작",
				"게시판 페이지 정보 및 버튼 끝" => "게시판 페//이지 정보 및 버튼 끝",
				"게시판 목록 시작" => "게시판 목//록 시작",
				"게시판 목록 끝" => "게시판 목//록 끝",
				"현재 페이지 게시물 전체" => "<?php echo _l('All posts in the currency page');?>",
				"목록<"	=> "<?php echo _l('List');?><",
				"카테고리<"  => "<?php echo _l('Category');?><",
				"페이지" => "<?php echo _l('Page');?>",
				"관리자" => "<?php echo _l('Admin');?>",
				"글쓰기" => "<?php echo _l('Write');?>",
				"게시물 검색" => "<?php echo _l('Search Post');?>",
				"제목+내용" => "<?php echo _l('Subject + Content');?>",
				"제목" => "<?php echo _l('Subject');?>",
				"내용" => "<?php echo _l('Content');?>",
				"회원아이디(코)" => "<?php echo _l('Member ID(KR)');?>",
				"회원아이디" => "<?php echo _l('Member ID');?>",
				"글쓴이(코)" => "<?php echo _l('Writer(KR)');?>",
				"글쓴이" => "<?php echo _l('Writer');?>",
				"검색어" => "<?php echo _l('Search Keyword');?>",
				"필수" =>  "<?php echo _l('Required');?>",
				"검색" => "<?php echo _l('Search');?>",
				"번호" => "<?php echo _l('No');?>",
				"날짜" => "<?php echo _l('Date');?>",
				"조회" => "<?php echo _l('Search');?>",
				"비추천" => "<?php echo _l('No Good');?>",
				"추천" => "<?php echo _l('Good');?>",
				"댓글"  => "<?php echo _l('Comment');?>",
		)
	);
	$path = x::dir() . '/etc/language/code-list.txt';
	$re = file::write( $path, $language_code );
	
	
	$data = "<?php\n";
	foreach ( $language_code_ko as $k => $v ) {
		$v = str_replace('"', '\"', $v);
		$data .= '$' . "language_code['$k'] = \"$v\";\n";
	}
	
	$path = x::dir() . '/etc/language/ko.php';
	$re = file::write( $path, $data );
	
	
	
	
	

function patch_language( $file, $kvs )
{
	global $language_code, $language_code_ko;
	
	$data = file::read($file);
	foreach ( $kvs as $p => $r ) {
		
		if ( pattern_exist( $data, $p ) ) $data = str_replace($p, $r, $data);
		else {
			if ( pattern_exist( $data, $r ) ) {
				// alredy patched
			}
			else {
				echo "patch string $p and code $r does not eixst";
				patch_failed();
			}
		}
		
		$s = strtolower($r);
		
		
		$delimitor = "<?php echo _l('";
		if ( strpos( $s, $delimitor ) !== false ) {
			list ( $a, $b ) = explode($delimitor, $s);
			list ( $s, $d ) = explode("');?>", $b);
		}
		
		
		$delimitor = "_l('";
		if ( strpos( $s, $delimitor ) !== false ) {
			list ( $a, $b ) = explode("_l('", $s);
			list ( $s, $d ) = explode("')", $b);
		}
		
		
		$p = trim($p, "\"'<>");
		
		$language_code .= "$s\n";
		$language_code_ko["$s"] = $p;
		
	}
	file::write( $file, $data );
	echo "$file patched\n";
}



