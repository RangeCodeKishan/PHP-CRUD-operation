<?php
include 'db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Users List</title>
	<!-- internal bootstrap css -->
	<!-- <link rel="stylesheet" type="text/css" href="bootstrap.css"> -->
<!-- extrnal bootstrap css-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body class="bg-light">
	<div class="container mt-5">
		<div class="card shadow">
			<div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
				<h4 class="mb-0">User Details</h4>
				<a href="create.php" class="btn btn-light btn-sm fw-bold">+ Add New User</a>
			</div>
			<div class="card-body">
				<table class="table table-bordered table-striped table-hover">
					<thead class="table-dark">
						<tr>
							<th>ID</th>
							<th>First name</th>
							<th>Last name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Address</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="SELECT * FROM users ORDER BY id DESC";
							$result=$conn->query($sql);
							if ($result->num_rows>0) {
								while($row=$result->fetch_assoc()){
									echo "<tr>
										<td>{$row['id']}</td>
										<td>{$row['firstname']}</td>
										<td>{$row['lastname']}</td>
										<td>{$row['phone']}</td>
										<td>{$row['email']}</td>
										<td>{$row['address']}</td>
										<td>
											<a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm me-1'>Edit</a>
											<a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick='return confirm('Are you sure?')'>Delete</a>
										</td>
										</tr>";
									}
								}else{
									echo "<tr><td colspan='7' class='text-center'>No data found</tr>";
								}
								
								$conn->close();


									
							
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<!-- internal bootstrap JS -->
<!-- <script type="text/javascript" src="bootstrap.bundle.js"></script> -->
<!-- extrnal bootstrap JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>