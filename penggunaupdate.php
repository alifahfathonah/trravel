<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$_GET[username]'");
$datashow=mysqli_fetch_array($data);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>TRRAVEL</title>
 </head>
 <body>

 <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header bg-info text-white">
				<h4 class="modal-title" id="exampleModalLabel">Edit Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="menu.php?hal=penggunatampil" method="POST">
					<div class="form-group row">
						<label for="username" class="col-sm-4 col-form-label">Username</label>
						<div class="col-sm-8">
							<input type="text" name="username" class="form-control" required="" id="username" value="<?php echo $datashow['username']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="password" class="col-sm-4 col-form-label">Password</label>
						<div class="col-sm-8">
							<input type="text" name="password" class="form-control" required="" id="password" value="<?php echo $datashow['password']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="nama" class="col-sm-4 col-form-label">Full Name</label>
						<div class="col-sm-8">
							<input type="text" name="nama" class="form-control" required="" id="nama" value="<?php echo $datashow['nama']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="peran" class="col-sm-4 col-form-label">Role</label>
						<div class="col-sm-8">
							<input type="text" name="peran" class="form-control" required="" id="peran" value="<?php echo $datashow['peran']; ?>">
						</div>
					</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<input type="submit" name="update" value="Edit" class="btn btn-info">
				</div>
				</form>
			</div>
		</div>
	</div>

 </body>
 </html>


<!-- <?php 
$data=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$_GET[username]'");
$datashow=mysqli_fetch_array($data);
 ?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>TRRAVEL</title>
 </head>
 <body>
<div class="jumbotron jumbotron-fluid">
<div class="container-fluid">
<h1>Update Data</h1>
<div class="card" style="width: 30rem;">
<div class="card-body">

<form action="" method="post">
 	<p>
 		<table class="table" width="600" cellpadding="5">
  		<thead class="thead-dark">
 			<tr>
 				<td>Username</td>
 				<td><input type="text" class="form-control" name="username" value="<?php echo $_GET['username']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Password</td>
 				<td><input type="password" class="form-control" name="password" value="<?php echo $datashow['password']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Fullname</td>
 				<td><input type="text" class="form-control" name="nama" value="<?php echo $datashow['nama']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td>Role</td>
 				<td><input type="text" class="form-control" name="peran" value="<?php echo $datashow['peran']; ?>"></input></td>
 			</tr>
 			<tr>
 				<td><input type="submit" class="btn btn-primary" name="update" value="Edit"></input></td>
 			</tr>
 		</table>
 	</p>
 </form>
  <?php
 if(isset($_POST['update'])){
	$username=$_POST['username'];
	$nama=$_POST['nama'];
	$password=$_POST['password'];
	$peran=$_POST['peran'];

	if($username=="" or $password=="" or $nama=="" or $peran==""){
		if(empty($username)){
			echo "<font color='red'>Username belum di isi</font><br>";
		}
		if(empty($password)){
			echo "<font color='red'>Password belum di isi</font><br>";
		}
		if(empty($nama)){
			echo "<font color='red'>Fullname belum di isi</font><br>";
		}
		if(empty($peran)){
			echo "<font color='red'>Role belum di isi</font><br>";
		}
	}else{
		// $cek=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username'");
		// if(mysqli_num_rows($cek)>0){
		// 	echo "<font color='red'>Username sudah digunakan</font><br>";
		// }else{
			$data=mysqli_query($mysqli, "UPDATE pengguna SET username='$username', password='$password', nama='$nama', peran='$peran' WHERE username='$username'") or die("data salah: ".mysqli_error($mysqli));
			if ($data) {
				echo "Berhasil Update Data<br>";
				echo "<a href='menu.php?hal=penggunatampil'>Kembali</a>";
			}else{
				echo "Gagal input data!!<br>";
				echo "<a href='menu.php?hal=penggunatampil'>Kembali</a>";
			}
		//}
	}
}
 ?>

</div>
</div>
</div>
</div>
 </body>
 </html>
 -->