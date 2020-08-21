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
    	<th scope="col">No Kendaraan</th>
		<th scope="col">Merk</th>
		<th scope="col">Tipe</th>
		<th scope="col">Jumlah Kursi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$armada=mysqli_query($mysqli, "SELECT * FROM armada");
	$no=1;

	while($show=mysqli_fetch_array($armada)){
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['no_kendaraan']; ?></td>
	 	<td><?php echo $show['merk']; ?></td>
	 	<td><?php echo $show['tipe']; ?></td>
	 	<td><?php echo $show['jumlah_kursi']; ?></td>
	 </tr>
	<?php $no++; } ?>
  </tbody>
</table>

<br><br>
<a href="menu.php?hal=armadatampil"><button class="btn btn-primary">Kembali</button></a>
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