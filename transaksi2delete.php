<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-white bg-danger">
				<h5 class="modal-title" id="exampleModalLabel">Canceling Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<text>Apakah anda yakin ingin membatalkan transaksi ini <?php echo $_GET['kodet']; ?> ?</text>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
				<form action="menu.php?hal=transaksi2tampil" method="post">
					<input type="hidden" name="kodet" id="kodet" value="<?php echo $_GET['kodet']; ?>">
					<input type="submit" name="delete" value="Ya" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>

</body>
</html>