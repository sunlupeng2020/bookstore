<?php require_once('connections/conn.php');?>
<?php

/* 
 * 检查用户名是否存在，存在返回1，不存在返回0
 */
if(isset($_POST['username'])){
    
    $username=$_POST['username'];
    //echo $username;
    $selectSQL=sprintf("select * from users where `username`='%s'",$username);
    $ResultUser=mysqli_query($conn,$selectSQL) or die(mysqli_error($conn));
    $count= mysqli_num_rows($ResultUser);
    mysqli_free_result($ResultUser);
    //return $count;
    echo $count;
}else
{
    return 0;
}