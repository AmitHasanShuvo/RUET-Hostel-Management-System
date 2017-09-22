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
<head>
	<title>Payment</title>
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
     tr:nth-child(even)
     {
     	background-color: rgb(198,208,220);
     }



	</style>
</head>
<h1><center>Payment</center></h1>
<body>
	<?php
		if(isset($_GET['action']) || isset($_GET['create']))
		{
			$actn= $_GET['action'];

			if($actn=="newPayment")
			{
				echo "
				<center>
					<form action=\"/hall/student/payment.php?action=payDone\" method=\"post\">
						<input type= \"text\" name=\"roll\" placeholder=\"Roll\" required></br>
						<select id=\"hall_name\" name=\"hall_name\" style=\"width:150px;\">
							<option selected=\"true\" disabled>Hall name</option>
							<option value=\"Bangabondhu Sheikh Mujibur Rahman Hall\">Bangabondhu Sheikh Mujibur Rahman Hall</option>
							<option value=\"Deshratna Sheikh Hasina Hall\">Deshratna Sheikh Hasina Hall</option>
							<option value=\"Shahid Abdul Hamid Hall\">Shahid Abdul Hamid Hall</option>
							<option value=\"Shahid Lieutenant Salim hall\">Shahid Lieutenant Salim hall</option>
							<option value=\"Shahid President Ziaur Rahman Hall\">Shahid President Ziaur Rahman Hall</option>
							<option value=\"Shahid Shahidul Islam Hall\">Shahid Shahidul Islam Hall</option>
							<option value=\"Tin Shed Hall (extension of Shahid Sahidul Islam Hall)\">Tin Shed Hall (extension of Shahid Sahidul Islam Hall)</option>
						<select>
						<input type= \"text\" name=\"room\" placeholder=\"Room No.\" required></br>
						<input type= \"text\" name=\"amount\" placeholder=\"Amount\" required></br>
						<select id=\"method\" name=\"method\">
							<option selected=\"true\" disabled>Payment method</option>
							<option value=\"Via Bank\">Via Bank</option>
							<option value=\"Bkash Mobile banking\">Bkash Mobile banking</option>
							<option value=\"DBBL Mobile banking\">DBBL Mobile banking</option>
						<select></br>
						<input type= \"text\" name=\"tran_id\" placeholder=\"Transaction ID.\" required></br></br>

						<button type= \"reset\" name=\"reset\" value=\"reset\">Reset</button>
						<button type= \"submit\" name=\"submit\" value=\"submit\">Submit</button>
						<input type= \"button\" Value=\"Cancel\" onclick=\"history.back();\"></input>
					</form> </center><br><br>
				";
			}

			if($actn=="payDone")
			{
				date_default_timezone_set("Asia/Dhaka");
				$date = date("Y/m/d");
				$time = date("h:i:sa");

				$roll = $_POST['roll'];
				$hall = $_POST['hall_name'];
				$room = $_POST['room'];
				$amount = $_POST['amount'];
				$pay_method = $_POST['method'];
				$tran_id = $_POST['tran_id'];

				if($conn->query("INSERT INTO `payment_info`(`date`, `time`, `roll`, `hall`, `room`, `ammount`, `payment_by`, `tran_id`,`name`) VALUES ( '$date' , '$time' , '$roll' , '$hall' , '$room' , '$amount' , '$pay_method' , '$tran_id','$user' )"))
				{
					echo "<center><h2>Payment request successfully accepted. It will be confirmed as soon as possible. Thnak you!</center><h2>";
				}

				else
					echo "Your payment request can not be processed right now.";

				//header("Refresh:10; url=/hall/student/index.php");
			}

			?>

         <div style="overflow-x: auto;">
         <center><table colspan="2" rowspan="2">
         <caption><?php echo "$user's"; ?> Payment Info</caption>
         <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Date</th>
         <th>Time</th>
         <th>Roll</th>
         <th>Room</th>
         <th>Amount</th>
         <th>Payment By</th>
         <th>Transaction ID</th>
         </tr>

         <?php
			$sql="SELECT * from payment_info WHERE name='$user' ORDER BY id";
			$send=mysqli_query($conn,$sql);
			$output="";
			while($row=mysqli_fetch_array($send))
			{
              


            $output .="<tr><td>$row[id]</td><td>$row[name]</td><td>$row[date]</td><td>$row[time]</td><td>$row[roll]</td><td>$row[room]</td><td>$row[ammount]</td><td>$row[payment_by]</td><td>$row[tran_id]</td></tr>";

			echo "<tr><td>$row[id]</td><td>$row[name]</td><td>$row[date]</td><td>$row[time]</td><td>$row[roll]</td><td>$row[room]</td><td>$row[ammount]</td><td>$row[payment_by]</td><td>$row[tran_id]</td></tr>";
			}

			echo "</table></div><br>";
		}
	?>

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
         <h3 align="center"><thead>'.$user.'\'s PayMent Info</thead></h3>
         <tr>
         <th>Id</th>
         <th>Name</th>
         <th>Date</th>
         <th>Time</th>
         <th>Roll</th>
         <th>Room</th>
         <th>Amount</th>
         <th>Payment By</th>
         <th>Transaction ID</th>
         </tr>';


        $content .=$output;
        $content .='</table>';

$pdf->writeHTML($content);

ob_end_clean();

// close and output PDF document
$pdf->Output('RUET Hall Payment Info', 'I');
        

           	 

           }


		?>

		<br><center><a href="payment.php?create=pdf">Download PDF</a></center>



	<p><center>For more information,everybody is requested to <a href="/hall/contact.html"> contact us </a></center></p>
</body>
</html>