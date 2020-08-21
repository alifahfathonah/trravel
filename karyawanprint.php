<?php 
session_start();
if(!isset($_SESSION['username'])){
	header("Loaction: index.php");
}
include "connection.php";
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
<div class="card" style="width: 50rem;">
<div class="card-body">

<table class="table">
  <thead class="thead-light">
    <tr>
    	<th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No HP</th>
      <th scope="col">Jenis Karyawan</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$karyawan=mysqli_query($mysqli, "SELECT * FROM karyawan");
	$no=1;
	while($show=mysqli_fetch_array($karyawan)){
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td align="center"><?php echo $show['nik']; ?></td>
	 	<td id="column_padding"><?php echo $show['nama']; ?></td>
	 	<td id="column_padding"><?php echo $show['jenis_kelamin']; ?></td>
	 	<td id="column_padding"><?php echo $show['no_hp']; ?></td>
	 	<td id="column_padding"><?php echo $show['jenis_karyawan']; ?></td>
	 </tr>
	<?php $no++; } ?>
  </tbody>
</table>

<!-- <table border="1" width="70%" style="border-collapse: collapse;" align="">
	<tr class="tableheader">
		<th rowspan="1">NIK</th>
		<th>Nama</th>
		<th>Jenis Kelamin</th>
		<th>No HP</th>
		<th>Jenis Karyawan</th>
	</tr>
	<?php 
	$karyawan=mysqli_query($mysqli, "SELECT * FROM karyawan");
	while($show=mysqli_fetch_array($karyawan)){
	 ?>
	 <tr>
	 	<td width="15%" align="center"><?php echo $show['nik']; ?></td>
	 	<td width="15%" id="column_padding"><?php echo $show['nama']; ?></td>
	 	<td width="10%" id="column_padding"><?php echo $show['jenis_kelamin']; ?></td>
	 	<td width="15%" id="column_padding"><?php echo $show['no_hp']; ?></td>
	 	<td width="15%" id="column_padding"><?php echo $show['jenis_karyawan']; ?></td>
	 </tr>
	<?php } ?>
</table> -->

<br><br>
<a href="menu.php?hal=karyawantampil"><button class="btn btn-primary">Kembali</button></a>
</div>
</div>
</div>

<script>
	window.load=print_d();
	function print_d(){
		window.print();
	}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>