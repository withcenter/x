명칭 : x-gallery
소스 : https://github.com/withcenter/x/tree/master/skin/latest/x-gallery
연락 : http://gnuboardx.com thruthesky@gmail.com
설명 : 일반적인 최근 글 스킨의 사용방법과 동일하다.
반응형으로 제작되었으므로 장치(모바일, PC 등)에 상관없이 사용 할 수 있다.
스킨을 다운로드하여 G5_PATH/skin/latest 와 G5_PATH/mobile/skin/latest 에 각 각 복사를 해 넣으면 된다. 그러면 별도의 수정없이 모바일과 PC 에서 사용가능하다.
반응형에 대해서 잘 이해하고 사용해야한다.
특히 부모(또는 조상) box(block 형 엘리먼트)에 고정폭을 준다면 반응형이 될 수 없으며 그에 따라 반응형으로 동작하지 않을 것이다.

예제 1 ) 간단한 사용 방법
------------------------------------------------------------
<?=latest( 'x-gallery', 'ms_test6_1');?>
------------------------------------------------------------


예제 2 ) 일반적인 사용 방법
------------------------------------------------------------
<?php
echo latest( 'x-gallery-test', 'ms_test6_1', 40, 40, 1,
	array(
		'width'		=>300,
		'height'	=>180,
		'radius'	=> 0
	)
);
?>
------------------------------------------------------------




예제 3 ) CSS Overriding. 코드 아래에 CSS 클래스를 상속 또는 덮어쓴다.
-------------------------------------------------------------
<?php
echo latest( 'x-gallery-test', 'ms_test6_1', 40, 40, 1,
	array(
		'width'		=>300,
		'height'	=>180,
		'radius'	=> 0
	)
);
?>
<style>
	.x-gallery .text {
		background-color: white!important;
	}
	.x-gallery .text a {
		color: black!important;
	}
</style>
------------------------------------------------------------
