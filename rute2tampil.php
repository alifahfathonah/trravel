<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

<div class="container-fluid">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Daftar Rute</p></h1>
		<!-- <div class="row">
		<div class="col-4"></div>
		<div class="col-4"></div>
		<div class="col-4">
			<form class="form-inline my-2 my-lg-0" action="menu2.php?hal=rutesearch" method="post">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
      		<button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search"><span class="glyphicon glyphicon-search"></span> Search</button>
    		</form>
		</div>
		</div> -->
	
<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
    	<th scope="col" width="10%">No</th>
      <th scope="col" width="30%">Kode Rute</th>
      <th scope="col" width="60%">Nama Rute</th>
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