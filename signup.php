<?php 

if (isset($_GET['pesan'])) {
	$pesan=$_GET['pesan'];
}

function generate_id($kode, $lastid){
	$str=substr("000".($lastid+1), -5);
	return "$kode".$str;
}

if (isset($_POST['submit'])) {
	// $fullname=htmlentities(strip_tags(trim($_POST['nama'])));
	// $username=htmlentities(strip_tags(trim($_POST['username'])));
	// $password=htmlentities(strip_tags(trim($_POST['password'])));
	$pesan_error="";

	// include("connection.php");
	// $username=mysqli_real_escape_string($mysqli, $username);
	// $password=mysqli_real_escape_string($mysqli, $password);
	// $password=$password;

	// $query="SELECT * FROM pengguna WHERE username='$username' AND password='$password'";
	// $hasil=mysqli_query($mysqli, $query);

	// if(mysqli_num_rows($hasil)==0){
	// 	$pesan_error.="Coba Lagi";
	// }

	// mysqli_free_result($hasil);
	// mysqli_close($mysqli);

	include("connection.php");
	$username=$_POST['username'];
	$nama=$_POST['nama'];
	$password=$_POST['password'];
	$peran="member";

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(id_member) as maxKode FROM member");
$data  = mysqli_fetch_array($hasil);
$kode = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kode, 1, 4);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "M";
$id_member = $char . sprintf("%04s", $noUrut);

	// //id
	// $dat=mysqli_query($mysqli, "SELECT * FROM member order by id_member desc limit 1");
	// $row=$dat->fetch_assoc();
	// $lastid=(int)substr($row['id_member'], 1);
	// $id_member=generate_id("M",$lastid);

	$ce=mysqli_query($mysqli, "SELECT * FROM member WHERE id_member='$id_member'");
	if(mysqli_num_rows($ce)>0){
		$pesan_error.="<font color='red'>ID sudah digunakan</font><br>";
	}else{
		$data2=mysqli_query($mysqli, "INSERT INTO member SET id_member='$id_member', nama_member='$nama'") or die("data salah: ".mysqli_error($mysqli));
	}

	$cek=mysqli_query($mysqli, "SELECT * FROM pengguna WHERE username='$username'");
	if(mysqli_num_rows($cek)>0){
		$pesan_error.="<font color='red'>Username sudah digunakan</font><br>";
	}else{
		$data=mysqli_query($mysqli, "INSERT INTO pengguna SET username='$username', nama='$nama', password='$password', peran='$peran'") or die("data salah: ".mysqli_error($mysqli));
	}
	

	if ($pesan_error==="") {
		header("Location: index.php");
	}
	
}else{
	$pesan_error="";
	$fullname="";
	$username="";
	$password="";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="img/t.png">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<style>
		.tengah{
			position: absolute;
			margin-top: -200px;
			margin-left: -200px;
			left: 50%;
			top: 50%;
		}
		body {
  			/* Location of the image */
  			background-image: url(img/02.jpg);
  
  			/* Background image is centered vertically and horizontally at all times */
  			background-position: center center;
  
  			/* Background image doesn't tile */
  			background-repeat: no-repeat;
  
  			/* Background image is fixed in the viewport so that it doesn't move when the content's height is greater than the image's height */
  			background-attachment: fixed;
  
  			/* This is what makes the background image rescale based on the container's size */
  			background-size: cover;
  
  			/* Set a background color that will be displayed while the background image is loading */
  			background-color: #464646;
		}
	</style>
</head>
<body>
<div class="p-3 mb-2 bg- text-black">
<div class="container-fluid">

<!-- <div class="row">
	<div class="col-xl"></div>
	<div class="col-xl" style="width: 23rem; height: 13rem;"></div>
	<div class="col-xl"></div>
</div>
<div class="row">
<div class="col-xl"></div>
<div class="col-xl"> -->

<!-- <div class="row">
<div class="col-4"></div>
<div class="col-4"> -->
<!-- <div class="tengah"> -->

<div class="row">
<div class="col-12 col-sm-12 col-md-6 col-xl-3 mx-auto" style="top:9rem;">

<div class="card" style="width: auto;">
	<div class="card-header bg-danger text-white text-center"><h3>TRRAVEL</h3></div>
  	<div class="card-body">
  	<?php 
		if (isset($pesan)) {
			echo "<div class=\"alert alert-info\" role=\"alert\">$pesan</div>";
			// echo "<div class=\"pesan\">$pesan</div>";
		}
		if ($pesan_error!=="") {
			echo "<div class=\"alert alert-info\" role=\"alert\">$pesan_error</div>";
			// echo "<div class=\"error\">$pesan_error</div>";
		}
	?>
    <h4 class="card-title">Sign Up</h4>
	<form action="signup.php" method="post">
  		<div class="form-group">
    		<label for="fullname">Fullname </label>
    		<input type="text" class="form-control" name="nama" id="nama" placeholder="fullname" required=""></input>
  		</div>
  		<div class="form-group">
    		<label for="username">Username </label>
    		<input type="text" class="form-control" name="username" id="username" placeholder="username" required=""></input>
  		</div>
  		<div class="form-group">
    		<label for="password">Password </label>
    		<input type="password" class="form-control" name="password" id="password" placeholder="password" required=""></input>
  		</div>
  		<button type="submit" name="submit" class="btn btn-danger">Sign Up</button>
  		Have an account? <a href="index.php">Sign In</a>
	</form>  
	</div>
</div>
</div>
</div>


<!-- </div>
<div class="col-4"></div>
</div> -->

<!-- </div>
<div class="col-xl"></div>
</div>
<div class="row">
	<div class="col-xl"></div>
	<div class="col-xl" style="width: 23rem; height: 13rem;"></div>
	<div class="col-xl"></div>
</div> -->

</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>