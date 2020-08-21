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
<div class="card" style="width: 60rem;">
<div class="card-body">

<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kode Transaksi</th>
      <th scope="col">ID Member</th>
      <th scope="col">Kode Operasi</th>
      <th scope="col">Kode Fasilitas</th>
      <th scope="col">Berangkat</th>
      <th scope="col">Tarif</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$transaksi=mysqli_query($mysqli, "SELECT * FROM transaksi");
	$no=1;

	while($show=mysqli_fetch_array($transaksi)){
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['kodet']; ?></td>
	 	<td><?php echo $show['idm']; ?></td>
	 	<td><?php echo $show['kodeo']; ?></td>
	 	<td><?php echo $show['kodef']; ?></td>
	 	<td><?php echo $show['depart']; ?></td>
	 	<td><?php echo $show['tarif']; ?></td>
	 </tr>
	<?php $no++; } ?>
  </tbody>
</table>

<!-- <br><br>
<a href="menu.php?hal=transaksitampil"><button class="btn btn-primary">Kembali</button></a> -->
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