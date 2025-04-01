<?header("content-type:text/html; charset=UTF-8");

	$user_id=$_SESSION['user_id'];

	$id=$_POST[id];
	$bbs1_no=$_POST[bbs1_no];
	$replays=$_POST[replays];
	$memo=$_POST[memo];
	
	include("../../lib/db_connect.php");
	$connect=dbconn();
	$member=member();

	if(!$member[user_id])Error("로그인 후 이용해주세요");
	if(!$memo)Error("내용을 입력하세요");
	if(!$bbs1_no)Error("접근이 잘못되었습니다.");

	$regdate=date("YmdHs",time()); //날짜 시간

	$query="insert into bbs1_comment(id, bbs1_no, user_id, name, nick_name, memo, replays, regdate)
									values('$id', '$bbs1_no', '$member[user_id]', '$member[name]', '$member[nick_name]', '$memo', '$replays', '$regdate')";
			mysql_query($query, $connect);

	$query="update bbs1 set comment=commnet+1 where no='$bbs1_no'";
	mysql_query($query, $connect);
?>

<script>

	window.alert('댓글 등록되었습니다..');
	location.href='./view.php?no=<?=$bbs1_no?>&id=<?=$id?>&lo_replay_1=lo_replay_1';

</script>