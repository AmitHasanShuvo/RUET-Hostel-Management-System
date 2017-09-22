<?php

    session_start();

    if(isset($_SESSION['username']))
    {
    	$user=$_SESSION['username'];
    }
    else
    {
    	header("Location:../login.php");
    }
	//**********Connect to database****************
	$conn = mysqli_connect("localhost","root","","register");
	if (mysqli_connect_errno())
	{
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	//**********Connect to database****************

	$table = $conn->query("SELECT * FROM `payment_info`");
?>



<!DOCTYPE html>
<html>
	<link rel="stylesheet" href="/hall/student/style.css">
<head>
	<title>Meal on/off</title>
	 <script src="js/jspdf.js"></script>
	<script src="js/jquery-2.1.3.js"></script>
	<script src="js/pdfFromHTML.js"></script>
	<style>
     
     table,th,tr,td
     {
     	border: 1px solid black;
     	border-collapse: collapse;
     	padding:10px;
       	max-width: 400px;
     }
     caption
     {
     	background-color: blue;
     	color: white;
     	padding: 5px;
     }
     .off
     {
     	background-color: rgb(198,208,220);
     }



	</style>
</head>
<body><h1><center>Meal On/Off</center></h1>
	<p><center>
		<form action="meal.php?action=true" method="post" id="main">
			Start Date: 
			<input type="date" name="start"  required></input>
			End Date: 
			<input type="date" name="end"  required></input></br>
			<button type="submit" name="on" value="on">On</button> 
			<button type="submit" name="off" value="off">Off</button> 
		</form>
		</center>
	</p>
	<p>
<center>
For any kind of information,everybody is requested to <a href="/hall/contact.html">contact us </a></center></p>

</body>
</html>

<?php
	if(isset($_GET['action']))
	{
		if(isset($_POST['on']))
		{
			echo "
				<script>
					document.getElementById('main').innerHTML = \"\";	
				</script>
			";

			$start = $_POST['start'];
			$end = $_POST['end'];
			
			$sql="INSERT into meal VALUES('','$user','$start','$end','on')";
			$send=mysqli_query($conn,$sql);


			echo "<center>Your meal has been started form ".$start." to ".$end."</center><br>";

			

			//header("Refresh:10; url=/hall/student/index.php");
		}

		if(isset($_POST['off']))
		{
			echo "
				<script>
					document.getElementById('main').innerHTML = \"\";	
				</script>
			";

			$start = $_POST['start'];
			$end = $_POST['end'];

			$sql="INSERT into meal VALUES('','$user','$start','$end','off')";
			$send=mysqli_query($conn,$sql);

			echo "<center>Your meal has been off form ".$start." to ".$end."</center><br>";

			//header("Refresh:3; url=/hall/student/meal.php");
		}
        



	}

   ?>
     <div style="overflow-x: auto;">
	 <center><table colspan="2" rowspan="2">
         <caption><?php echo "$user's"; ?> Meal Details</caption>
         <th>Id</th>
         <th>Name</th>
         <th>From</th>
         <th>To</th>
         <th>Status</th>

       <?php
       


        
		$query = "SELECT * from meal where name='$user' ORDER BY id DESC";
		$snd=mysqli_query($conn,$query);

		$output="";

		while($row=mysqli_fetch_array($snd))
		{
			if($row['type']=="off")
			{
                $off="off";
			}
			else
			{
				$off="";
			}


            $output .="<tr class=\"$off\"><td>$row[id]</td><td>$row[name]</td><td>$row[fromm]</td><td>$row[too]</td><td>$row[type]</td></tr>";

			echo "<tr class=\"$off\"><td>$row[id]</td><td>$row[name]</td><td>$row[fromm]</td><td>$row[too]</td><td>$row[type]</td></tr>";
		}


		?>

		</table></center>

		</div><br>

<?php

if(isset($_GET['create']))
{



require_once("../tcpdf/tcpdf.php");


    	  
           	       
// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('RUET Hall Management');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');



// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, 'RUET Hall Management', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);



// ---------------------------------------------------------

// set font
$pdf->SetFont('helvetica', '', 12);

$pdf->AddPage();


        $content = '';
		$content .='<table border="1" cellspacing="0" cellpadding="5">
         <h3 align="center"><thead>'.$user.'\'s Meal Details</thead></h3>
         <tr>
         <th>Id</th>
         <th>Name</th>
         <th>From</th>
         <th>To</th>
         <th>Status</th>
         </tr>';


        $content .=$output;
        $content .='</table>';

$pdf->writeHTML($content);

ob_end_clean();

// close and output PDF document
$pdf->Output('RUET Hall Meal Information', 'I');
        

           	 

           }


		?>

		<br><center><a href="meal.php?create=pdf">Download PDF</a></center>

		