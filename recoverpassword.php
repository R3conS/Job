<?php
$con=new mysqli('localhost','root','','performancepro');
$sql="update connection_db set password='".md5($_POST['Password'])."' Where email='".$_POST["Email"]."'";
echo $sql;
$rep=mysqli_query($con, $sql);
$con->close();
//header('refresh:0;login.html');
?>