<?php
header("content-type:text/html; charset=utf-8"); ob_start; //버퍼 출력; 출력문을 임시 버퍼에 저장시켜 세션,쿠키,해더 함수 진행이 끝나면 임시 템프로 저장한 출력문을 출력;
include("../lib/db_connect.php");
$connect=dbconn();

$user_id= $_POST[user_id];
$pws= $_POST[pw];

$pw=md5($pws);

/*
 echo $pws ."<br>";
 echo $pw=md5($pws);	//16자리 단방향 암호화 처리 
*/

// 데이터 가져오기
$query="select * from member where user_id='$user_id'";
mysql_query("set names utf8");
$result=mysql_query($query, $connect);
$member=mysql_fetch_array($result);

if(!$user_id){
	Error("아이디를 입력하세요");	//db_connect.php 에서 Error function함수 호출
}elseif(!$member[user_id])Error("존재하지 않는 아이디");

if(!$pw){
	Error("비밀번호가 입력하세요");
}elseif($member[pw]!=$pw)Error("비밀번호가 일치 하지않습니다");

if($member[user_id] and $member[pw]==$pw){
$tmp=$member[user_id]."//".$member[pw];
setcookie("COOKIES",$tmp,time()+60*60*24,"/"); //24시간동안 쿠키 유효
//("쿠키이름", "저장내용" time(초 분 시간));
}
?>

<script>
window.alert("로그인 되었습니다");
location.href="../index.php";
</script>

