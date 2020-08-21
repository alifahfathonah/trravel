<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM rute WHERE kode_rute='$_GET[kode_rute]'");
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
				<form action="menu.php?hal=rutetampil" method="POST">
					<div class="form-group row">
						<label for="kode_rute" class="col-sm-4 col-form-label">Kode</label>
						<div class="col-sm-8">
							<input type="text" name="kode_rute" class="form-control" required="" id="kode_rute" value="<?php echo $datashow['kode_rute']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_rute" class="col-sm-4 col-form-label">Nama Rute</label>
						<div class="col-sm-8">
							<input type="text" name="nama_rute" class="form-control" required="" id="nama_rute" value="<?php echo $datashow['nama_rute']; ?>">
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
