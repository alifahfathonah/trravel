<?php
include"connection.php";
if (isset($_POST['add'])) {
	$no_kendaraan=$_POST['no_kendaraan'];
	$merk=$_POST['merk'];
	$tipe=$_POST['tipe'];
	$jumlah_kursi=$_POST['jumlah_kursi'];

	$data=mysqli_query($mysqli, "INSERT INTO armada SET no_kendaraan='$no_kendaraan', merk='$merk', tipe='$tipe', jumlah_kursi='$jumlah_kursi'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$no_kendaraan=$_POST['no_kendaraan'];
	$merk=$_POST['merk'];
	$tipe=$_POST['tipe'];
	$jumlah_kursi=$_POST['jumlah_kursi'];

	$data=mysqli_query($mysqli, "UPDATE armada SET no_kendaraan='$no_kendaraan', merk='$merk', tipe='$tipe', jumlah_kursi='$jumlah_kursi' WHERE no_kendaraan='$no_kendaraan'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$no_kendaraan=$_POST['no_kendaraan'];
	$data=mysqli_query($mysqli, "DELETE FROM armada WHERE no_kendaraan='$no_kendaraan'") or die("data salah: ".mysqli_error($mysqli));
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
<h1><p align="center">Data Armada</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="armadaadd.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="armadaprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
		</div>
		<div class="col-2"></div>
		<div class="col-2"></div>
		</div>

<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
    	<th scope="col">No Kendaraan</th>
		<th scope="col">Merk</th>
		<th scope="col">Tipe</th>
		<th scope="col">Jumlah Kursi</th>
     	<th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$armada=mysqli_query($mysqli,"SELECT * FROM armada");
	$no=1;

	while ($show=mysqli_fetch_array($armada)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['no_kendaraan']; ?></td>
	 	<td><?php echo $show['merk']; ?></td>
	 	<td><?php echo $show['tipe']; ?></td>
	 	<td><?php echo $show['jumlah_kursi']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="armadaupdate.php?no_kendaraan=<?php echo $show['no_kendaraan']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="armadadelete.php?no_kendaraan=<?php echo $show['no_kendaraan']; ?>">Delete</a>
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
<!-- <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div> -->
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
				<form action="menu.php?hal=armadatampil" method="POST">
					<div class="form-group row">
						<label for="no_kendaraan" class="col-sm-4 col-form-label">No Kendaraan</label>
						<div class="col-sm-8">
							<input type="text" name="no_kendaraan" class="form-control" required="" id="no_kendaraan">
						</div>
					</div>
					<div class="form-group row">
						<label for="merk" class="col-sm-4 col-form-label">Merk</label>
						<div class="col-sm-8">
							<input type="text" name="merk" class="form-control" required="" id="merk" >
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
						<div class="col-sm-8">
							<input type="text" name="tipe" class="form-control" required="" id="tipe" >
						</div>
					</div>
					<div class="form-group row">
						<label for="jumlah_kursi" class="col-sm-4 col-form-label">Jumlah Kursi</label>
						<div class="col-sm-8">
							<input type="number" name="jumlah_kursi" class="form-control" required="" id="jumlah_kursi" >
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