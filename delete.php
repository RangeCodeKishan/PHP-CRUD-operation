<?php
include 'db.php';

if (isset($_GET['id'])) {
	$id=$_GET['id'];
	// prepate statement Execution safeguard
	$stmt=$conn->prepare("DELETE FROM users WHERE id=?");
	$stmt->bind_param("i",$id);

	if ($stmt->execute()) {
		header("Location:read.php");
		exit();
	}else {
		echo "Error deleting record:".$stmt->error;
	}
	$stmt->close();
	$stmt->close();
}else{
	header("Location:read.php");
	exit();
}
?>