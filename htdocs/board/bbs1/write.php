<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../lib/m_style.css" rel="stylesheet" />
<title>TEST 게시판 글쓰기</title>
<?
include("../../lib/db_connect.php");
$connect=dbconn();
$member=member();

?>
</head>

<body>

<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" align="center" valign="top">
<tr>
<td width="100%" height='70' align='left' valign="middle" bgcolor="#e89c05">
<table border="0" width="90%" height="70" bgcolor="#e89c05" align="center" cellspacing="0" cellpadding="0">
<tr>
	<td width='100%' height='70' align='left' valign='middle'>
	<a href="../../index.php"><strong>[홈]</strong></a> &nbsp;
	<a href="./list.php"><strong>[이전 페이지]</strong></a>

</td>
	</tr>
	</table>
</td>

<tr>
<td width="100%" height="100%" align="center" valign="top">
<table border="0" width="75%" height="100%" bgcolor="fffff" align="center" cellspacing="0" cellpadding="0">
<tr>
	<td width="100%" height="10" colspan="2" bgcolor="fffff">&nbsp; </td>
<tr>
	<td width="100%" height="30" colspan="2" bgcolor="fffff" align="center"> -자유게시판 글쓰기	- </td>

<form name="write" action="write_post.php" method="post" enctype='multipart/form-data'>
<input type="hidden" name="id" value="bbs1">

<tr>
<td width="20%" height='30' align='right' valign='middle'>
<li>아이디
</td>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>

&nbsp; <input type='text' name='user_id' size='15' value='<?=$member[user_id]?>' readonly='readonly'>
</td>

<tr>
<td width="20%" height='30' align='right' valign='middle'>
<li>이름
</td>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
&nbsp; <input type='text' name='name' size='15' value='<?=$member[name]?>' readonly='readonly'>
&nbsp; &nbsp; &nbsp; 
닉네임 :<input type='text' name='nick_name' size='15' value='<?=$member[nick_name]?>' readonly='readonly'>
</td>

<tr>
<td width="20%" height='30' align='right' valign='middle'>
<li>제목</li>
<td width='80%' height='30' bgcolor='FFFFF' align='left' valign='middle'>
&nbsp; <input type='text' name='subject' style="width:500px; height:30px;">
</td>

<tr>

<td width='100%' height='420' align='center' valign='middle' colspan='2'>
<textarea name='story' style="width:80%; height:400px;"></textarea>
</td>

<tr>

<td width='100%' height='30' align='center' valign='middle' colspan='2'>
<input type='file' name='file01'>
</tr>

<tr>
<td width='100%' height='30' bgcolor='EDEDED' colspan='2'align='center' valign='middle'>
<input type='submit' value='전송'>
</td>
</form>

<tr>
	<td width='100%' height='100%' colspan='2' bgcolor='FFFFF'> &nbsp; </td>
</tr>
</table>
</td>
</body>