<?php
include "connection.php";
if (isset($_POST['add'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
	$peran=$_POST['peran'];

	$data=mysqli_query($mysqli, "INSERT INTO pengguna SET username='$username', password='$password', nama='$nama', peran='$peran'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$username=$_POST['username'];
	$password=$_POST['password'];
	$nama=$_POST['nama'];
	$peran=$_POST['peran'];

	$data=mysqli_query($mysqli, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', peran='$peran' WHERE username='$username'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$username=$_POST['username'];
	$data=mysqli_query($mysqli, "DELETE FROM pengguna WHERE username='$username'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid bg-primary text-black">
<div class="container-fluid">
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-xl-8 mx-auto">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Data Pengguna</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="penggunaadd.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="penggunaprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
		</div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		</div>

<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
    	<th scope="col" width="5%">No</th>
      <th scope="col">Username</th>
      <th scope="col">Password</th>
      <th scope="col">Full Name</th>
      <th scope="col">Role</th>
      <th scope="col" width="10%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$pengguna=mysqli_query($mysqli,"SELECT * FROM pengguna");
	$no=1;

	while ($show=mysqli_fetch_array($pengguna)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['username']; ?></td>
	 	<td><?php echo $show['password']; ?></td>
	 	<td><?php echo $show['nama']; ?></td>
	 	<td><?php echo $show['peran']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="penggunaupdate.php?username=<?php echo $show['username']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="penggunadelete.php?username=<?php echo $show['username']; ?>">Delete</a>
				</div>
			</div>
	 	</td>
	 </tr>
	 <?php $no++; } ?>
  </tbody>
</table>
</div>

</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-success text-white">
				<h4 class="modal-title" id="exampleModalLabel">Add Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="menu.php?hal=penggunatampil" method="POST">
					<div class="form-group row">
						<label for="username" class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" name="username" class="form-control" required="" id="username">
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-4 col-form-label">Password</label>
						<div class="col-sm-8">
							<input type="text" name="password" class="form-control" required="" id="password">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Full Name</label>
						<div class="col-sm-8">
							<input type="text" name="nama" class="form-control" required="" id="nama">
						</div>
					</div>
					<div class="form-group row">
						<label for="peran" class="col-sm-4 col-form-label">Role</label>
						<div class="col-sm-8">
							<input type="text" name="peran" class="form-control" required="" id="peran">
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" name="add" value="Add" class="btn btn-success">
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

	</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
  	$('#add').on('show.bs.modal', function (event) {
		var modal = $(this)
	});
    // $('a#add_data').click(function(){
    //       var url=$(this).attr('href');
    //       $.ajax({
    //           url:url,
    //           success:function(response){
    //             $('#add').html(response);
    //           }
    //         });
    //     });

    $('a#edit_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#edit').html(response);
              }
            }
          );
        }
      );

    $('a#delete_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#delete').html(response);
              }
            }
          );
        }
      );

    $('.data').DataTable();  
  });
</script>

</body>
</html>