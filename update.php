<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="all.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="style.css">
	<title>Crud Operation Using Class</title>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-4 py-3 mt-5 border ml-5 border-info rounded">
				<?php
					include 'Student.php';
					$objStudent = new Student;
                    $id = $_GET['updateId'];
                    $data = $objStudent->find($id);
                    $data = $data->fetch_assoc();
					if(isset($_POST['updateBtn'])){
                        
						echo $objStudent->update($_POST,$id);					}
				?>
				<form action="" method="POST">
					<div class="form-group my-3">
						<label for="name">Name</label>
						<input type="text" id="name" value="<?php echo $data['Name'];?>" name="name" placeholder="enter your name" class="form-control my-3">
					</div>
					
					<div class="form-group my-3">
						<label for="phone">Phone</label>
						<input type="text" id="phone" name="phone" value="<?php echo $data['Phone'];?>" placeholder="enter your phone" class="form-control my-3">
					</div>
					<div class="form-group my-3">
						<label for="email">Email</label>
						<input type="text" id="email" value="<?php echo $data['Email'];?>" name="email" placeholder="enter your email" class="form-control my-3">
					</div>
					<div class="form-group my-3">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control my-3 form-select">
							<option value=""><?php if($data['Status']){
                                echo "Active";
                            }
                            else{
                                echo "Inactive";
                            }  ?></option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<button class="btn btn-primary" name="updateBtn">Update</button>
				</form>
			</div>
		</div>
	</div>
	


	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/all.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		//let table = new DataTable('#myTable');
	</script>
</body>
</html>