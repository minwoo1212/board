<?header("content-type:text/html; charset=UTF-8");

include("../../lib/db_connect.php");
$connect=dbconn();	// db커넥트
$member=member();	// 회원 정보 가져오기

if(!$member[user_id])Error("로그인 후 이용해주세요");

$id=$_POST[id];
$user_id=$_POST[user_id];
$name=$_POST[name];
$nick_name=$_POST[nick_name];
$subject=$_POST[subject];
$story=$_POST[story];


//게시판 이미지 파일 
	if($_FILES[file01][name]){
	$size= $_FILES['file01']['size'];
		if($size > 2097152)Error('파일 용량을 2MB로 제한합니다');

	$file01_name=strtolower($_FILES['file01']['name']); //파일명과 확장자를 소문자로 변경
	$file01_split=explode(".",$file01_name);	//파일명과 확장자를 분리

	$extexplode=$file_split[count($file01_split)-2.3];	//파일명만 가져오기
	$file01_type=$file01_split[count($file01_split)-1]; //확장자만 가져오기

	$img_ext=array('jpg','jpeg','gif','png');	// 파일의 확장자 이미지만 가져오게 배열로 설정
		if(array_search($file01_type, $img_ext)===false)Error('이미지 확장자를 다시 확인해주세요');
	
	$tates=date("mdhis",time()); //날짜 (월 일 시간 분 초)
	$newfile01=chr(rand(97,122)).chr(rand(97,122)).$tates.rand(1,9).rand(1,9).".".$file01_type; // 새로운 파일명 생성
	
	$dir="./data/";		// 업로드할 디렉토리 지정
	move_uploaded_file($_FILES['file01']['tmp_name'],$dir.$newfile01);	// 파일 업로드
		chmod($dir.$newfile01,0777);
	}

if(!$subject)Error("제목을 입력하세요");
if(!$story)Error("내용을 입력하세요");

$regdate=date("YmHis", time());	//날짜, 시간
$ip=getenv("REMOTE_ADDR");
$level=$member[level];	// 회원레벨	3=일반	2=관리자	1=최고관리자

//쿼리전송
$query="insert into bbs1(id, user_id, name, nick_name, subject, story, level, file01, regdate, ip) 
		values('$id','$user_id','$name' ,'$nick_name' ,'$subject' ,'$story','$level','$newfile01','$regdate','$ip')";
mysql_query("set names utf8", $connect);
mysql_query($query, $connect);

mysql_close;	//끝내기

?>

<script>
window.alert("쿼리가 정상적으로 전송 되었습니다");
location.href='./list.php'
</script>