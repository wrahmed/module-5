<?php
$servername = "localhost";
$username = "root";
$password = "";
$datab = "test";

$conn = new mysqli($servername, $username, $password, $datab);

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) . ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST["fname"]) && !empty($_POST["fname"])) 
	{
		$fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $date = $_POST["date"];
        $time = $_POST["time"];
        $adults = $_POST["adults"];
        $children = $_POST["children"];

        $stmt = $conn->prepare("INSERT INTO infos (Nom, Prenom, Email, Phone, DateR, TimeR, NbAdult, NbChild) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssii", $fname, $lname, $email, $phone, $date, $time, $adults, $children);
        $stmt->execute();

        // Redirection après l'insertion des données
        header("Location: webForm.php");
        exit(); // Terminer le script après la redirection
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>David Chu : Book a table  </title>
	<!-- Meta tags -->
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="robots" content="noindex">
	<meta name="keywords" content="Table Booking Form Responsive Widget, Audio and Video players, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design">
	<link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
  <link href="webStyle.css" rel="stylesheet">
  <script src="js/sweetalert.js"></script>
  
</head>
<body>
<div class="pull-right toggle-right-sidebar">
<span class="fa title-open-right-sidebar tooltipstered fa-angle-double-right"></span>
</div>
	<h1 class="header-w3ls">
		Table Booking Form</h1>
		<!---728x90--->

	<div class="appointment-w3">
		<form id="form" method="post">
			<div class="personal">			
				<div class="main">
					<div class="form-left-w3l">
						<input type="text" class="top-up" name="fname" placeholder="Fist Name" required="">
					</div>
					<div class="form-left-w3l">
						<input type="text" class="top-up" name="lname" placeholder="Last Name" required="">
					</div>
					<div class="form-left-w3l">
						<input type="email" name="email" placeholder="Email" required="">
					</div>
					<div class="form-right-w3ls ">
						<input class="buttom" type="text" name="phone" placeholder="Phone Number" required="">
						<div class="clearfix"></div>
					</div>
				</div>				
			</div>
			<div class="information">
				<div class="main">					
					<div class="form-left-w3l">
						<input id="datepicker" name="date" type="date" placeholder="Booking Date &" required="" style="margin:5px auto ">
						<input type="time" id="timepicker" name="time" class="timepicker form-control hasWickedpicker" placeholder="Time">
						<div class="clear"></div>
					</div>
				</div>			
				<div class="main">
					<div class="form-left-w3l">
						<select class="form-control" name="adults">
					<option value="">Number of Adults</option>
						<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select>
					</div>
					<div class="form-right-w3ls">
						<select class="form-control" name="children">
					<option value="">Number of Children</option>
                    <option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					</select>
					</div>
				</div>
			</div>			
			<div class="btnn">
				<input type="submit" value="Reserve a Table" name="btnSubmit" onclick="SwAlert()">
			</div>
		</form>
	</div>
	<div class="copy">
		<p>&copy;2023 IAGI's. | All Rights Reserved |</p>
	</div>

</body>
<script src="js/jquery-3.7.0.js"></script>
<script>
	document.getElementById("form").addEventListener("click", function(event){
  event.preventDefault()
});
    function SwAlert()
	 {
		swal ({
			icon:'success',
			title:'Table Booked !',
			texte : 'Welcome',
		}).then((value) => {
			console.log("notif");
			document.getElementById("form").submit();
});
	 }
</script>
</html>