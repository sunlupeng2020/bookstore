<?php
#FileName="conn.php"
#Type="MySQL"
#HTTP="true"
$hostname_conn="localhost";
$database_conn="bookdb";
$username_conn="root";
$password_conn="";
$conn=mysqli_connect($hostname_conn,$username_conn,$password_conn,$database_conn) or trigger_error(mysqli_error(),E_USER_ERROR);//
?>