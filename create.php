<?php 
include 'db.php'; 
if($_SERVER['REQUEST_METHOD']=="POST"){
	$name=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$phone=$_POST['phone'];
	$email=$_POST['email'];
	$address=$_POST['address'];

	// prepare statment Execution Structure
	$stmt=$conn->prepare("INSERT INTO users(firstname, lastname, phone, email, address) VALUES(?,?,?,?,?)");
	$stmt->bind_param("sssss",$name, $lastname, $phone, $email, $address);

	if ($stmt->execute()) {
		header("Location:read.php");
		exit();
	}else{
		echo "<div class='alert alert-danger'>Error:".$stmt->error."</div>";
	}
	$stmt->close();
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Add User</title>
	<!-- internal bootstrap CSS-->
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
<!-- extrnal bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card-header bg-success text-white">
					<h4 class="mb-0">Add New User</h4>
				</div>
				<div class="card-body">
					<form action="create.php" method="POST">
						<div class="mb-3">
							<label class="form-label">First name</label>
							<input type="text" name="firstname" class="form-control" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Last name</label>
							<input type="text" name="lastname" class="form-control" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Phone number</label>
							<input type="text" name="phone" class="form-control" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Email ID</label>
							<input type="email" name="email" class="form-control" required>
						</div>
						<div class="mb-3">
							<label class="form-label">Address</label>
							<textarea name="address" class="form-control" rows="3" required></textarea>
						</div>
						<button type="submit" class="btn btn-success w-100">Submit</button>
						<a href="read.php" class="btn btn-secondary w-100 mt-2">Back to List
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- <script type="text/javascript" src="bootstrap.bundle.js"></script> -->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>