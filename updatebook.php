<?php require_once 'connections/conn.php';?>
<?php
if(isset($_POST["BookID"]))
{
    $query_Book=sprintf("update booktable set bookname='%s',bookauthor='%s',bookprice=%s,booktype=%s where bookid=%s",
	$_POST['BookName'],
	$_POST['BookAuthor'],
	$_POST['BookPrice'],
	$_POST['BookType'],
	$_POST['BookID']);
    $editbook=mysqli_query($conn,$query_Book) or die(mysqli_error($conn));
}
header("Location:allbooklist.php");
?>