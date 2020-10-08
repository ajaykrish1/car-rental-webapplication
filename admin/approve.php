<?php
	include '../includes/config.php';

	$query1 = "UPDATE client SET status = 'Approved' WHERE client_id = '$_GET[id]'";
	$query = "UPDATE hire SET status = 'Approved' WHERE hire_id = '$_GET[p_id]'";
	$result = $conn->query($query);
	$result1 = $conn->query($query1);
	if($result === TRUE){
		echo 'Request has Successfully been Approved';
	?>
		<meta content="4; client_requests.php" http-equiv="refresh" />
	<?php
	}
?>
