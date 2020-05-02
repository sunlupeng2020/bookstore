<?php require_once 'connections/conn.php';?>
<?php require_once('checkuser.php'); ?>
<?php
if(isset($_GET['BookID']))
	$bookid=$_GET['BookID'];
else {
	header("Location:deletebook.php");//页面重定向
}
	MySQLi_query($conn,"set names 'utf8'");
	$query_Book="select * from booktable where bookid=".$bookid;
	$Book=MySQLi_query($conn,$query_Book) or die(mysqli_error($conn));
	$row_Book=mysqli_fetch_assoc($Book) or header("Location:deletebook.php");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>图书编辑</title>
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
			<form id="form1" name="form1" method="post" action="updatebook.php">
			<table width="100%" border="0">
				<tr>
					<td colspan="2" align="center">图书信息</td>
				</tr>
				<tr valign="middle">
				<td align="center">书名</td>
				<td><input name="BookName" type="text" id="BookName" size="30" value="<?php echo $row_Book['bookname'];?>" title="<?php echo $bookid;?>" /></td>
				</tr>
				<tr>
				<td align="center">作者</td><td><input name="BookAuthor" type="text" id="BookAuthor" size="20" value="<?php echo $row_Book['bookauthor'];?>" /></td>
				</tr>
				<tr>
				<td align="center">图书价格</td><td><input name="BookPrice" type="text" id="BookPrice" size="20" value="<?php echo $row_Book['bookprice'];?>" /></td>
				</tr>
				<td align="center">图书类型</td>
				<td align="left" valign="middle">
				<select name="BookType" id="BookType">
					<option value="1" <?php if($row_Book['booktype']=="1") echo "selected='selected'"; ?>>计算机书籍</option>
					<option value="2" <?php if($row_Book['booktype']=="2") echo "selected='selected'"; ?>>医学书籍</option>
					<option value="3" <?php if($row_Book['booktype']=="3") echo "selected='selected'"; ?>>英语书籍</option>
				</select>
				</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="hidden" name="BookID" id="BookID" value="<?php echo $row_Book['bookid'];?>">
						<input type="submit" name="submit" value="提交"/>
					</td>
				</tr>

			</table>
		</form>
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
	mysqli_free_result($Book);//释放数据
?>