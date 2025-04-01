<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../lib/m_style.css" rel="stylesheet" />
<title>TEST 게시판 글쓰기</title>
<?
include("../../lib/db_connect.php");
$connect=dbconn();
$member=member();

if(!$member[user_id])Error("로그인 후 이용해 주세요");
?>
</head>

<body>

<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" align="center" valign="top">
<tr>
<td width="100%" height='70' align='left' valign="middle" bgcolor="#e89c05">
<table border="0" width="90%" height="70" bgcolor="#e89c05" align="center" cellspacing="0" cellpadding="0">
<tr>
	<td width="100%" height="70" align='left' valign="middle">
	<a href="../../index.php"><strong>[홈]</strong></a>

</td>
	</tr>
	</table>
<td>

<tr>
<td width="100%" height="100%" align="center" valign="top">
<table border="0" width="75%" height="100%" bgcolor="fffff" align="center" cellspacing="0" cellpadding="0">
<tr>
	<td width="100%" height="10" bgcolor="fffff" align="center" cellspaccing="0" cellpadding="0">
<tr>
	<td width="100%" height="10" colspan="2" bgcolor="fffff">&nbsp; </td>
<tr>
	<td width="100%" height="30" colspan="2" bgcolor="fffff" align="center"> -자유게시판 글쓰기	- </td>

<form name="write" action="write_post.php" method="post">
<input type="hidden" name="id" value="bbs1">

</body>