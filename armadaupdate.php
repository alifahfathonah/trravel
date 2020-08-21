<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM armada WHERE no_kendaraan='$_GET[no_kendaraan]'");
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
				<form action="menu.php?hal=armadatampil" method="POST">
					<div class="form-group row">
						<label for="no_kendaraan" class="col-sm-4 col-form-label">No Kendaraan</label>
						<div class="col-sm-8">
							<input type="text" name="no_kendaraan" class="form-control" required="" id="no_kendaraan" value="<?php echo $datashow['no_kendaraan']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="merk" class="col-sm-4 col-form-label">Merk</label>
						<div class="col-sm-8">
							<input type="text" name="merk" class="form-control" required="" id="merk" value="<?php echo $datashow['merk']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
						<div class="col-sm-8">
							<input type="text" name="tipe" class="form-control" required="" id="tipe" value="<?php echo $datashow['tipe']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="jumlah_kursi" class="col-sm-4 col-form-label">Jumlah Kursi</label>
						<div class="col-sm-8">
							<input type="text" name="jumlah_kursi" class="form-control" required="" id="jumlah_kursi" value="<?php echo $datashow['jumlah_kursi']; ?>">
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
