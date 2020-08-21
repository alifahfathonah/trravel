<?php
include "connection.php";
if (isset($_POST['add'])) {
	$kodef=$_POST['kodef'];
	$namaf=$_POST['namaf'];
	$hargaf=$_POST['hargaf'];

	$data=mysqli_query($mysqli, "INSERT INTO fasilitas SET kodef='$kodef', namaf='$namaf', hargaf='$hargaf'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$kodef=$_POST['kodef'];
	$namaf=$_POST['namaf'];
	$hargaf=$_POST['hargaf'];

	$data=mysqli_query($mysqli, "UPDATE fasilitas SET kodef='$kodef', namaf='$namaf', hargaf='$hargaf' WHERE kodef='$kodef'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$kodef=$_POST['kodef'];
	$data=mysqli_query($mysqli, "DELETE FROM fasilitas WHERE kodef='$kodef'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(kodef) as maxKode FROM fasilitas");
$data  = mysqli_fetch_array($hasil);
$kodef = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodef, 1, 3);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "F";
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
<h1><p align="center">Data Fasilitas</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="fasilitasadd.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="fasilitasprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
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
      <th scope="col">Kode</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$fasilitas=mysqli_query($mysqli,"SELECT * FROM fasilitas");
	$no=1;

	while ($show=mysqli_fetch_array($fasilitas)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['kodef']; ?></td>
	 	<td><?php echo $show['namaf']; ?></td>
	 	<td><?php echo $show['hargaf']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="fasilitasupdate.php?kodef=<?php echo $show['kodef']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="fasilitasdelete.php?kodef=<?php echo $show['kodef']; ?>">Delete</a>
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
				<form action="menu.php?hal=fasilitastampil" method="POST">
					<div class="form-group row">
						<label for="kodef" class="col-sm-4 col-form-label">Kode</label>
						<div class="col-sm-8">
							<input type="text" name="kodef" class="form-control" required="" id="kodef"  value="<?php echo $kode ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="namaf" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="namaf" class="form-control" required="" id="namaf">
						</div>
					</div>
					<div class="form-group row">
						<label for="hargaf" class="col-sm-4 col-form-label">Harga</label>
						<div class="col-sm-8">
							<input type="text" name="hargaf" class="form-control" required="" id="hargaf">
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