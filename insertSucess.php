<?php require_once 'connections/conn.php';?><!--连接数据库-->
<?php
    $Result1=false;//假设插入不成功
    if(isset($_POST['BookName'])){
	$bookname=$_POST['BookName'];
	$bookprice=$_POST['BookPrice'];
	$bookauthor=$_POST['BookAuthor'];
	$booktype=$_POST['BookType'];
	$insertSQL="insert into booktable(bookname,bookauthor,booktype,bookprice) values('$bookname','$bookauthor',$booktype,$bookprice)";
	$Result1=mysqli_query($conn,$insertSQL) or die(mysqli_error($conn));
    }
mysqli_close($conn);
if($Result1){
	echo "<script>alert('插入成功！');</script>";
   }else{
    echo "<script>alert('插入失败！');</script>";
}
?>
<meta http-equiv="refresh" content="1;url=allbooklist.php">