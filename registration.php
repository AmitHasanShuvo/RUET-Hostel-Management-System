<?php

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<center>

<h1><marquee>Welcome to RUET Hostel management system</marquee></h1>
<title>Registration</title>
<link rel="stylesheet" href="css/style.css" />
</center>
</head>
<body>
<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_REQUEST['username'])){
		$username = stripslashes($_REQUEST['username']); // removes backslashes
		$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string
		$email = stripslashes($_REQUEST['email']);
		$email = mysqli_real_escape_string($con,$email);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con,$password);
	

        if($_FILES['image']['name'])
        {
        
		  $file=$_FILES['image']['name'];
		  $path="images/".$file;
		  $tmp=$_FILES['image']['tmp_name'];
		  move_uploaded_file($tmp, $path);
	    }

		$trn_date = date("Y-m-d H:i:s");
        $query = "INSERT into `users` (username, password, email, trn_date,photo) VALUES ('$username', '".md5($password)."', '$email', '$trn_date','$path')";
        $result = mysqli_query($con,$query);
        if($result){
            echo "<div class='form'><h3>You are registered successfully.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Registration</h1>
<form name="registration" action="" method="post" enctype="multipart/form-data">
<input type="text" name="username" placeholder="Username" required />
<input type="email" name="email" placeholder="Email" required />
<input type="password" name="password" placeholder="Password" required />
<input type="file" name="image" placeholder="Upload Your Photo" required />

<input type="submit" name="submit" value="Register" />
</form>
<br /><br />
 <br /><br />

</div>

<p>
<center>
For any kind of information,everybody is requested to <a href="contact.html">contact us </p>
</center>
<?php } ?>
</body>
</html>
