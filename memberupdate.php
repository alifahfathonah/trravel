<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM member WHERE id_member='$_GET[id_member]'");
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
				<form action="menu.php?hal=membertampil" method="POST">
					<div class="form-group row">
						<label for="id_member" class="col-sm-4 col-form-label">ID</label>
						<div class="col-sm-8">
							<input type="text" name="id_member" class="form-control" required="" id="id_member" value="<?php echo $datashow['id_member']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="nama_member" class="col-sm-4 col-form-label">Nama</label>
						<div class="col-sm-8">
							<input type="text" name="nama_member" class="form-control" required="" id="nama_member" value="<?php echo $datashow['nama_member']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
						<div class="col-sm-8">
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
						<label for="nohp_member" class="col-sm-4 col-form-label">No Hp</label>
						<div class="col-sm-8">
							<input type="text" name="nohp_member" class="form-control" required="" id="nohp_member" value="<?php echo $datashow['nohp_member']; ?>">
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
