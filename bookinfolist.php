<!-- bookinfolist.php -->
<?php require_once('connections/conn.php');?>
<?php
	//error_reporting(E_ALL & ~E_DEPRECATED);
	$colname_BookInfo="-1";
	if(isset($_POST['BookType'])){
        	$colname_BookInfo=$_POST['BookType'];
	}
	//sprintf函数生成字符串
	$query_BookInfo=sprintf("select * from booktable where booktype=%s",$colname_BookInfo);
	mysqli_query($conn,"set names 'utf8'");//设置字符编码格式
	$bookinfo=mysqli_query($conn,$query_BookInfo) or die(mysqli_error($conn));//查询数据
	//mysqli_fetch_assoc从结果集中取出一行数据，成为相关数组，键名是字段名，值是数据
	$row_bookinfo=mysqli_fetch_assoc($bookinfo);//
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8"/>
<title>网上书店</title>
</head>
<body bgcolor="#f4f4f4">
	<table width="100%" border="0" align="center">
		<tr>
			<td width="27%" height="68" rowspan="2">
				<img width="200" height="106" src="images/book_logo.jpg"/>
			</td>
			<td height="68" colspan="4">
				<font face="隶书" size="+4" color="#cccc00">网上书店</font>
			</td>
			<td width="10%" rowspan="2">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4" align="center">欢迎光临我们的网站</td>
		</tr>
		<tr>
			<td width="15%" height="20" align="left" valign="middle">
				<a href="index.php">首页</a>
			</td>
			<td width="15%" height="20" align="left" valign="middle">
				<a href="allbooklist.php">所有图书</a>
			</td>
			<td width="20%" height="20"><a href="allbooklist_pg.php">所有图书(分页)</a></td>
			<td width="15%" height="20" align="left" valign="middle">
				<a href="insertbook.php">插入书籍</a>
			</td>
			<td width="20%" height="20" align="left" valign="middle">
				<a href="deletebook.php">编辑删除图书</a>
			</td>
			<td width="15%" height="20">&nbsp;</td>
		</tr>
		<tr>
			<td height="169" colspan="6" align="center">
			<table width="100%" border="0" align="center">
				<tr align="center">
					<td width="60%" cospan="3">您选择的书有：</td>
				</tr>
<?php do{ ?> <!--用while循环显示数据 -->
				<tr>
					<td width="60%" align="center">
						<?php echo $row_bookinfo['bookname'];?>
					</td>
					<td width="40%" align="left">
						<?php echo $row_bookinfo['bookauthor'];?>
					</td>
                                    	<td width="40%" align="left">
						<?php echo $row_bookinfo['bookprice'];?>
					</td>
				</tr>
<?php }while ($row_bookinfo=mysqli_fetch_assoc($bookinfo));?>
			</table>
		</td>
		</tr>
		<tr>
			<td colspan="6"><table width="100%" border="0">
				<hr>
				<tr>
					<td align="center" valign="middle">Copyright@2006 lanmo </td>
				</tr>
				<tr>
					<td align="center" valign="middle">XXX Email:lanmo@myweb.com</td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
</body>
</html>
<?php
	mysqli_free_result($bookinfo);//释放数据
?>