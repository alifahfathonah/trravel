<?php 
$databasehost="localhost";
$databaseuser="root";
$databasepass="";
$check=mysqli_connect($databasehost,$databaseuser,$databasepass);
if (!$check) {
	die("Koneksi gagal, ada masalah pada: ".mysqli_connect_errno()." - ".mysqli_connect_error());
}

$mysqlquery="CREATE DATABASE IF NOT EXISTS trravel";
$hasilquery=mysqli_query($check, $mysqlquery);
if(!$hasilquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Database <b>'trravel'</b> berhasil dibuat, silahkan cek pada phpmyadmin...<br>";
}

$hasilquery=mysqli_select_db($check, "trravel");
if(!$hasilquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Database <b>'trravel'</b> berhasil dipilih...<br>";
}

$mysqlquery="DROP TABLE IF EXISTS pengguna";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if (!$hasil_mysqlquery) {
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'pengguna'</b> berhasil dihapus, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="CREATE TABLE pengguna(username VARCHAR(50), password CHAR(20), nama VARCHAR(50), peran VARCHAR(30))";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if (!$hasil_mysqlquery) {
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'pengguna'</b> berhasil dibuat, silahkan cek pada phpmyadmin...<br>";
}

$username="admin";
$pass="admin";
$nama="Tahta Reza";
$peran="administrator";
$mysqlquery="INSERT INTO pengguna VALUES ('$username','$pass', '$nama', '$peran')";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if(!$hasil_mysqlquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'pengguna'</b> berhasil diisi, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="DROP TABLE IF EXISTS karyawan";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if(!$hasil_mysqlquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'karyawan'</b> berhasil dihapus, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="CREATE TABLE karyawan (nik CHAR(10), nama VARCHAR(50), jenis_kelamin VARCHAR(20), no_hp VARCHAR(15), jenis_karyawan VARCHAR(20))";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if(!$hasil_mysqlquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'karyawan'</b> berhasil dibuat, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="INSERT INTO karyawan VALUES";
$mysqlquery.="(1541720001, 'Tahta Reza', 'perempuan', '081291634919', 'administrator'),";
$mysqlquery.="(1541720002, 'Pairi', 'laki-laki', '081335682502', 'sopir')";
$hasil_mysqlquery=mysqli_query($check,$mysqlquery);
if (!$hasil_mysqlquery) {
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'karyawan'</b> berhasil diisi, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="DROP TABLE IF EXISTS armada";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if(!$hasil_mysqlquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'armada'</b> berhasil dihapus, silahkan cek pada phpmyadmin...<br>";
}

$mysqlquery="CREATE TABLE armada (no_kendaraan CHAR(15), merk VARCHAR(30), tipe VARCHAR(50), jumlah_kursi integer)";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
if(!$hasil_mysqlquery){
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'armada'</b> berhasil dibuat, silahkan cek pada phpmyadmin...<br>";
}

$no_kendaraan="AG 6714 XY";
$merk="Honda";
$tipe="F5";
$jumlah_kursi=15;
$mysqlquery="INSERT INTO armada VALUES ('$no_kendaraan','$merk', '$tipe', '$jumlah_kursi')";
$hasil_mysqlquery=mysqli_query($check, $mysqlquery);
// $mysqlquery="INSERT INTO armada VALUES";
// $mysqlquery.="(AG 6714 XY, 'Honda', 'F5', 15)";
// $hasil_mysqlquery=mysqli_query($check,$mysqlquery);
if (!$hasil_mysqlquery) {
	die("mysqlquery Error: ".mysqli_errno($check)." - ".mysqli_error($check));
}else{
	echo "Tabel <b>'armada'</b> berhasil diisi, silahkan cek pada phpmyadmin...<br>";
}

mysqli_close($check);

 ?>
