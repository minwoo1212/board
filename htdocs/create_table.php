<?php
header("content-type:text/html; charset=UTF-8");
echo"
<head>
<title>test홈페이지db테이블생성</title>
</head>
";
include"./lib/db_connect.php";
//include($_SERVER['DOCUMENT_ROOT']."/lib/db_connect.php");
$connect=dbconn();


	$sql="CREATE TABLE bbs1
		(no int not null auto_increment,
		PRIMARY KEY(no),
		id char(15),
		level int,
		user_id char(15),
		name char(15),
		nick_name char(15),
		pw char(30),
		subject char(150),
		story text,
		hit int,
		regdate char(20),
		ip char(15)
		)";

if(!$sql)die("테이블 생성에 실패 하였습니다.".mysql_error());

echo "<p>테이블이 정상적으로 생성퇴었습니다</p>";
	$sql="alter table member add level int default '3' not null ";



$sql="show tables from test";
$result=mysql_query($sql);
	if(!$result){
		echo"mysql error".mysql_error();
		exit;
	}
	while($row=mysql_fetch_row($result)){
		echo"table:".$row[0]."<br>";
	}
	mysql_query($sql,$connect);

	if($sql)echo("정상적으로 실행 되었습니다.");

	mysql_query($sql, $connect);
	//mysql_select_db("test", $connect);
	if (!$sql)die("db테이블 생성에 실패".mysql_error());
	
	return $sql; 

?>

