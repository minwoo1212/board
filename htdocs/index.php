<html>
	<head>
	<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
	<link type="text/css" href="./lib/m_style.css" rel="stylesheet">
	<title>테스트 홈페이지</title>
	</head>
	<body>

		<?php
		include("./lib/db_connect.php"); //db_connect 파일 불러오기
			$connect=dbconn();
			$member=member();
		?>
	
<?
var_dump($member[user_id]);
?>


	<table border='0' width='100%' height="100%" align="center" cellspacing="0" cellpadding="0">
	<tr>
	<td width="100%" height="100%" align="center">
	<table border="0" width="100%" height="100%" align="center" cellspacing="0" cellpadding="0">
	<tr>
	<td width="100%" height="80" align="center" bgcolor="#764300">
	<font color='#FFFFFF'><strong> [홈페이지 상단]></strong></font>
	</td>
	<tr>
	<td width="100%" height='50' align="right">
	<?php
		if($member[user_id]){
			echo $member[name]."(".$member[user_id].") 님 환영합니다.";
		}else{?>
	<a href="./member/join.php"><strong>[회원가입]</strong></a> 
	&nbsp;	&nbsp; &nbsp;
	<a href="./member/login.php"><strong>[로그인]</strong></a>
	<?}?>
		
	&nbsp;	&nbsp;
	<?if($member[user_id]){?>
		<a href="./member/logout.php"><strong>[로그아웃]</strong>
	<?}?>
	</td>
	<tr>
	<td width='100%' height='30' align='left' valign='middle' bgcolor='#452403'>
	&nbsp; &nbsp; &nbsp; &nbsp;
	<a href="../board/bbs1/list.php"><font color="FFFFFF">[자유게시판]</font></a>
	</td>
	<tr>
	<td width='100%' height='500' align='center' bgcolor='#FFFFFF'>홈페이지 메인입니다</td>
	<tr>
	

	<td width="100%" height="100%" align="center" bhcolor="#FFFFFF">&nbsp;</td>

	</tr>
	</table>
	</td>
	</tr>
	</table>
	</body>
</html>