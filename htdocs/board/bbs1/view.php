<?ob_start();?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html; charset=UTF-8" />
<link type="text/css" href="../../lib/m_style.css" rel='stylesheet' />
<title>test 게시판 글보기</title>
<?
	include('../../lib/db_connect.php');
		$connect=dbconn();
		$member=member();	//db커넥트

	if(!$member[user_id])Error("로그인 후 이용해주세요");

	$no=$_GET[no];
	$id=$_GET[id];

	$lo_replay_1=$_GET[lo_replay_1];	//페이지 로케이션

	$bbs1=$no;
	if($no != $_COOKIE['hit_bbs1_'.$no]){
	$_query="update bbs1 set hit=hit+1 where no='$no'";
	mysql_query($_query, $connect);
//	setcookie("쿠키이름","저장값",time()+60*60*24,"/");
	setcookie("hit_bbs1_".$no,$no,time()+60*60*24,"/");
	}
?>
</head>

<body>

<table border='0' cellspacing='0' cellpadding='0' width='100%' height='100%'  align='center' valign='top'>
<tr>
<td width='70%' height='100%' align='LEFT' valign='MIDDLE' bgcolor='#FFFFFF'>
<table border='0' width='90%' height='100%' bgcolor='#ffffff' align='center' cellspacing='0' cellpadding='0'>
<tr>
<td width='100%' height='70' align='center' valign='middle' bgcolor='D4D5D3'>
게시판 글보기
</td>
<?
	$query="select * from bbs1 where no='$no' and id='$id' ";
	mysql_query("set names utf8");
	$result=mysql_query($query, $connect);
	$data=mysql_fetch_array($result);
?>
<tr>
<td width='100%' height='10' align='center' valign='middle'>
&nbsp; 
</td>

<tr>
<td width='100%' height='15' align='left' valign='middle'>
<li> 이 름 :<?=$data[name]?> (<?=$data[user_id]?>) &nbsp; &nbsp; &nbsp; <?if($data[nick_name]){?>닉네임:<?echo $data[nick_name]; }?>
</td>

<tr>
<td width='100%' height='25' align='left' valign='middle'>
<li>글 제 목:<?=$data[subject]?>
</td>

<tr>
<td width='100%' height='300' align='left' valign='top' bgcolor='FFFFFF'>
<hr size='0.1' width='98%' color='94AOFC' />
<div align='center'><img src='./data/<?=$data[file01]?>'></div>
<?=$data[story]?>
</td>


<tr>
<td width='100%' height='10' align='center' valign='middle'>
&nbsp; 
</td>

<tr>
<td width='100%' height='20' align='center' valign='middle' bgcolor='D4D5D3'>
<a href='list.php'>글 목록 </a> &nbsp; &nbsp;
<a href='edit.php?no=<?=$data[no]?>&id=<?=$data[id]?>'>글 수정 </a> &nbsp; &nbsp;
<a href='del.php?no=<?=$data[no]?>&id=<?=$data[id]?>' onclick="return confirm('정말 삭제하겠습니까?')">삭 제 </a>
</td>

<tr>
<td width='100%' height='50' align='center' valign='middle'>
&nbsp; 
</td>

</tr>
</table>
</td>

<tr>
<td width='100%' height='100%' align='center' valign='top'>

<!--게시글 댓글-->

	

<!--게시글 댓글-->

	<table border='0' width='100%' cellspacing='0' cellpadding='0'>
	<tr>
	<td width='852' align='center'><hr></td>

	<tr>
	<td width='854' align='center'>

<!--댓글 출력-->
	<table border='0' width='800' cellspacing='0' cellpadding='0' id='lo_replay_1'>
	<?
		$q_count="select count(*) from bbs1_comment where bbs1_no='$data[no]'";
		$r_count=mysql_query($q_count, $connect);
		$count=mysql_fetch_array($r_count);
		$total_count=$conut[0];
	?>
	<tr>
	<td colspan='4' align='right'>
	<font color='9c9a9a'>TOTAL comment:<?=$totla_count?> </font>&nbsp; &nbsp;
	</td>

	<?
		$q= "select * from bbs1_comment where bbs1_no='$data[no]' and replays='0' order by regdate asc, no asc";
		$r=mysql_query($q, $connect);
		while($d=mysql_fetch_array($r)){

	?>

	<tr>
	<td width='50' align='center' valign='middle' rowspan='3' bgcolor='#E3E030'>
	이미지
	</td>

	<td width='10' valign='middle' rowspan='3' bgcolor='#E3E030'>&nbsp;</td>

	<tr>
	<td width='674' valign='middle' bgcolor='#e3e0e0'>
	<span style='font-size:9pt; font-family:Tahoma; color:#727371'>
	
	<br>
	내용</span>
	&nbsp; &nbsp;
		<div align='right'>
		<span style='font-size:8pt; color:$545b5a'>[del]</span>
		&nbsp; &nbsp; &nbsp;
	</td>
	</table>
	</td>
	<?
		}
	?>

<!--
	<tr>
	<td width='100%' height='30' colspan='5' align='center' valign='middle' bgcolor='#FFFFFF'>
	<hr size='0.1' width='95%' color='#b2b2b2' />
	</td>

	<tr>
-->
	<form action='commnet_write.php' name='replays' method='post'>
	<input type=hidden name='bbs1_no' value='<?=$data[no]?>' title='게시판글 번호'>
	<input type=hidden name='replays' value='0'>
	<input type=hidden name='id' value='<?=$data[id]?>'>

	<td width=120 align='center' valign='middle' bgcolor='#e7cade'>
		<?
		if($member[nick_name]){
			echo $member[nick_name];
	}else{
			echo $member[name];
			}
		?>
	</td>

	<td width='20' align='left' bgcolor='#FFD2F1'>&nbsp;</td>
	
	<td width='100' align='right' bgcolor='#FFD2F1'>Comment&nbsp;</td>
	
	<td width=30><input type=submit value='ok'></td>
	</tr>
	</form>
	</table>

<!--/댓글-->
</td>
</tr>
</table>
</body>
</html>