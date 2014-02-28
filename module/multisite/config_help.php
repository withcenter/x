<div class='subsite-support'>
	<div class='title'><div class='inner'>
		<img src='<?=x::url()?>/module/multisite/img/direction.png' />
		필고 무료 홈페이지 사용방법 안내
	</div></div>
	
	<div class='support'>
		<div class='tab-menu'>
			<span class='tab-button' menu_name='general-setting'>일반 설정</span>
			<span class='tab-button' menu_name='menu-setting'>메뉴 설정</span>
			<span class='tab-button' menu_name='forum-setting'>게시판 설정</span>
			<span class='tab-button' menu_name='write-setting'>글쓰기 설정</span>
			<span class='tab-button' menu_name='theme-setting'>테마 선택</span>
		</div>
	</div>
	<div class='support-content'>
		<div class='inner general-setting'>
			
			<?php
				$description = array(
										'1. 메인 타이틀은 사이트 로고 옆 제목을 나타냅니다. 사이트 로고가 없는 경우는 문구만 나타나게 됩니다. <br /> 서브 타이틀은 웹브라우저의 탭에 추가로 나타나게 되는 문구 입니다.',
										'2. 메인 타이틀과 서브타이틀을 적용한 결과 입니다.',
										'3. 하단 문구는 사이트 하단 ( FOOTER)에 나타나는 문구 입니다.',
										'4. 다음은 하단 문구를 적용한 결과 입니다.',
										'5. 첫페이지에 나타날 게시판을 선택하는 항목 입니다. 게시판이 나타나는 순서는 사이트 테마에 따라 달라질 수 있습니다.',
										'6. 첫페이지에 나타날 게시판을 선택한 결과 입니다.',
										'7. 사이드바의 위치를 왼쪽, 오른쪽으로 선택 할 수 있습니다.',
										'8. 다음은 사이드바의 위치를 변경 한 예 입니다.',
										'9. 블로그 사용자의 경우 프로필 사진 및 프로필 문구를 입력 할 수 있습니다. 이는 테마에 따라 달라 질 수 있으며, 테마에 따라 배너 사진 및 배너 문구를 입력 하는 경우도 있습니다.',
										'10. 프로필 사진과 프로필 문구를 적용한 예 입니다.'
				);
				
			for( $i=1; $i <=10; $i++ ) {
				
				echo "<div class='sub-title'>";
				if ( $i == 9 ) echo "<a name='banner_description'>";
				
				echo $description[$i-1];
				
				if ( $i == 9 ) echo "</a>";
				
				echo "</div>";
				
				echo "
					<div class='support-image'><img src='".x::url()."/module/multisite/support_img/g{$i}.png' /></div>";
			}?>
		</div>
		<div class='inner menu-setting'>
			<div class='sub-title'>1. 메인 메뉴에 나타나는 게시판을 다음과 같이 선택 할 수 있습니다.</div>
			<div class='support-image'><img src='<?=x::url()?>/module/multisite/support_img/m1.png' /></div>
			<div class='sub-title'>2. 적용 후 상단 메인과 왼쪽 서브 메뉴에 게시판이 추가 된 것을 확인 하실 수 있습니다.</div>
			<div class='support-image'><img src='<?=x::url()?>/module/multisite/support_img/m2.png' /></div>
		</div>
		<div class='inner forum-setting'>
			<?php
			for( $i=1; $i <=6; $i++ ) {
				if ( $i == 1 ) echo "<div class='sub-title'>1. 게시판 생성</div>"; 
				else if ( $i == 2 ) echo "<div class='sub-title'>2. 게시판 설정</div>";
				echo "
					<div class='support-image'><img src='".x::url()."/module/multisite/support_img/f{$i}.png' /></div>";
			}?>
			
		</div>
		<div class='inner write-setting'>
		<?php
			for( $i=1; $i <=7; $i++ ) {
				if ( $i == 1 ) echo "<div class='sub-title'>1. 글쓰기를 클릭 합니다.</div>"; 
				else if ( $i == 2 ) echo "<div class='sub-title'>2.포털의 블로그에서 글쓰기 API 정보를 확인 하는 방법은 다음과 같습니다(네이버 기준).</div>";
				else if ( $i == 4 ) echo "<div class='sub-title'>3. 메뉴, 글 관리에서 글쓰기 API설정을 클릭 합니다.</div>";
				else if ( $i == 5 ) echo "<div class='sub-title'>4. 글쓰기 API 계정을 확인 한 후, 설정하려는 사이트의 API연결 URL, 아이디, API연결 암호를 입력합니다.  </div>";
				else if ( $i == 6 ) echo "<div class='sub-title'>5. 다음과 같이 네이버 블로그에도 글이 정상적으로 등록이 된다면 설정이 완료 된 것 입니다. </div>";
				echo "<div class='support-image'><img src='".x::url()."/module/multisite/support_img/w{$i}.png' /></div>";
			}?>
			<div class='sub-title'>6. 글쓰기 서비스에서는 총 3개의 글쓰기 API계정을 입력 할 수 있으며, 3개의 블로그에 동시에 글 등록이 가능합니다.</div>
		</div>
		<div class='inner theme-setting'>
			<div class='sub-title'>사용하려는 사이트의 성격에 맞는 테마를 클릭 한번으로 변경하실 수 있습니다.</div>
			<div class='support-image'><img src='<?=x::url()?>/module/multisite/support_img/t1.png' /></div>
		</div>
	</div>
	
	
</div>