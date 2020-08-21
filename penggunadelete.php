<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>

	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header text-white bg-danger">
				<h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<text>Apakah anda yakin ingin menghapus data dari <?php echo $_GET['username']; ?> ?</text>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
				<form action="menu.php?hal=penggunatampil" method="post">
					<input type="hidden" name="username" id="username" value="<?php echo $_GET['username']; ?>">
					<input type="submit" name="delete" value="Delete" class="btn btn-danger">
				</form>
			</div>
		</div>
	</div>

</body>
</html>