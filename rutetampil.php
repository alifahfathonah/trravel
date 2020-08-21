<?php
include "connection.php";
if (isset($_POST['add'])) {
	$kode_rute=$_POST['kode_rute'];
	$nama_rute=$_POST['nama_rute'];

	$data=mysqli_query($mysqli, "INSERT INTO rute SET kode_rute='$kode_rute', nama_rute='$nama_rute'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$kode_rute=$_POST['kode_rute'];
	$nama_rute=$_POST['nama_rute'];

	$data=mysqli_query($mysqli, "UPDATE rute SET kode_rute='$kode_rute', nama_rute='$nama_rute' WHERE kode_rute='$kode_rute'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$kode_rute=$_POST['kode_rute'];
	$data=mysqli_query($mysqli, "DELETE FROM rute WHERE kode_rute='$kode_rute'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

$hasil = mysqli_query($mysqli, "SELECT max(kode_rute) as maxKode FROM rute");
$data  = mysqli_fetch_array($hasil);
$kodef = $data['maxKode'];
$noUrut = (int) substr($kodef, 1, 3);
$noUrut++;
$char = "R";
$kode = $char . sprintf("%03s", $noUrut);
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
<h1><p align="center">Data Rute</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<a href="ruteprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
		</div>
		<div class="col-2"></div>
		<div class="col-2">
		</div>
		</div>

<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
    	<th scope="col" width="5%">No</th>
      <th scope="col" width="25%">Kode</th>
      <th scope="col" width="60%">Nama Rute</th>
      <th scope="col" width="10%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$rute=mysqli_query($mysqli,"SELECT * FROM rute");
	$no=1;

	while ($show=mysqli_fetch_array($rute)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['kode_rute']; ?></td>
	 	<td><?php echo $show['nama_rute']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="ruteupdate.php?kode_rute=<?php echo $show['kode_rute']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="rutedelete.php?kode_rute=<?php echo $show['kode_rute']; ?>">Delete</a>
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
				<form action="menu.php?hal=rutetampil" method="POST">
					<div class="form-group row">
						<label for="kode_rute" class="col-sm-4 col-form-label">Kode</label>
						<div class="col-sm-8">
							<input type="text" name="kode_rute" class="form-control" required="" id="kode_rute" value="<?php echo $kode ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_rute" class="col-sm-4 col-form-label">Nama Rute</label>
						<div class="col-sm-8">
							<input type="text" name="nama_rute" class="form-control" required="" id="nama_rute">
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>

	</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#add').on('show.bs.modal', function (event) {
		var modal = $(this)
	});

      $('a#edit_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#edit').html(response);
              }
            });
        });

      $('a#delete_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#delete').html(response);
              }
            });
        });

       $('.data').DataTable();
    });
</script>

</body>
</html>