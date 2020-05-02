<?php require_once('connections/conn.php');?>
<!DOCTYPE html>
<?php
if(isset($_POST['username']))
{
    mysqli_query($conn,"set names 'utf8'");//设置字符编码格式
    $Result=false;//假设插入不成功
    if(isset($_POST['username'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
        $selectSQL=sprintf("select * from users where `username`='%s' and `password`='%s'",$username,$password);
        $ResultUser=mysqli_query($conn,$selectSQL) or die(mysqli_error($conn));
        $count= mysqli_num_rows($ResultUser);
        if($count>0)
        {
            session_start();
            //echo "<script>alert('登录成功！');</script>";
            $_SESSION['username']=$username;
            setcookie('username',$username,time()+60*60*24*30);
            setcookie('password',$password,time()+60*60*24*30);
            header("Location:deletebook.php");
        }
        else
        {
            echo "<script>alert('登录失败！请检查用户名密码是否正确！');</script>";
        }
    }
}
?>
<h2>用户登录</h2>
<form action="" method="post">
    用户名：<input name="username" type="text" size="30" required value="<?php if(isset($_COOKIE['username'])){  echo $_COOKIE['username'];} ?>" /><br/>
    密码：<input name="password" type="password"size="30" required value="<?php if(isset($_COOKIE['password'])){  echo $_COOKIE['password']; }?>" /><br/>
    <input type="submit" name="submit" value="登录"/>
  
</form>
