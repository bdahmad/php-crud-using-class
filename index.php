<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="all.min.css">
	<!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> -->
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
					if(isset($_POST['saveBtn'])){
						echo $objStudent->insert($_POST);					}
				?>
				<form action="" method="POST">
					<div class="form-group my-3">
						<label for="name">Name</label>
						<input type="text" id="name" name="name" placeholder="enter your name" class="form-control my-3">
					</div>
					
					<div class="form-group my-3">
						<label for="phone">Phone</label>
						<input type="text" id="phone" name="phone" placeholder="enter your phone" class="form-control my-3">
					</div>
					<div class="form-group my-3">
						<label for="email">Email</label>
						<input type="text" id="email" name="email" placeholder="enter your email" class="form-control my-3">
					</div>
					<div class="form-group my-3">
						<label for="status">Status</label>
						<select name="status" id="status" class="form-control my-3 form-select">
							<option value="">--select--</option>
							<option value="1">Active</option>
							<option value="0">Inactive</option>
						</select>
					</div>
					<button class="btn btn-primary" name="saveBtn">Save</button>
				</form>
			</div>
			<div class="col-md-8 py-3 mt-5">
				<table border="1" class="table table-striped  " id="myTable">
					<thead>
						<tr>
							<th>#Sl</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$data = $objStudent->view();
							if($data->num_rows>0){
								while($arData = $data->fetch_assoc()){
									echo '<tr>
										<td>'.$arData['student_id'].' </td>
										<td>'.$arData['Name'].' </td>
										<td>'.$arData['Phone'].' </td>
										<td>'.$arData['Email'].' </td>';

										?>
										<td><?php
										if($arData['Status'] == 1){
											  ?> <a href="index.php?activeId=<?php echo $arData['student_id'];  ?>" class="btn btn-sm btn-success">Active</a>
											  
											  <?php
											  if(isset($_GET['activeId'])){
												$id=$_GET['activeId'];
												$objStudent->active($id);
												header('location: index.php');
											  }
										}else{
											?>
											<a href="index.php?inActiveId=<?php echo $arData['student_id'];  ?>" class="btn btn-sm btn-warning">Inactive</a>
										<?php
											if(isset($_GET['inActiveId'])){
												$id=$_GET['inActiveId'];
												$objStudent->inActive($id);
												header('location: index.php');
											  }

										}
										if(isset($_GET['deleteId'])){
											$id=$_GET['deleteId'];
											if($objStudent->delete($id)){
												echo "delete data successfully";
												header('location: index.php');
											}
											else{
												echo "delete data fail";
											}


										}
										?> </td>
										
										<td>
											<a href="update.php?updateId=<?php echo $arData['student_id'];?>" class="btn btn-sm btn-info"><i class="fa fa-edit"></i></a>
											
											<button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#delete<?php echo $arData['student_id'];?>"><i class="fa fa-trash"></i></button>
										</td>

										<!-- Modal -->
<div class="modal fade" id="delete<?php echo $arData['student_id'];?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <a href="index.php?deleteId=<?php echo $arData['student_id'];?>" class="btn btn-sm btn-danger">Yes</a>
      </div>
    </div>
  </div>
</div>
									<?php
									
									
								}
							}
							else{
								echo '<tr>
								<td colspan="6" class="text-center">Data not found</td>
							</tr>';
							}
						?>
						
						
					</tbody>
					<tfoot>
						<tr>
							<th>#Sl</th>
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Status</th>
							<th>Action</th>
						</tr>
					</tfoot>

				</table>
			</div>
		</div>
	</div>

	<script src="js/jQuery.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/all.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="js/main.js"></script>
	<script>
		let table = new DataTable('#myTable');
	</script>
</body>
</html>