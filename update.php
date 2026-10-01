<?php
include 'db.php';

$id=$_GET['id'];

// Secure Fetch Operations
$stmt=$conn->prepare("SELECT * FROM users WHERE id=?");
$stmt->bind_param("i",$id);
$stmt->execute();
$result=$stmt->get_result();
$row=$result->fetch_assoc();
$stmt->close();

if($_SERVER["REQUEST_METHOD"]=="POST"){
	$name=$_POST['name'];
	$lastName=$_POST['lastName'];
	$phoneNo=$_POST['phoneNo'];
	$email=$_POST['email'];
	$address=$_POST['address'];

	$update_stmt=$conn->prepare("UPDATE users SET firstname=?, lastname=?, phone=?, email=?, address=? WHERE id=?");
	$update_stmt->bind_param("sssssi",$name, $lastName, $phoneNo, $email, $address, $id);

	if ($update_stmt->execute()) {
		header("Location:read.php");
		exit();
	}else{
		echo "<div class='alert alert-danger'>Error updating record:".$update_stmt->error."</div>";
	}
	$update_stmt->close();
	$conn->close();
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Edit User</title>
	<!-- internal bootstrap CSS-->
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
<!-- extrnal bootstrap CSS-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body class="bg-light">
	<div class="container mt-5">
		<div class="row justify-content-center">
			<div class="col-md-6">
				<div class="card shadow">
					<div class="card-header bg-warning text-dark">
						<div class="mb-0">Edit User Details</div>
					</div>
					<div class="card-body">
						<form action="update.php?id=<?php echo $id; ?>" method="POST">
							<div class="mb-3">
								<label class="form-label">First Name</label>
								<input type="text" name="name" class="form-control" value="<?php echo $row['firstname'] ?>" required>
							</div>
							<div class="mb-3">
								<label class="form-label">Last Name</label>
								<input type="text" name="lastName" class="form-control" value="<?php echo 
								$row['lastname'] ?>" required>
							</div>
							<div class="mb-3">
								<label class="form-label">Phone no</label>
								<input type="text" name="phoneNo" class="form-control" value="<?php echo 
								$row['phone'] ?>" required>
							</div>
							<div class="mb-3">
								<label class="form-label">Email Id</label>
								<input type="email" name="email" class="form-control" value="<?php echo $row['email'];?>">
							</div>
							<div class="mb-3">
								<label class="form-label">Address</label>
								<textarea class="form-control" rows="3" name="address" required><?php echo $row['address'] ?></textarea>
							</div>
							<button type="submit" class="btn btn-warning w-100">Update</button>
							<a href="read.php" class="btn btn-secondary w-100 mt-2">Cancel</a>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- internal bootstrap JS-->
	<!-- <script type="text/javascript" src="bootstrap.bundle.js"></script> -->
<!-- extrnal bootstrap JS-->
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>