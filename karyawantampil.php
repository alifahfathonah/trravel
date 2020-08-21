<?php
include "connection.php";
if (isset($_POST['add'])) {
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$no_hp=$_POST['no_hp'];
	$jenis_karyawan=$_POST['jenis_karyawan'];

	$data=mysqli_query($mysqli, "INSERT INTO karyawan SET nik='$nik', nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', jenis_karyawan='$jenis_karyawan'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php 
if (isset($_POST['update'])) {
	$nik=$_POST['nik'];
	$nama=$_POST['nama'];
	$jenis_kelamin=$_POST['jenis_kelamin'];
	$no_hp=$_POST['no_hp'];
	$jenis_karyawan=$_POST['jenis_karyawan'];

	$data=mysqli_query($mysqli, "UPDATE karyawan SET nik='$nik', nama='$nama', jenis_kelamin='$jenis_kelamin', no_hp='$no_hp', jenis_karyawan='$jenis_karyawan' WHERE nik='$nik'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}
?>
<?php
if(isset($_POST['delete'])){
	$nik=$_POST['nik'];
	$data=mysqli_query($mysqli, "DELETE FROM karyawan WHERE nik='$nik'") or die("data salah: ".mysqli_error($mysqli));
	if ($data) {
		echo "<div class=\"alert alert-success\" role=\"alert\">Success</div>";
	}else{
		echo "<div class=\"alert alert-danger\" role=\"alert\">Failed</div>";
	}
}

// membaca kode barang terbesar
$hasil = mysqli_query($mysqli, "SELECT max(nik) as maxKode FROM karyawan");
$data  = mysqli_fetch_array($hasil);
$kodef = $data['maxKode'];
// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodef, 6, 4);
// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;
// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "154172";
$kode = $char . sprintf("%04s", $noUrut);
?>

<!DOCTYPE html>
<html>
<head>
	<title>TRRAVEL</title>
</head>
<body>
<div class="jumbotron jumbotron-fluid bg-primary text-black">
<div class="container-fluid">
<div class="row">
  <div class="col-12 col-sm-12 col-md-12 col-xl-8 mx-auto">

<div class="card" style="width: auto;">
<div class="card-body">
<h1><p align="center">Data Karyawan</p></h1><br>
		<div class="row">
		<div class="col-8">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add"><i class="fa fa-plus" aria-hidden="true"></i> Add</button>
			<!-- <a id="add_data" data-toggle="modal" data-target="#add" href="karyawanadd.php"><button type="button" class="btn btn-success"><i class="fa fa-plus" aria-hidden="true"></i> Add</button></a> -->
			<a href="karyawanprint.php"><button type="button" class="btn btn-warning"><i class="fa fa-print" aria-hidden="true"></i> Print</button></a>
		</div>
		<div class="col-2"></div>
		<div class="col-2">
 		<!-- <form class="form-inline my-2 my-lg-0" action="menu.php?hal=karyawansearch" method="post">
      		<input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="cari">
      		<button class="btn btn-outline-info my-2 my-sm-0" type="submit" name="search"><span class="glyphicon glyphicon-search"></span> Search</button>
    	</form> -->
		</div>
		</div>

<br>
<div style="overflow-x:auto;">
<table class="table table-striped table-bordered data">
  <thead class="thead-dark">
    <tr>
    	<th scope="col">No</th>
      <th scope="col">NIK</th>
      <th scope="col">Nama</th>
      <th scope="col">Jenis Kelamin</th>
      <th scope="col">No HP</th>
      <th scope="col">Jenis Karyawan</th>
      <th scope="col">Opsi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
	$karyawan=mysqli_query($mysqli,"SELECT * FROM karyawan");
	$no=1;

	while ($show=mysqli_fetch_array($karyawan)) {
	 ?>
	 <tr>
	 	<td><?php echo $no; ?></td>
	 	<td><?php echo $show['nik']; ?></td>
	 	<td><?php echo $show['nama']; ?></td>
	 	<td><?php echo $show['jenis_kelamin']; ?></td>
	 	<td><?php echo $show['no_hp']; ?></td>
	 	<td><?php echo $show['jenis_karyawan']; ?></td>
	 	<td>
	 		<div class="dropdown">
				<button class="btn btn-default btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Aksi</button>
				<div class="dropdown-menu bg-" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item text-info" id="edit_data" data-toggle="modal" data-target="#edit" href="karyawanupdate.php?nik=<?php echo $show['nik']; ?>">Edit</a>
					<!-- <?php echo "<a class='dropdown-item text-primary' href='#edit' data-toggle='modal' data-id=".$show['nik'].">Edit</a>"; ?> -->
					<a class="dropdown-item text-danger" id="delete_data" data-toggle="modal" data-target="#delete" href="karyawandelete.php?nik=<?php echo $show['nik']; ?>">Delete</a>
				</div>
			</div>
	 		<!-- <a href="menu.php?hal=karyawanupdate&nik=<?php echo $show['nik']; ?>"><button type="button" class="btn btn-info">Edit</button></a>
	 		<a href="menu.php?hal=karyawandelete&nik=<?php echo $show['nik']; ?>"><button type="button" class="btn btn-danger">Delete</button></a> -->
	 	</td>
	 </tr>
	 <?php $no++;
	  } ?>
  </tbody>
</table>
</div>

</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"></div>
<div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success text-white">
        <h4 class="modal-title" id="exampleModalLabel">Add Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="menu.php?hal=karyawantampil" method="POST">
          <div class="form-group row">
            <label for="nik" class="col-sm-4 col-form-label">NIK</label>
            <div class="col-sm-8">
              <input type="text" name="nik" class="form-control" required="" id="nik" value="<?php echo $kode ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label for="nama" class="col-sm-4 col-form-label">Nama</label>
            <div class="col-sm-8">
              <input type="text" name="nama" class="form-control" required="" id="nama">
            </div>
          </div>
          <div class="form-group row">
            <label for="jk" class="col-sm-4 col-form-label">Jenis Kelamin</label>
            <div class="col-sm-8">
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk1" value="laki-laki">
                &nbsp<label class="form-check-label">Laki - Laki</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="jk2" value="perempuan">
                &nbsp<label class="form-check-label">Perempuan</label>
              </div>
            </div>
          </div>
          <div class="form-group row">
            <label for="no_hp" class="col-sm-4 col-form-label">No HP</label>
            <div class="col-sm-8">
              <input type="text" name="no_hp" class="form-control" required="" id="no_hp">
            </div>
          </div>
          <div class="form-group row">
            <label for="jenis_karyawan" class="col-sm-4 col-form-label">Jenis Karyawan</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="jenis_karyawan" id="jenis_karyawan" required="">
            </div>
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <input type="submit" name="add" value="Add" class="btn btn-success">
        </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- <div class="modal fade" id="edit" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Edit Data</h4>
                </div>
                <div class="modal-body">
                    <div class="fetched-data"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div> -->
<!-- <script type="text/javascript">
    $(document).ready(function(){
        $('#edit').on('show.bs.modal', function (e) {
            var rowid = $(e.relatedTarget).data('id');
            //menggunakan fungsi ajax untuk pengambilan data
            $.ajax({
                type : 'post',
                url : 'karyawanupdate.php',
                data :  'rowid='+ rowid,
                success : function(data){
                $('.fetched-data').html(data);//menampilkan data ke dalam modal
                }
            });
         });
    });
  </script> -->

	</div>
</div>
</div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $('#add').on('show.bs.modal', function (event) {
      var modal = $(this)
    });
    // $('a#add_data').click(function(){
    //       var url=$(this).attr('href');
    //       $.ajax({
    //           url:url,
    //           success:function(response){
    //             $('#add').html(response);
    //           }
    //         });
    //     });

    $('a#edit_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#edit').html(response);
              }
            }
          );
        }
      );

    $('a#delete_data').click(function(){
          var url=$(this).attr('href');
          $.ajax({
              url:url,
              success:function(response){
                $('#delete').html(response);
              }
            }
          );
        }
      );

    $('.data').DataTable();  
  });
</script>
</body>
</html>