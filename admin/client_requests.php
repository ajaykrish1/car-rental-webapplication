<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<title>Admin Home</title>
	<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
	
</head>
<body>
<!-- Header -->
<div id="header">
	<div class="shell">

		<?php
			include 'menu.php';
		?>
	</div>
</div>

<div id="container">
	<div class="shell">

		<div class="small-nav">
			<a href="index.php">Dashboard</a>
			<span>&gt;</span>
			Client Requests
		</div>

		<br />

		<div id="main">
			<div class="cl">&nbsp;</div>

			<div id="content">

				<div class="box">
					<!-- Box Head -->
					<div class="box-head">
						<h2 class="left">Client Requests</h2>
						<div class="right">
							<label>search requests</label>
							<input type="text" class="field small-field" />
							<input type="submit" class="button" value="search" />
						</div>
					</div>

					<div class="table">
						<table width="100%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<th width="13"><input type="checkbox" class="checkbox" /></th>
								<th>Client Name</th>
								<th>Client Phone</th>
								<th>Car Booked</th>
								<th>Gpay</th>
								<th>Status</th>
								<th width="110" class="ac">Content Control</th>
							</tr>
							<?php
								include '../includes/config.php';
								$select = "SELECT * FROM (SELECT hire.hire_id,client.client_id,client.fname,client.phone from client JOIN hire ON client.client_id=hire.client_id)t1 INNER JOIN (SELECT hire.hire_id,cars.car_id,cars.car_name,cars.hire_cost,hire.status from cars JOIN hire ON cars.car_id=hire.car_id)t2 where t1.hire_id =t2.hire_id";

									
								$result = $conn->query($select);
								while($row = $result->fetch_assoc()){
							?>
							<tr>
								<td><input type="checkbox" class="checkbox" /></td>
								<td><h3><a href="#"><?php echo $row['fname'] ?></a></h3></td>
								<td><h3><a href="#"><?php echo $row['phone'] ?></a></h3></td>
								<td><?php echo $row['car_name'] ?></td>
								<td><a href="#"><?php echo $row['hire_cost'] ?></a></td>
								<td><a href="#"><?php echo $row['status'] ?></a></td>
								<td><a href="approve.php?id=<?php print $row['client_id'];?>&p_id=<?php print $row['hire_id'];?>" class="ico del">Approve</a><a href="#" class="ico edit">Delete</a></td>
							</tr>
							<?php
								}
							?>
						</table>


						<!-- Pagging -->
						<div class="pagging">
							<div class="left">Showing 1-12 of 44</div>
							<div class="right">
								<a href="#">Previous</a>
								<a href="#">1</a>
								<a href="#">2</a>
								<a href="#">3</a>
								<a href="#">4</a>
								<a href="#">245</a>
								<span>...</span>
								<a href="#">Next</a>
								<a href="#">View all</a>
							</div>
						</div>
						<!-- End Pagging -->

					</div>
					<h2><input type="submit" onclick="window.print()" value="Print Here" /></h2>

				</div>
				<!-- End Box -->

			</div>
			<!-- End Content -->



			<div class="cl">&nbsp;</div>
		</div>
		<!-- Main -->
	</div>
</div>
<!-- End Container -->

<!-- Footer -->

</body>
</html>
