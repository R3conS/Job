<?php
session_start();
$con= new mysqli('localhost','root','','performancepro');
$sql="UPDATE connection_db set Validation=1 where email='".$_GET["email"]."'";
$result = mysqli_query($con, $sql);
header('Location: index.html');
?>