<?php 
include 'connection.php';

$tr=mysqli_query($mysqli, "SELECT * FROM transaksi WHERE kodet='$_GET[kodet]'");
$str=$tr->fetch_assoc();
// $str=mysqli_fetch_array($tr);
$kodet=$str['kodet'];
$departure=$str['depart'];
$tarif=$str['tarif'];
$kodef=$str['kodef'];
$fas=mysqli_query($mysqli, "SELECT * FROM fasilitas WHERE kodef='$kodef' ");
$sfas=mysqli_fetch_array($fas);
$fa=$sfas['namaf'];


$mb=mysqli_query($mysqli, "SELECT * FROM member WHERE id_member='$_GET[idm]' ");
// $smb=$mb->fetch_assoc();
$smb=mysqli_fetch_array($mb);
$name=$smb['nama_member'];
$nohp=$smb['nohp_member'];

$jd=mysqli_query($mysqli, "SELECT * FROM jadwal WHERE kode_operasi='$_GET[kodeo]'");
$sjd=$jd->fetch_assoc();
// $sjd=mysqli_fetch_array($jd);
$date=$sjd['tgl_operasi'];
$r=$sjd['kode_rute'];
$rt=mysqli_query($mysqli, "SELECT * FROM rute WHERE kode_rute='$r'");
$srt=$rt->fetch_assoc();
// $srt=mysqli_fetch_array($rt);
$nrt=$srt['nama_rute'];
?>

 <!DOCTYPE html>
 <html>
 <head>
 	<title>TRRAVEL</title>
 	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
 </head>
 <body>

<div class="container-fluid">
<div class="card" style="width: 23rem;">
	<div class="card-header bg-info text-white text-center"><h3>TRRAVEL</h3></div>
<div class="card-body">
    <h4 class="card-title"></h4>
	<table class="table table-striped">
		<tbody>
			<tr>
				<td>Name</td>
				<td>: <?php echo "$name"; ?></td>
			</tr>
			<tr>
				<td>Phone Number</td>
				<td>: <?php echo "$nohp"; ?></td>
			</tr>
			<tr>
				<td>No Transaction</td>
				<td>: <?php echo "$kodet"; ?></td>
			</tr>
			<tr>
				<td>Destination</td>
				<td>: <?php echo "$nrt"; ?></td>
			</tr>
			<tr>
				<td>Date</td>
				<td>: <?php echo "$date"; ?></td>
			</tr>
			<tr>
				<td>Departure</td>
				<td>: <?php echo "$departure"; ?></td>
			</tr>
			<tr>
				<td>Facilities</td>
				<td>: <?php echo "$fa"; ?></td>
			</tr>
			<tr>
				<td>Cost</td>
				<td>: <?php echo "Rp. "."$tarif"; ?></td>
			</tr>
		</tbody>
	</table>
</div>
</div>
</div>
 
<script>
	window.load=print_d();
	function print_d(){
		window.print();
	}
</script>
</body>
</html>
