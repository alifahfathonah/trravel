<?php
include "connection.php";
if (isset($_POST['add'])) {
	$kodet=$_POST['kodet'];
	$idm=$_POST['idm'];
	$kodeo=$_POST['kodeo'];
	$kodef=$_POST['kodef'];
	$depart=$_POST['depart'];

$query="SELECT * FROM jadwal WHERE kode_operasi='$kodeo'";
$hasil=mysqli_query($mysqli, $query);
$jwl=$hasil->fetch_assoc();
if($jwl['kode_operasi']=="J001"){
	$to=$jwl['tarif_operasi'];
}else if($jwl['kode_operasi']=="J002"){
	$to=$jwl['tarif_operasi'];
}else if($jwl['kode_operasi']=="J003"){
	$to=$jwl['tarif_operasi'];
}else if($jwl['kode_operasi']=="J004"){
	$to=$jwl['tarif_operasi'];
}else if($jwl['kode_operasi']=="J005"){
	$to=$jwl['tarif_operasi'];
}
$query1="SELECT * FROM fasilitas WHERE kodef='$kodef'";
$hasil1=mysqli_query($mysqli, $query1);
$fas=$hasil1->fetch_assoc();
if($fas['kodef']=="F000"){
	$tf=$fas['hargaf'];
}else if($fas['kodef']=="F001"){
	$tf=$fas['hargaf'];
}else if($fas['kodef']=="F002"){
	$tf=$fas['hargaf'];
}
$tt=$to+$tf;

	$tarif=$tt;

	$data=mysqli_query($mysqli, "INSERT INTO transaksi SET kodet='$kodet', idm='$idm', kodeo='$kodeo', kodef='$kodef', depart='$depart', tarif='$tarif'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

if (isset($_POST['update'])) {
	$kodet=$_POST['kodet'];
	$idm=$_POST['idm'];
	$kodeo=$_POST['kodeo'];
	$kodef=$_POST['kodef'];
	$depart=$_POST['depart'];
	$tarif=$_POST['tarif'];

	$data=mysqli_query($mysqli, "UPDATE transaksi SET kodet='$kodet', idm='$idm', kodeo='$kodeo', kodef='$kodef', depart='$depart', tarif='$tarif' WHERE kodet='$kodet'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

if(isset($_POST['delete'])){
	$kodet=$_POST['kodet'];
	$data=mysqli_query($mysqli, "DELETE FROM transaksi WHERE kodet='$kodet'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(kodet) as maxKode FROM transaksi");
$data  = mysqli_fetch_array($hasil);
$kodet = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodet, 1, 4);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "T";
$kode = $char . sprintf("%04s", $noUrut);

//auto kode
// function generate_id($kode, $lastid){
// 	$str=substr("000".($lastid+1), -5);
// 	return "$kode".$str;
// }
// $dat=mysqli_query($mysqli, "SELECT * FROM transaksi order by kodet desc limit 1");
// $row=$dat->fetch_assoc();
// $lastid=(int)substr($row['kodet'], 1);
// $kode=generate_id("T",$lastid);
// $ce=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE kodet='$kode'");
// if(mysqli_num_rows($ce)>0){
// 	echo "<div class=\"alert alert-danger\" role=\"alert\">Kode sudah digunakan</div>";
// }
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
<h1><p align="center">Data Transaksi</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="transaksiadd.php?kodet=<?php echo $kode; ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="transaksiprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
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
      <th scope="col">Kode Transaksi</th>
      <th scope="col">ID Member</th>
      <th scope="col">Kode Operasi</th>
      <th scope="col">Kode Fasilitas</th>
      <th scope="col">Berangkat</th>
      <th scope="col">Tarif</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$transaksi=mysqli_query($mysqli,"SELECT * FROM transaksi");
	$no=1;

	while ($show=mysqli_fetch_array($transaksi)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['kodet']; ?></td>
	 	<td><?php echo $show['idm']; ?></td>
	 	<td><?php echo $show['kodeo']; ?></td>
	 	<td><?php echo $show['kodef']; ?></td>
	 	<td><?php echo $show['depart']; ?></td>
	 	<td><?php echo $show['tarif']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="transaksiupdate.php?kodet=<?php echo $show['kodet']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="transaksidelete.php?kodet=<?php echo $show['kodet']; ?>">Delete</a>
					<a href="transaksi2print.php?kodet=<?php echo $show['kodet']; ?>&kodeo=<?php echo $show['kodeo']; ?>&idm=<?php echo $show['idm']; ?>" class="dropdown-item text-warning">Print</a>
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

<?php 
$member=mysqli_query($mysqli,"SELECT * FROM member");
$jadwal=mysqli_query($mysqli,"SELECT * FROM jadwal");
$fasilitas=mysqli_query($mysqli,"SELECT * FROM fasilitas");
 ?>
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
				<form action="menu.php?hal=transaksitampil" method="POST">
					<div class="form-group row">
						<label for="kodet" class="col-sm-4 col-form-label">Kode Transaksi</label>
						<div class="col-sm-8">
							<input type="text" name="kodet" class="form-control" required="" id="kodet" value="<?php echo $kode; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="idm" class="col-sm-4 col-form-label">ID Member</label>
						<div class="col-sm-8">
							<select class="custom-select" id="idm" name="idm" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($member)) { ?>
									<option value="<?php echo $show['id_member']; ?>"><?php echo $show['id_member']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="kodeo" class="col-sm-4 col-form-label">Kode Operasi</label>
						<div class="col-sm-8">
							<select class="custom-select" id="kodeo" name="kodeo" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($jadwal)) { ?>
									<option value="<?php echo $show['kode_operasi']; ?>"><?php echo $show['kode_operasi']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="kodef"" class="col-sm-4 col-form-label">Kode Fasilitas</label>
						<div class="col-sm-8">
							<select class="custom-select" id="kodef" name="kodef" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($fasilitas)) { ?>
									<option value="<?php echo $show['namaf']; ?>"><?php echo $show['namaf']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="depart" class="col-sm-4 col-form-label">Berangkat</label>
						<div class="col-sm-8">
							<input type="time" name="depart" class="form-control" required="" id="depart">
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