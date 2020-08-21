<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM karyawan WHERE nik='$_GET[nik]'");
$datashow=mysqli_fetch_array($data);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>TRRAVEL</title>
 </head>
 <body>
<!-- <div class="jumbotron jumbotron-fluid">
<div class="container-fluid">
<h1>Update Data</h1>
<div class="card" style="width: 40rem;">
<div class="card-body"> -->

<!-- <form action="" method="post">
 	<p>
 		<table class="table" width="600" cellpadding="5">
  		<thead class="thead-dark">
 			<tr>
 				<td>NIK</td>
 				<td><input type="text" class="form-control" name="nik" value="<?php echo $_GET['nik']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Nama</td>
 				<td><input type="text" class="form-control" name="nama" value="<?php echo $datashow['nama']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Jenis Kelamin</td>
 				<td><input type="text" class="form-control" name="jenis_kelamin" value="<?php echo $datashow['jenis_kelamin']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>No HP</td>
 				<td><input type="text" class="form-control" name="no_hp" value="<?php echo $datashow['no_hp']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Jenis Karyawan</td>
 				<td><input type="text" class="form-control" name="jenis_karyawan" value="<?php echo $datashow['jenis_karyawan']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td><input type="submit" class="btn btn-primary" name="update" value="Edit"></input></td>
 			</tr>
 		</table>
 	</p>
 </form> -->
<!-- <?php
 if(isset($_POST['update'])){
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$no_hp=$_POST['no_hp'];
	$jenis_karyawan=$_POST['jenis_karyawan'];

	if($nik=="" or $jenis_kelamin=="" or $nama=="" or $no_hp=="" or $jenis_karyawan==""){
		if(empty($nik)){
			echo "<font color='red'>NIK belum di isi</font><br>";
		}
		if(empty($jenis_kelamin)){
			echo "<font color='red'>Jenis Kelamin belum di isi</font><br>";
		}
		if(empty($nama)){
			echo "<font color='red'>Nama belum di isi</font><br>";
		}
		if(empty($no_hp)){
			echo "<font color='red'>No HP belum di isi</font><br>";
		}
		if(empty($jenis_karyawan)){
			echo "<font color='red'>Jenis Karyawan belum di isi</font><br>";
		}
	}else{
		// $cek=mysqli_query($mysqli, "SELECT * FROM karyawan WHERE nik='$nik'");
		// if(mysqli_num_rows($cek)>0){
		// 	echo "<font color='red'>nik sudah digunakan</font><br>";
		// }else{
			$data=mysqli_query($mysqli, "UPDATE karyawan SET nik='$nik', nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', jenis_karyawan='$jenis_karyawan' WHERE nik='$nik'") or die("data salah: ".mysqli_error($mysqli));

			if ($data) {
			echo "Berhasil Update Data<br>";
			echo "<a href='menu.php?hal=karyawantampil'>Kembali</a>";
			}else{
			echo "Gagal input data!!<br>";
			echo "<a href='menu.php?hal=karyawantampil'>Kembali</a>";
			}
		//}
	}
}
?> -->

	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="menu.php?hal=karyawantampil" method="POST" enctype="multipart/form-data">
					<div class="form-group row">
						<label for="nik" class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<input type="text" name="nik" class="form-control" required="" id="nik" value="<?php echo $datashow['nik']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $datashow['nama']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="laki-laki" <?php if($datashow['jenis_kelamin']=="laki-laki"){echo "checked"; } ?>>
								&nbsp<label class="form-check-label">Laki - Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="perempuan" <?php if($datashow['jenis_kelamin']=="perempuan"){echo "checked"; } ?>>
								&nbsp<label class="form-check-label">Perempuan</label>
							</div>
						</div>
					</div>
					<div class="form-group row">
						<label for="nohp" class="col-sm-4 col-form-label">No HP</label>
						<div class="col-sm-8">
							<input type="text" name="no_hp" class="form-control" required="" id="nohp" value="<?php echo $datashow['no_hp']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="jns" class="col-sm-4 col-form-label">Jenis Karyawan</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="jenis_karyawan" required="" id="jns" value="<?php echo $datashow['jenis_karyawan']; ?>">
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<!-- <button class="btn btn-primary" type="submit">Update</button> -->
					<input type="submit" name="update" value="Edit" class="btn btn-info">
				</div>
				</form>
			</div>
		</div>
	</div>

<!-- </div>
</div>
</div>
</div> -->
 </body>
 </html>