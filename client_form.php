<?php
                session_start();
                    $title=$_POST['title'];
                    $first_name=$_POST['first_name'];
                    $gender=$_POST['gender'];
                    $last_name=$_POST['last_name'];
                    $contact_pref=$_POST['confirm_type'];
                    $email=$_POST['email'];
                    $contact_hour=$_POST['hour_appointment'];
                    $phone_number=$_POST['phone_number'];
                    $course_type=$_POST['course_type'];
                    $con = new mysqli('localhost','root','','performancepro');
 $sql="INSERT INTO form_info_db(title,first_name,last_name,email,phone_number,course_type,gender,contact_pref,contact_hour) VALUES('".$title."','".$first_name."','".$last_name."','".$email."','".$phone_number."','".$course_type."','".$gender."','".$contact_pref."','".$contact_hour."')";
                    $result = mysqli_query($con, $sql) or die("Connection Probleme");
                $con->close();
            header('Location: thanks.html');
                    



?>