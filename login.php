<?php
			session_start();
			$_SESSION['Email']=$_POST['Email'];
			$USERN=$_POST['Email'];
			$PASSW=$_POST['password'];
			$con = new mysqli('localhost','root','','performancepro');
			$Validation="SELECT Validation FROM connection_db WHERE Email='".$USERN."' AND Password= '".md5($PASSW)."'";
			
			$id="SELECT id FROM connection_db WHERE Email='".$USERN."' AND Password= '".md5($PASSW)."'";
			$validation = mysqli_query($con, $Validation);
			$id=mysqli_query($con,$id);
			$id_user = mysqli_fetch_assoc($id);
			$valid = mysqli_fetch_assoc($validation);
			$_SESSION['id']=$id;
			if($id_user&&$valid['Validation']==1){
			header("refresh:0;url=client_room.html");
			}
			else{
			echo("<b>Wrong Password Or Email <a href='Register.html'/>Register Here
				<br><a href='Forgotpass.html'/> Forgotpass");
			session_destroy();
			}

         ?>
