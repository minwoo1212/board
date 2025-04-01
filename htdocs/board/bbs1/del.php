<?header("content-type:text/html; charset=UTF-8");

	include("../../lib/db_connect.php");
	$connect=dbconn();
	$member=member();

	if(!$member[user_id])Error("로그인 후 이용해주세요");

	$no=$_GET[no];
	$id=$_GET[id];


	// 이미지 삭제
	$query="select * from bbs1 where no='$no' and user_id='$member[user_id]'";
	$result=mysql_query($query, $connect);
	$data=mysql_fetch_array($result);

	if($data[file01]){
		$del_file='./data/'.$data[file01];
		if($data[file01] && is_file($del_file))unlink($del_file);
	}

	// 게시판 글 삭제
	$query="delete from bbs1
			where no='$no' and id='$id' and user_id='$member[user_id]'";
	mysql_query($query, $connect);
?>

<script>

	window.alert('삭제 되었습니다.');
	location.href='./list.php';

</script>