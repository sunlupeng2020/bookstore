<?php require_once('connections/conn.php');?>
<!DOCTYPE html>
<?php
if(isset($_POST['username'])){
    mysqli_query($conn,"set names 'utf8'");//设置字符编码格式
    $Result=false;//假设插入不成功
    if(isset($_POST['username'])){
        $username = $_POST['username'];
	$password=$_POST['password'];
        $selectSQL=sprintf("select * from users where `username`='%s'",$username);
        $ResultUser=mysqli_query($conn,$selectSQL) or die(mysqli_error($conn));
        $count= mysqli_num_rows($ResultUser);
        if($count>0)
        {
            echo "<script>alert('用户名已存在！请使用其它用户名！');</script>";
        }
        else
        {
            $insertSQL="insert into `users`(username,password) values('$username','$password')";
            $Result=mysqli_query($conn,$insertSQL) or die(mysqli_error($conn));
            if($Result){
                //echo "<script>alert('注册成功！');</script>";
                header("Location:login.php");
            }
            else
            {
                 echo "<script>alert('注册失败！');</script>";
            }    
        }
    }
}


function checkusername()
{
    $username=$_POST['username'];
    $reg="/^[a-zA-Z][a-zA-Z0-9_]{5,19}$/";
    $unreg=preg_match($reg,$username);
    if(preg_match($reg,$username)==0){
        echo("<script>alert('用户名格式不对！');</script>"); 
          //echo("<meta http-equiv='refresh' content='1;url=register.php'>");
        return false;
    }
    return true;
}
/* 
 * 用户注册
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<h2>用户注册</h2>
<form action="register.php" method="post" >
    用户名：<input name="username" type="text" size="30" id="username"/><br/>
    密码：<input name="password" type="text"size="30" id="password"/><br/>
    <input type="hidden" name="checked" id="checked" value="0"/>
    <input type="submit" name="submit" value="提交"/>
  
</form>







<script type="text/javascript">
    function check(){
        var msg="";
        var username=document.getElementById("username").value;
        console.log(username);
        var reg=/[a-zA-Z][a-zA-Z0-9_]{5,19}$/;
        var rst1=username.match(reg);
        if(rst1===null){
            msg="用户名不符合要求！";
        }
        var pwd=document.getElementById("password").value;
        reg=/.{6,20}/;
        var rst2=pwd.match(reg);
        console.log(rst2);
        if(rst2===null){
            msg+="密码不符合要求！";
        }
        if(msg!==""){
            alert(msg);
            return false;
        }
        document.getElementById("checked").innerHTML="1"
        return true;            
    }
</script>
