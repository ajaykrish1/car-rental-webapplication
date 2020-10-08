<!DOCTYPE html>
<html lang="en">
<head>
	<title>Car Rental</title>
	<meta charset="utf-8">
	<meta name="author" content="pixelhint.com">
	<meta name="description" content="La casa free real state fully responsive html5/css3 home page website template"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<section class="">
		<?php
			include 'header.php';
		?>

			<section class="caption">
				<h2 class="caption" style="text-align: center">Find You Dream Cars For Hire</h2>
				<h3 class="properties" style="text-align: center">Range Rovers - Mercedes Benz - Landcruisers</h3>
			</section>
	</section><!--  end hero section  -->





	<section class="listings">
		<div class="wrapper">
			<ul class="properties_list">
				<h3 style="text-decoration: underline">Make Payments Here</h3>
				<h5>Gpay Number: 00000</h5>
				<h6>Aadhar Number</h6>
				<form method="post">
					<table>
						<tr>
							<td>Gpay Number:</td>
							<td><input type="tel" name="mpesa" required pattern="[0-9]{5}"  title="should be 5 digits"></td>
						</tr>
						<tr>
							<td>Aadhar Number:</td>
							<td><input type="text" name="id_no" required pattern="[0-9]{10}" title="should be 10 digits"></td>
						</tr>

						<tr>
							<td colspan="2" style="text-align:right"><input type="submit" name="pay" value="Submit Details"></td>
						</tr>
					</table>
				</form>
				<?php
						if(isset($_POST['pay'])){
							include 'includes/config.php';
							$mpesa = $_POST['mpesa'];
							$email=$_SESSION['email'];
							$client_id=$_SESSION['client_id'];
							

							$qry = "UPDATE client SET mpesa = '$mpesa', status = 'Requested' WHERE email = '$email'";
							$qry1 = "INSERT INTO hire (client_id,car_id,status)
							VALUES('$client_id','$_GET[id]','Pending')";
							$result = $conn->query($qry);
							$result1 = $conn->query($qry1);
							if($result == TRUE){
								echo "<script type = \"text/javascript\">
											alert(\"Payment Successfully Done. Wait for Admin Approval\");
											window.location = (\"wait.php\")
											</script>";
							} else{
								echo "<script type = \"text/javascript\">
											alert(\"Registration Failed. Try Again\");
											window.location = (\"pay.php\")
											</script>";
							}
						}

					  ?>
			</ul>

		</div>
	</section>	<!--  end listing section  -->



</body>
</html>
