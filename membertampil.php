<?php
include "connection.php";
if (isset($_POST['add'])) {
	$id_member=$_POST['id_member'];
	$nama_member=$_POST['nama_member'];
	$jk_member=$_POST['jk_member'];
	$nohp_member=$_POST['nohp_member'];

	$data=mysqli_query($mysqli, "INSERT INTO member SET id_member='$id_member', nama_member='$nama_member', jk_member='$jk_member', nohp_member='$nohp_member'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$id_member=$_POST['id_member'];
	$nama_member=$_POST['nama_member'];
	$jk_member=$_POST['jk_member'];
	$nohp_member=$_POST['nohp_member'];

	$data=mysqli_query($mysqli, "UPDATE member SET id_member='$id_member', nama_member='$nama_member', jk_member='$jk_member', nohp_member='$nohp_member' WHERE id_member='$id_member'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$id_member=$_POST['id_member'];
	$data=mysqli_query($mysqli, "DELETE FROM member WHERE id_member='$id_member'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(id_member) as maxKode FROM member");
$data  = mysqli_fetch_array($hasil);
$kodef = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodef, 1, 4);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "M";
$kode = $char . sprintf("%04s", $noUrut);
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
<h1><p align="center">Data Member</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="memberadd.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="memberprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
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
      <th scope="col">ID</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No HP</th>
      <th scope="col" width="10%">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$member=mysqli_query($mysqli,"SELECT * FROM member");
	$no=1;

	while ($show=mysqli_fetch_array($member)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['id_member']; ?></td>
	 	<td><?php echo $show['nama_member']; ?></td>
	 	<td><?php echo $show['jk_member']; ?></td>
	 	<td><?php echo $show['nohp_member']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="memberupdate.php?id_member=<?php echo $show['id_member']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="memberdelete.php?id_member=<?php echo $show['id_member']; ?>">Delete</a>
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
				<form action="menu.php?hal=membertampil" method="POST">
					<div class="form-group row">
						<label for="id_member" class="col-sm-4 col-form-label">ID</label>
						<div class="col-sm-8">
							<input type="text" name="id_member" class="form-control" required="" id="id_member" value="<?php echo $kode ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_member" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="nama_member" class="form-control" required="" id="nama_member">
						</div>
					</div>
					<div class="form-group row">
						<label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk_member" id="jk1" value="laki-laki">
								&nbsp<label class="form-check-label">Laki - Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk_member" id="jk2" value="perempuan">
								&nbsp<label class="form-check-label">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="nohp_member" class="col-sm-4 col-form-label">No Hp</label>
						<div class="col-sm-8">
							<input type="text" name="nohp_member" class="form-control" required="" id="nohp_member">
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