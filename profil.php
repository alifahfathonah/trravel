<?php 
$data2=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username'");
$datashow2=mysqli_fetch_array($data2);

if (isset($_POST['simpan'])) {
	$id_member=$_POST['id_member'];
	$nama_member=$_POST['nama_member'];
	$jk_member=$_POST['jk_member'];
	$nohp_member=$_POST['nohp_member'];
	$username=$_POST['username'];
	$password=$_POST['password'];

	$code=$_FILES['file']['error'];
		if($code===0){
			$nama_folder="upload";
			$tmp=$_FILES['file']['tmp_name'];
			$nama_file=$_FILES['file']['name'];
			$path="$nama_folder/$nama_file";
			$upload_check=false;
			if(file_exists($path)){
				echo "File dengan nama yang sama sudah tersimpan, coba lagi<br>";
				$upload_check=true;
			}
			if(!$upload_check and move_uploaded_file($tmp, $path)){
				echo "<div class=\"alert alert-success\" role=\"alert\">Picture success to upload<br></div>";
			}else{
				echo "<div class=\"alert alert-danger\" role=\"alert\">Picture failed to upload<br></div>";
			}

			$data=mysqli_query($mysqli, "UPDATE member SET id_member='$id_member', nama_member='$nama_member', jk_member='$jk_member', nohp_member='$nohp_member', foto='$nama_file' WHERE id_member='$id_member'") or die("data salah: ".mysqli_error($mysqli));
		}

	$data=mysqli_query($mysqli, "UPDATE member SET id_member='$id_member', nama_member='$nama_member', jk_member='$jk_member', nohp_member='$nohp_member' WHERE id_member='$id_member'") or die("data salah: ".mysqli_error($mysqli));
	$data2=mysqli_query($mysqli, "UPDATE pengguna SET username='$username', password='$password', nama='$nama_member' WHERE username='$username'") or die("data salah: ".mysqli_error($mysqli));
	if ($data && $data2) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success to edit the profile</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed to edit the profile</div>";
	}
}

$hasil=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username'");
$row=$hasil->fetch_assoc();
$namam=$row['nama'];
$data=mysqli_query($mysqli, "SELECT * FROM member WHERE nama_member='$namam'");
$datashow=mysqli_fetch_array($data);
 ?>

<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>
<!-- <div class="jumbotron jumbotron-fluid bg-primary text-black">
<div class="container-fluid">
<div class="row">
  <div class="col-2"></div>
  <div class="col-8"> -->

<div class="container-fluid">
<div class="row">
<div class="col-12 col-sm-12 col-md-10 col-xl-8 mx-auto">
<div class="card" style="width: auto;">
<div class="card-body">
<h2>Edit Profile</h2>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="row">
		<div class="col-12 col-sm-12 col-md-4 col-xl-4 mx-auto">
			<img src="upload/<?php echo $datashow['foto']; ?>" class="rounded-circle"  width="150" height="150"><br>
			<input type="file" class="form-control-file" name="file"></input>
		</div>
		<div class="col-12 col-sm-12 col-md-8 col-xl-8 mx-auto">
			<div class="form-group row">
				<label for="id_member" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">ID Member</label>
				<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
					<input type="text" name="id_member" class="form-control" required="" id="id_member" value="<?php echo $datashow['id_member']; ?>" readonly>
				</div>
			</div>
			<div class="form-group row">
				<label for="nama_member" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">Nama</label>
				<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
					<input type="text" name="nama_member" class="form-control" required="" id="nama_member" value="<?php echo $datashow['nama_member']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="jk" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">Jenis Kelamin</label>
						<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk_member" id="jk1" value="laki-laki" <?php if($datashow['jk_member']=="laki-laki"){echo "checked"; } ?>>
								&nbsp<label class="form-check-label">Laki - Laki</label>
							</div>
							<div class="form-check form-check-inline">
								<input class="form-check-input" type="radio" name="jk_member" id="jk2" value="perempuan" <?php if($datashow['jk_member']=="perempuan"){echo "checked"; } ?>>
								&nbsp<label class="form-check-label">Perempuan</label>
							</div>
						</div>
			</div>
			<div class="form-group row">
				<label for="nohp_member" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">No HP</label>
				<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
					<input type="text" name="nohp_member" class="form-control" required="" id="nohp_member" value="<?php echo $datashow['nohp_member']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="username" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">Username</label>
				<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
					<input type="text" name="username" class="form-control" required="" id="username" value="<?php echo $datashow2['username']; ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="password" class="col-4 col-sm-4 col-md-4 col-xl-4 mx-auto col-form-label">Password</label>
				<div class="col-8 col-sm-8 col-md-8 col-xl-8 mx-auto">
					<input type="password" name="password" class="form-control" required="" id="password" value="<?php echo $datashow2['password']; ?>">
				</div>
			</div>
			<p align="right"><input type="submit" class="btn btn-success" name="simpan" id="simpan" value="Edit"></input></p>
		</div>
	</div>
</form>

<!-- <form action="" method="POST" enctype="multipart/form-data">
<div class="form-group">
	<div class="row">
		<div class="col-4">
	<img src="upload/<?php echo $datashow['foto']; ?>" class="rounded-circle"  width="150" height="150"><br>
	<input type="file" class="form-control-file" name="file"></input>
		</div>
		<div class="col-8">
<table class="table" width="800" cellpadding="5">
	<tr>
		<td>ID Member</td>
		<td> <input type="text" class="form-control" name="id_member" value="<?php echo $datashow['id_member']; ?>" required="" readonly></input> </td>
	</tr>
	<tr>
		<td>Nama</td>
		<td><input type="text" class="form-control" name="nama_member" value="<?php echo $datashow['nama_member']; ?>" required=""></input></td>
	</tr>
	<tr>
		<td>Jenis Kelamin</td>
		<td> <input type="text" class="form-control" name="jk_member" value="<?php echo $datashow['jk_member']; ?>" required=""></input> </td>
	</tr>
	<tr>
		<td>No HP</td>
		<td><input type="text" class="form-control" name="nohp_member" value="<?php echo $datashow['nohp_member']; ?>" required=""></input></td>
	</tr>
	<tr>
		<td>Username</td>
		<td><input type="text" class="form-control" name="username" value="<?php echo $datashow2['username']; ?>" required=""></input></td>
	</tr>
	<tr>
		<td>Password</td>
		<td> <input type="password" class="form-control" name="password" value="<?php echo $datashow2['password']; ?>" required=""></input> </td>
	</tr>
	<tr>
		<td colspan="2" align="right">
		<input type="submit" class="btn btn-success" name="simpan" id="simpan" value="Edit"></input>
		</td>
	</tr>
	</table>
		</div>
	</div>
</div>
</form> -->
</div>
</div>
</div>
</div>
</div>

</body>
</html>