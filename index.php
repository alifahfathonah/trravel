<?php 

if (isset($_GET['pesan'])) {
	$pesan=$_GET['pesan'];
}

if (isset($_POST['submit'])) {
	$username=htmlentities(strip_tags(trim($_POST['username'])));
	$password=htmlentities(strip_tags(trim($_POST['password'])));
	$pesan_error="";
	if(empty($username)){//jika kolomnya belum di isi
		$pesan_error.="Fill the Username <br>";
	}
	if(empty($password)){
		$pesan_error.="Fill the Password <br>";
	}

	include("connection.php");
	$username1=mysqli_real_escape_string($mysqli, $username);
	$password1=mysqli_real_escape_string($mysqli, $password);
	$query="SELECT * FROM pengguna WHERE username='$username1' AND password='$password1'";
	$hasil=mysqli_query($mysqli, $query);
	if(mysqli_num_rows($hasil)==0){
		$pesan_error.="Try Again";//jika tidak ada dari hasil select
	}
	$row=$hasil->fetch_assoc();
	if ($pesan_error==="") {
		if($row['peran']=="member"){
			session_start();
			$_SESSION['username']=$username;
			header("Location: menu2.php");
		}
		if($row['peran']=="administrator"){
			session_start();
			$_SESSION['username']=$username;
			header("Location: menu.php");
		}
		if($row['peran']=="sopir"){
			session_start();
			$_SESSION['username']=$username;
			header("Location: menu2.php");
		}
	}
	mysqli_free_result($hasil);
	mysqli_close($mysqli);
	// if ($pesan_error==="") {
	// 	session_start();
	// 	$_SESSION['username']=$username;
	// 	header("Location: menu.php");
	// }
}else{
	$pesan_error="";
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
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<style>
		.tengah{
			position: absolute;
			margin-top: -180px;
			margin-left: -180px;
			left: 50%;
			top: 50%;
			/*width: 400px;
			height: 220px;*/
		}
		body {
  			/* Location of the image */
  			background-image: url(img/01.jpg);
  
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
	<!-- <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css"> -->
</head>
<body>

<div class="p-3 mb-2 bg- text-black">
<div class="container-fluid">
<!-- <div class="row">
	<div class="col-xl"></div>
	<div class="col-xl" style="width: 23rem; height: 16rem;"></div>
	<div class="col-xl"></div>
</div>
<div class="row">
<div class="col-xl"></div>
<div class="col-xl"> -->
<!-- <div class="tengah"> -->
<div class="row">
<div class="col-12 col-sm-12 col-md-6 col-xl-3 mx-auto" style="top:11rem;">

<div class="card" style="width: auto;">
	<div class="card-header bg-info text-white text-center"><h3>TRRAVEL</h3></div>
<div class="card-body">
	<!-- <h1 align="center">TRRAVEL</h1> -->
	<?php 
	if (isset($pesan)) {
		echo "<div class=\"alert alert-info\" role=\"alert\">$pesan</div>";
		//echo "<div class=\"pesan\">$pesan</div>";
	}
	if ($pesan_error!=="") {
		echo "<div class=\"alert alert-info\" role=\"alert\">$pesan_error</div>";
		//echo "<div class=\"error\">$pesan_error</div>";
	}
	?>
    <h4 class="card-title">Sign In</h4>
	<form action="index.php" method="post">
  	<div class="form-group">
    	<label for="username">Username </label>
    	<input type="text" class="form-control" name="username" id="username" value="<?php echo "$username"; ?>" required="" placeholder="username"></input>
  	</div>
  	<div class="form-group">
    	<label for="password">Password </label>
    	<input type="password" class="form-control" name="password" id="password" value="<?php echo "$password"; ?>" required="" placeholder="password"></input>
  	</div>
  	<button type="submit" name="submit" class="btn btn-info">Sign In</button>
 	Dont have an account? <a href="signup.php">Sign Up</a>
	</form>  
</div>
</div>
</div>
</div>

<!-- </div>
<div class="col-xl"></div>
</div>
<div class="row">
	<div class="col-xl"></div>
	<div class="col-xl" style="width: 23rem; height: 17rem;"></div>
	<div class="col-xl"></div>
</div> -->

</div>
</div>

<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script> -->

<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<!-- <script src="assets/jquery/jquery.js"></script>
<script src="assets/js/bootstrap.js"></script> -->
</body>
</html>