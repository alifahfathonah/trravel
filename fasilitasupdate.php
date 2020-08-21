<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM fasilitas WHERE kodef='$_GET[kodef]'");
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
				<form action="menu.php?hal=fasilitastampil" method="POST">
					<div class="form-group row">
						<label for="kodef" class="col-sm-4 col-form-label">Kode</label>
						<div class="col-sm-8">
							<input type="text" name="kodef" class="form-control" required="" id="kodef" value="<?php echo $datashow['kodef']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="namaf" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="namaf" class="form-control" required="" id="namaf" value="<?php echo $datashow['namaf']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="hargaf" class="col-sm-4 col-form-label">Harga</label>
						<div class="col-sm-8">
							<input type="text" name="hargaf" class="form-control" required="" id="hargaf" value="<?php echo $datashow['hargaf']; ?>">
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
