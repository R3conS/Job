<?php
$First_name=$_POST['First_name'];
$Last_name = $_POST['Last_name'];
$Password=$_POST['password'];
$_SESSION["Email"]=$_POST['Email'];
$Email=$_POST['Email'];
$Validation=0;
session_start();
if (!isset($Email)){
  die("Please input all  info");
}

$MESSAGE='Votre lien de validation email est le suivant : http://localhost/site_01/Activation.php?email='.$Email;
$SUBJECT="Validation Mail ";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;
require'C:\xampp\phpMyAdmin\vendor\autoload.php';
require("src/PHPMailer.php");
require("src/Exception.php");
require("src/SMTP.php");
require("src/OAuth.php");
require("src/POP3.php");
$mail = new PHPMailer(TRUE);
$mail->Host = "smtp.gmail.com";
$mail->isSMTP();
$mail->SMTPSecure = 'ssl';
$mail->SMTPDebug = 2;
$mail->SMTPAuth = true;
$mail->IsHTML(true);
$mail->Username="saimsami116@gmail.com";
$mail->Password="Elharbil123";///my passworrd
$mail->SMTPSecure="ssl";
$mail->Port=465;
$mail->Subject=$SUBJECT ."  ".$First_name." ".$Last_name;
$mail->Body=$MESSAGE;
$mail->setFrom($Email);
$mail->addAddress("$Email");
if(!$mail->Send()) {
  echo 'Message was not sent.';
  echo 'Mailer error: ' . $mail->ErrorInfo;
} else {
  $con= new mysqli('localhost','root','','performancepro');
$sql="INSERT INTO connection_db(email,password,first_name,last_name,Validation) VALUES('".$Email."','".md5($Password)."','".$First_name."','".$Last_name."','".$Validation."')";
$result = mysqli_query($con, $sql) or die("Email Already Exists");
  echo 'Message has been sent.';
}
$con->close();
header('Location: index.html');
?>