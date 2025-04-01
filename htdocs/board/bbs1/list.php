<html>
<head>
<?
include('../../lib/db_connect.php');
$connect=dbconn();
$member=member();	//db커넥트
?>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link type="text/css" href="../../lib/m_style.css" rel="stylesheet" />
<title>test 게시판</title>
</head>

<body>

	<table border="0" cellspacing="0" cellpadding="0" width="100%" height="100%" align="center" valign="top">
	<tr>
		<td width="100%" height="70" align="left" valign="middle" bgcolor="#e89c05">
		<table border="0" width="90%" height="70" bgcolor="#e89c05" align="center" cellspacing="0" cellpadding="0">
		<tr>
			<td width="100%" height="70" align="left" valign="middle">
			<a href='../../index.php'><strong>[홈]</strong></a>
			&nbsp; &nbsp; &nbsp;
			</td>
		
		<tr>
			<td width="100%" height="100%" align="left" valign="middle">&nbsp;</td>
		</tr>
		</table>
</td>

<tr>
<?
	$_page=$_GET[_page];
	$view_total=10;
	if(!$_page)($_page=1);	
	$page=($_page-1)*$view_total;
    
	$query="select count(*) from bbs1 where id='bbs1'";
	mysql_query("set names utf8"); 
	$result=mysql_query($query, $connect);
	$temp=mysql_fetch_array($result);
 	$totals= $temp[0];
?>
	<td width="100%" height="100%" align="center" valign="top">
	<table border="0" width="75%" height="100%" bgcolor="eodfde" align="center" cellspacing="0" cellpadding="0">
<tr>
	<td width="100%" height="10" colspan="5" bgcolor="fffff">&nbsp; </td>
<tr>
	<td width='100%' height='30' colspan='5' class='font_td1' bgcolor='fffff'>자유게시판</td>
<tr>
	<td class='font_tr2' width='5%' height='30' align='center' valign='middle'>no</td>
	<td class='font_tr2' width='15%' height='30' align='center' valign='middle'>이름</td>
	<td class='font_tr2' width='40%' height='30' align='center' valign='middle'>제목</td>
	<td class='font_tr2' width='15%' height='30' align='center' valign='middle'>날짜</td>
	<td class='font_tr2' width='10%' height='30' align='center' valign='middle'>조회수</td>

<?	
	$query="select*from bbs1 where id ='bbs1' order by no desc limit $page, $view_total";
	$result=mysql_query($query, $connect);
	$cnt=1; 
	while($data=mysql_fetch_array($result)){
	
		$date_y=substr($data[regdate],2,2); //년도
		$date_m=substr($data[regdate],4,2); //월
		$date_d=substr($data[regdate],6,2); //일
		$date_h=substr($data[regdate],8,2); //시간
		$date_i=substr($data[regdate],10,2); //분

?>
<tr>
	<td height='25' align='center' bgcolor='efeeec'><?=$cnt ?></td>
	<td height='25' align='center' bgcolor='efeeec'><?=$data[name] ?></td>
	<td height='25' align='left' bgcolor='efeeec'><a href='./view.php?no=<?=$data[no]?>&id=<?=$data[id]?>'><?=$data[subject] ?></a></td>
	<td height='25' align='center' bgcolor='efeeec'><?echo $date_y."-".$date_m."/".$date_d."&nbsp; &nbsp;"?></td>
	<td height='25' align='center' bgcolor='efeeec'><?=$data[hit] ?></td>
<?
	$cnt++;	
	}?>
<tr>
	<td height='100%' colspan='5' bgcolor='fffff'><?include('./list_page.php')?></td>

	<tr>
	<td height='100%' align='right' colspan='5' bgcolor='fffff'>
	<a href='./write.php'><strong>[게시판 글쓰기]</strong></a>
	&nbsp; &nbsp; </td>
	</tr>
		</table>
	</td>
<tr>
	<td width='100%' height='100%' align='center' valign='top';>&nbsp;</td>
</tr>
	</table>

</body>	
</html>