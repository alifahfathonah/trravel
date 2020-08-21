<?php 
include "connection.php";
$data=mysqli_query($mysqli, "SELECT * FROM jadwal WHERE kode_operasi='$_GET[kode_operasi]'");
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
				<h4 class="modal-title" id="exampleModalLabel">Add Data</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="menu.php?hal=jadwaltampil" method="POST">
					<div class="form-group row">
						<label for="kode_operasi" class="col-sm-4 col-form-label">Kode Operasi</label>
						<div class="col-sm-8">
							<input type="text" name="kode_operasi" class="form-control" required="" id="kode_operasi" value="<?php echo $datashow['kode_operasi']; ?>" readonly>
						</div>
					</div>
					<div class="form-group row">
						<label for="tgl_operasi" class="col-sm-4 col-form-label">Tanggal Operasi</label>
						<div class="col-sm-8">
							<input type="date" name="tgl_operasi" class="form-control" required="" id="tgl_operasi" value="<?php echo $datashow['tgl_operasi']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="waktumulai_operasi" class="col-sm-4 col-form-label">Waktu Mulai</label>
						<div class="col-sm-8">
							<input type="time" name="waktumulai_operasi" class="form-control" required="" id="waktumulai_operasi" value="<?php echo $datashow['waktumulai_operasi']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="waktuselesai_operasi" class="col-sm-4 col-form-label">Waktu Selesai</label>
						<div class="col-sm-8">
							<input type="time" name="waktuselesai_operasi" class="form-control" required="" id="waktuselesai_operasi" value="<?php echo $datashow['waktuselesai_operasi']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="tarif_operasi"" class="col-sm-4 col-form-label">Tarif</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="tarif_operasi" id="tarif_operasi" required="" value="<?php echo $datashow['tarif_operasi']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="nik" class="col-sm-4 col-form-label">NIK</label>
						<div class="col-sm-8">
							<input type="text" name="nik" class="form-control" required="" id="nik" value="<?php echo $datashow['nik']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="no_kendaraan" class="col-sm-4 col-form-label">No Kendaraan</label>
						<div class="col-sm-8">
							<input type="text" name="no_kendaraan" class="form-control" required="" id="no_kendaraan" value="<?php echo $datashow['no_kendaraan']; ?>">
						</div>
					</div>
					<div class="form-group row">
						<label for="kode_rute" class="col-sm-4 col-form-label">Kode Rute</label>
						<div class="col-sm-8">
							<input type="text" class="form-control" name="kode_rute" id="kode_rute" required="" value="<?php echo $datashow['kode_rute']; ?>">
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
