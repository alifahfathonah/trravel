<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

<div class="container-fluid">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Daftar Fasilitas</p></h1>
		
<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
		<th scope="col">No</th>
      <th scope="col">Kode</th>
      <th scope="col">Nama</th>
      <th scope="col">Harga</th>
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