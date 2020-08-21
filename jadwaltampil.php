<?php
include "connection.php";

if (isset($_POST['add'])) {
	$kode_operasi=$_POST['kode_operasi'];
	$tgl_operasi=$_POST['tgl_operasi'];
	$waktumulai_operasi=$_POST['waktumulai_operasi'];
	$waktuselesai_operasi=$_POST['waktuselesai_operasi'];
	$tarif_operasi=$_POST['tarif_operasi'];
	$nik=$_POST['nik'];
	$no_kendaraan=$_POST['no_kendaraan'];
	$kode_rute=$_POST['kode_rute'];

	$data=mysqli_query($mysqli, "INSERT INTO jadwal SET kode_operasi='$kode_operasi', tgl_operasi='$tgl_operasi', waktumulai_operasi='$waktumulai_operasi', waktuselesai_operasi='$waktuselesai_operasi', tarif_operasi='$tarif_operasi', nik='$nik', no_kendaraan='$no_kendaraan', kode_rute='$kode_rute'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

if (isset($_POST['update'])) {
	$kode_operasi=$_POST['kode_operasi'];
	$tgl_operasi=$_POST['tgl_operasi'];
	$waktumulai_operasi=$_POST['waktumulai_operasi'];
	$waktuselesai_operasi=$_POST['waktuselesai_operasi'];
	$tarif_operasi=$_POST['tarif_operasi'];
	$nik=$_POST['nik'];
	$no_kendaraan=$_POST['no_kendaraan'];
	$kode_rute=$_POST['kode_rute'];

	$data=mysqli_query($mysqli, "UPDATE jadwal SET kode_operasi='$kode_operasi', tgl_operasi='$tgl_operasi', waktumulai_operasi='$waktumulai_operasi', waktuselesai_operasi='$waktuselesai_operasi', tarif_operasi='$tarif_operasi', nik='$nik', no_kendaraan='$no_kendaraan', kode_rute='$kode_rute' WHERE kode_operasi='$kode_operasi'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

if(isset($_POST['delete'])){
	$kode_operasi=$_POST['kode_operasi'];
	$data=mysqli_query($mysqli, "DELETE FROM jadwal WHERE kode_operasi='$kode_operasi'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

//auto kode
// function generate_id($kode, $lastid){
// 	$str=substr("00".($lastid+1), -5);
// 	return "$kode".$str;
// }
// $dat=mysqli_query($mysqli, "SELECT * FROM jadwal order by kode_operasi desc limit 1");
// $row=$dat->fetch_assoc();
// $lastid=(int)substr($row['kode_operasi'], 1);
// $kode=generate_id("J",$lastid);
// $ce=mysqli_query($mysqli, "SELECT * FROM jadwal WHERE kode_operasi='$kode'");
// if(mysqli_num_rows($ce)>0){
// 	echo "<div class=\"alert alert-danger\" role=\"alert\">Kode sudah digunakan</div>";
// }

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(kode_operasi) as maxKode FROM jadwal");
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
$char = "J";
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
<h1><p align="center">Data Jadwal Operasi</p></h1><br>
		<div class="row">
		<div class="col-8">
			<button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="jadwaladd.php?kode=<?php echo "$kode"; ?>"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="jadwalprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
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
      <th scope="col">Tanggal Operasi</th>
      <th scope="col">Mulai Operasi</th>
      <th scope="col">Selesai Operasi</th>
      <th scope="col">Tarif</th>
      <th scope="col">NIK</th>
      <th scope="col">No Kendaraan</th>
      <th scope="col">Kode Rute</th>
      <th scope="col">Status Kursi</th>
      <th scope="col">Opsi</th>
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
			<?php } ?>
	 	</td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="jadwalupdate.php?kode_operasi=<?php echo $show['kode_operasi']; ?>">Edit</a>
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="jadwaldelete.php?kode_operasi=<?php echo $show['kode_operasi']; ?>">Delete</a>
				</div>
			</div>
	 	<!-- <a href="menu.php?hal=jadwalupdate&kode_operasi=<?php echo $show['kode_operasi']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
	 	<a href="menu.php?hal=jadwaldelete&kode_operasi=<?php echo $show['kode_operasi']; ?>"><button type="button" class="btn btn-danger">Delete</button></a> -->
	 	</td>
	 </tr>
	 <?php $no++; } ?>
  </tbody>
</table>
</div>

</div>
</div>

<?php 
$karyawan=mysqli_query($mysqli,"SELECT * FROM karyawan WHERE jenis_karyawan='sopir'");
$armada=mysqli_query($mysqli,"SELECT * FROM armada");
$rute=mysqli_query($mysqli,"SELECT * FROM rute");
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
				<form action="menu.php?hal=jadwaltampil" method="POST">
					<div class="form-group row">
						<label for="kode_operasi" class="col-sm-4 col-form-label">Kode Operasi</label>
						<div class="col-sm-8">
            				<input type="text" class="form-control" id="kode_operasi" name="kode_operasi" required="" value="<?php echo $kode; ?>" readonly>
            			</div>
					</div>
					<div class="form-group row">
						<label for="tgl_operasi" class="col-sm-4 col-form-label">Tanggal Operasi</label>
						<div class="col-sm-8">
							<input type="date" name="tgl_operasi" class="form-control" required="" id="tgl_operasi">
						</div>
					</div>
					<div class="form-group row">
						<label for="waktumulai_operasi" class="col-sm-4 col-form-label">Waktu Mulai</label>
						<div class="col-sm-8">
							<input type="time" name="waktumulai_operasi" class="form-control" required="" id="waktumulai_operasi">
						</div>
					</div>
					<div class="form-group row">
						<label for="waktuselesai_operasi" class="col-sm-4 col-form-label">Waktu Selesai</label>
						<div class="col-sm-8">
							<input type="time" name="waktuselesai_operasi" class="form-control" required="" id="waktuselesai_operasi">
						</div>
					</div>
					<div class="form-group row">
						<label for="tarif_operasi"" class="col-sm-4 col-form-label">Tarif</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="tarif_operasi" id="tarif_operasi" required="">
						</div>
					</div>
					<div class="form-group row">
						<label for="nik" class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<select class="custom-select" id="nik" name="nik" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($karyawan)) { ?>
									<option value="<?php echo $show['nik']; ?>"><?php echo $show['nik']; ?></option>
								<?php } ?>
 							 </select>
							<!-- <input type="text" name="nik" class="form-control" required="" id="nik"> -->
						</div>
					</div>
					<div class="form-group row">
						<label for="no_kendaraan" class="col-sm-4 col-form-label">No Kendaraan</label>
						<div class="col-sm-8">
							<select class="custom-select" id="no_kendaraan" name="no_kendaraan" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($armada)) { ?>
									<option value="<?php echo $show['no_kendaraan']; ?>"><?php echo $show['no_kendaraan']; ?></option>
								<?php } ?>
 							 </select>
							<!-- <input type="text" name="no_kendaraan" class="form-control" required="" id="no_kendaraan"> -->
						</div>
					</div>
					<div class="form-group row">
						<label for="kode_rute" class="col-sm-4 col-form-label">Kode Rute</label>
						<div class="col-sm-8">
							<select class="custom-select" id="kode_rute" name="kode_rute" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($rute)) { ?>
									<option value="<?php echo $show['kode_rute']; ?>"><?php echo $show['kode_rute']; ?></option>
								<?php } ?>
 							 </select>
							<!-- <input type="text" class="form-control" name="kode_rute" id="kode_rute" required=""> -->
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


<script>
$(document).ready(function(){
	$('#add').on('show.bs.modal', function (event) {
		var modal = $(this)
	});

	$('a#edit_data').click(function(){ 
  		var url=$(this).attr('href'); 
  		$.ajax({ url:url, success:function(response){ $('#edit').html(response); } }); 
  	});

	$('a#delete_data').click(function(){ 
  		var url=$(this).attr('href'); 
  		$.ajax({ url:url, success:function(response){ $('#delete').html(response); } }); 
  	});

	$('.data').DataTable();
});
</script>

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('a#add_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#add').html(response);
              }
            }
          );
        }
      );
    }
  );
</script>
<script type="text/javascript">
  $(document).ready(function(){
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
    }
  );
</script> -->

<!-- <script type="text/javascript">
  $(document).ready(function(){
    $('.data').DataTable();
  });
</script> -->
</body>
</html>