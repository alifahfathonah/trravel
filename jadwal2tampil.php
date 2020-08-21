<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

<div class="container-fluid">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Daftar Jadwal Operasi</p></h1>
		<!-- <div class="row">
		<div class="col-4"></div>
		<div class="col-4"></div>
		<div class="col-4">
 		<form class="form-inline my-2 my-lg-0" action="menu2.php?hal=jadwalsearch" method="post">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
      		<button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search"><span class="glyphicon glyphicon-search"></span> Search</button>
    	</form>
		</div>
		</div> -->

	<!-- <form action="menu2.php?hal=jadwalsearch" method="post">
		<div class="form-row">
			<div class="col">
				<input type="text" class="form-control" name="cari" placeholder="search"></input>
			</div>
			<div class="col">
				<input type="submit" name="search" class="btn btn-info" value="Search"></input>
			</div>
		</div>
	</form> -->
<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
<!-- <table id="example" class="table" cellspacing="" width="100%" border="" cellpadding=""> -->
  <thead class="thead-dark">
    <tr>
		<th scope="col">No</th>
      <th scope="col">Kode</th>
      <th scope="col">Tanggal Operasi</th>
      <th scope="col">Mulai Operasi</th>
      <th scope="col">Selesai Operasi</th>
      <th scope="col">Tarif</th>
      <th scope="col">NIK</th>
      <th scope="col">No Kendaraan</th>
      <th scope="col">Kode Rute</th>
      <th scope="col">Status Kursi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$jadwal=mysqli_query($mysqli,"SELECT * FROM jadwal");
	$no=1;

	while ($show=mysqli_fetch_array($jadwal)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['kode_operasi']; ?></td>
	 	<td><?php echo $show['tgl_operasi']; ?></td>
	 	<td><?php echo $show['waktumulai_operasi']; ?></td>
	 	<td><?php echo $show['waktuselesai_operasi']; ?></td>
	 	<td><?php echo $show['tarif_operasi']; ?></td>
	 	<td><?php echo $show['nik']; ?></td>
	 	<td><?php echo $show['no_kendaraan']; ?></td>
	 	<td><?php echo $show['kode_rute']; ?></td>
<?php
$tr=mysqli_query($mysqli, "SELECT kodeo, COUNT(kodeo) AS jml FROM transaksi WHERE kodeo='$show[kode_operasi]' GROUP BY kodeo");
$str=$tr->fetch_assoc();
$kdj=$str['kodeo'];
$jml=$str['jml'];

$jd=mysqli_query($mysqli, "SELECT * FROM jadwal WHERE kode_operasi='$kdj'");
$sjd=$jd->fetch_assoc();
$kda=$sjd['no_kendaraan'];

$ar=mysqli_query($mysqli, "SELECT * FROM armada WHERE no_kendaraan='$kda'");
$sar=$ar->fetch_assoc();
$jkr=$sar['jumlah_kursi'];
$a=$jkr-$jml;
?>
	 	<td>
	 		<?php
	 		if ($jml>$jkr) { ?>
				<span class="badge badge-pill badge-danger">Full</span>
			<?php }else{  ?>
				<button type="button" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="right" title="Seat Status">
  					<span class="badge badge-light"><?php echo $a; ?></span> left
				</button>
				<!-- <span class="badge badge-pill badge-primary"> left</span> -->
			<?php } 
	 		?>
	 	</td>
	 </tr>
	 <?php $no++; } ?>
  </tbody>
</table>
</div>

</div>
</div>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('.data').DataTable();
	});
</script>

<!-- <script>
 $(document).ready(function() {
    $('#example').DataTable();
 } );
</script> -->
</body>
</html>