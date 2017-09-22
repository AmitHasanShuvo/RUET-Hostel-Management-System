<?php

//session_start();

include("../auth.php"); //include auth.php file on all secure pages ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

    <div style="background-color:white;color:black;padding:20px;">

<h1><center><marquee>Welcome to RUET Hostel Management System</marquee></center> </h1>
</div>

<title>Welcome Home</title>

<link rel="stylesheet" href="/hall/css/style.css" />
</head>
<body>

<div class="form">
<h2>Welcome <?php echo $_SESSION['username']; ?>!</h2>


<style>
.button {
    background-color: #4CAF50; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
    width: 150px;
    display: block;
}

.button1 {
    background-color: white; 
    color: black; 
    border: 2px solid #4CAF50;
}

.button1:hover {
    background-color: #4CAF50;
    color: white;
}

.button2 {
    background-color: white; 
    color: black; 
    border: 2px solid #008CBA;
}

.button2:hover {
    background-color: #008CBA;
    color: white;
}

.button3 {
    background-color: white; 
    color: black; 
    border: 2px solid #f44336;
}

.button3:hover {
    background-color: #f44336;
    color: white;
}

.button4 {
    background-color: white;
    color: black;
    border: 2px solid #e7e7e7;
}

.button4:hover {background-color: #e7e7e7;}

.button5 {
    background-color: white;
    color: black;
    border: 2px solid #555555;
}

.button5:hover {
    background-color: #555555;
    color: white;
}
</style>
<a href="../profile.php"><button class="button button3">Profile</button></a>
<button class="button button1"><a href="/hall/about.html">About</a></button>
<a href="payment.php?action=newPayment"><button class="button button2"> Payment</button></a>
<a href="meal.php"><button class="button button3"> Meal On/Off</button></a>
<button class="button button4"><a href="/hall/contact.html"> Contact Us </a></button>
<a href="/hall/logout.php"> <button class="button button5">Log Out</button></a>



<br /><br /><br /><br />
 <br /><br />
</div>

</body>
</html>
