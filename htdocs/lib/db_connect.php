<?php

function dbconn(){
	$host_name="localhost";
	$db_user_id="test";
	$db_name="test";
	$db_pw="qweasdzxc1";

	$connect=mysql_connect($host_name, $db_user_id, $db_pw);
		mysql_query("set names utf8", $connect); //db charset 설정
		mysql_select_db($db_name, $connect);

		
		if(!$connect)die("DB 연결에 실패".mysql_error());
		return $connect; //반환하거나 종료할때 사용 , 호출한 페이지에서 사용한다면 호출한 페이지를 종료하고 사용자가 원하는 값을 호출한 페이지로 넘기는 기능
}		

/*
		$connect=mysql_connect("호스트네임 or ip", "db유저 아이디", "비번");
		mysql_query("set names utf8", $connect);
		mysql_select_db("test", $connect);

		
		if(!$connect)die("DB 연결에 실패".mysql_error());
		return $connect; //반환하거나 종료할때 사용
*/

//에러 메시지 출력
function Error($msg){
	echo "
		<script>
		window.alert('$msg');
		history.back(1); 
		</script>
	";
	exit; //위에 에러 메시지만 띄운다
}
		
// 로그인 한 쿠키 불러오기
function member(){

global $connect;
$temps=$_COOKIE["COOKIES"];
$cookise=explode("//",$temps);

//explode("구분 기준 문자", "처리할 내용");	// 기준 문자로되 함수를 분할 

	//아이디 $cookies[0];
	//비밀번호 $cookies[1];
	
// 회원 정보 가져오기

$query="select * from member where user_id='$cookise[0]' ";
mysql_query("set names utf8", $connect);
$result=mysql_query($query, $connect);
$member=mysql_fetch_array($result);
return $member;
}
?>