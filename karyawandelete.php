<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>
<!-- <div class="jumbotron jumbotron-fluid">
<div class="container-fluid">
<h1>Hapus Data</h1>
<div class="card" style="width: 40rem;">
<div class="card-body"> -->


	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-white bg-danger">
				<h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<text>Apakah anda yakin ingin menghapus data dari <?php echo $_GET['nik']; ?> ?</text>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<form action="menu.php?hal=karyawantampil" method="post">
					<input type="hidden" name="nik" id="nik">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>

<!-- <?php
if(isset($_GET['nik'])){
	if (empty($_GET['nik'])) {
		echo "<b>Data yang dihapus tidak ada</b>";
	}else{
		$delete=mysqli_query($mysqli, "DELETE FROM karyawan WHERE nik='$_GET[nik]'") or die("Mysql Error: ".mysqli_error($mysqli));
		if($delete){
			echo "Berhasil Hapus Data<br>";
			echo "<a href='menu.php?hal=karyawantampil'>Kembali</a>";
		}
	}
}
?> -->

<!-- </div>
</div>
</div>
</div> -->
</body>
</html>