<?php

  require_once("db.php");
  session_start();

    if(isset($_SESSION['username']))
    {
    	$user=$_SESSION['username'];
    }
    else
    {
    	header("Location:login.php");
    }


    $sql="SELECT * from users where username='$user'";
    $send=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($send);




?>

<fieldset>
<legend>Profile</legend>
<center><img src="<?php echo "$row[photo]";  ?>" width="200px"; height="200px"><br><br>
<b>Name : <?php echo "$row[username]";  ?></b><br><br>
<b>Email : <?php echo "$row[email]";  ?></b><br><br>
<b>Join Date : <?php echo "$row[trn_date]";  ?></b><br></center>




</fieldset>