<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE kodet='$_GET[kodet]'");
$datashow=mysqli_fetch_array($data);
$member=mysqli_query($mysqli,"SELECT * FROM member");
$jadwal=mysqli_query($mysqli,"SELECT * FROM jadwal");
$fasilitas=mysqli_query($mysqli,"SELECT * FROM fasilitas");
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
				<form action="menu.php?hal=transaksitampil" method="POST">
					<div class="form-group row">
						<label for="kodet" class="col-sm-4 col-form-label">Kode Transaksi</label>
						<div class="col-sm-8">
							<input type="text" name="kodet" class="form-control" required="" id="kodet" value="<?php echo $datashow['kodet']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="idm" class="col-sm-4 col-form-label">ID Member</label>
						<div class="col-sm-8">
							<select class="custom-select" id="idm" name="idm" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($member)) { ?>
									<option value="<?php echo $show['id_member']; ?>"><?php echo $show['id_member']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="kodeo" class="col-sm-4 col-form-label">Kode Operasi</label>
						<div class="col-sm-8">
							<select class="custom-select" id="kodeo" name="kodeo" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($jadwal)) { ?>
									<option value="<?php echo $show['kode_operasi']; ?>"><?php echo $show['kode_operasi']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="kodef"" class="col-sm-4 col-form-label">Kode Fasilitas</label>
						<div class="col-sm-8">
							<select class="custom-select" id="kodef" name="kodef" required="">
								<option selected>Choose...</option>
								<?php while ($show=mysqli_fetch_array($fasilitas)) { ?>
									<option value="<?php echo $show['kodef']; ?>"><?php echo $show['kodef']; ?></option>
								<?php } ?>
 							 </select>
						</div>
					</div>
					<div class="form-group row">
						<label for="depart" class="col-sm-4 col-form-label">Berangkat</label>
						<div class="col-sm-8">
							<input type="time" name="depart" class="form-control" required="" id="depart" value="<?php echo $datashow['depart']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="tarif" class="col-sm-4 col-form-label">Tarif</label>
						<div class="col-sm-8">
							<input type="text" name="tarif" class="form-control" required="" id="tarif" value="<?php echo $datashow['tarif']; ?>" readonly>
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
