<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

<div class="container-fluid">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Data Armada</p></h1>
		
<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
		<th scope="col">No</th>
		<th scope="col">Merk</th>
		<th scope="col">Tipe</th>
		<th scope="col">Jumlah Kursi</th>
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
	 	<td><?php echo $show['merk']; ?></td>
	 	<td><?php echo $show['tipe']; ?></td>
	 	<td><?php echo $show['jumlah_kursi']; ?></td>
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

</body>
</html>