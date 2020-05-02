<!-- delete.php删除图书 -->
<?php require_once('connections/conn.php'); ?>
<?php require_once('checkuser.php'); ?>
<?php
if(isset($_GET['BookID']))
	$bookid=$_GET['BookID'];
else {
	header("Location:deletebook.php");//页面重定向
	# code...
}
$query_book="delete from booktable where bookid=".$bookid;
$resault=mysqli_query($conn,$query_book) or die(mysqli_error($conn));//返回一个带有错误描述的字符串。
mysqli_close($conn);
if($resault){
	echo "<script>alert('删除成功！');</script>";
}
else{
	echo "<script>alert('删除失败！');</script>";
}
?>
<meta http-equiv="refresh" content="1;url=deletebook.php">