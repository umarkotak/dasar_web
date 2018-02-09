<?php 


if (isset($_POST['submit-btn'])) {
	
	if ($_POST['submit-btn']=="active") {

		include "connect.php";

		$kode = $_POST['kode_matakuliah'];
		
		$sql = "update tbl_matakuliah set status = 1 where kode_matakuliah = '$kode'";

		if($conn->query($sql)==true) {

			header('Refresh: 0; URL=../index.php?page=setting-account');

		} else {

			echo $conn->error();

		}


		
	}

	if ($_POST['submit-btn']=="deactive") {
		
		include "connect.php";

		$kode = $_POST['kode_matakuliah'];
		
		$sql = "update tbl_matakuliah set status = 0 where kode_matakuliah = '$kode'";

		if($conn->query($sql)==true) {

			header('Refresh: 0; URL=../index.php?page=setting-account');

		} else {

			echo $conn->error();

		}
	}

	if ($_POST['submit-btn']=="tambah_matkul") {
		
		include "connect.php";

		$kode_matakuliah = $_POST['kode_matakuliah'];
		$nama_matakuliah = $_POST['nama_matakuliah'];
		$sks = $_POST['sks'];
		$status = $_POST['status'];
		$page = $_POST['page'];

		$sql = "insert into tbl_matakuliah values ('$kode_matakuliah','$nama_matakuliah','$sks','$status','$page')";

		if($conn->query($sql)==true) {

			header('Refresh: 0; URL=../index.php?page=setting-account');

		} else {

			echo $conn->error();

		}

	}


	if ($_POST['submit-btn']=="tambah_jadwal") {
		
		include "connect.php";

		$kode_jadwal = strtoupper($_POST['kode_jadwal']);
		$kode_matakuliah = strtoupper($_POST['kode_matakuliah']);
		$kelas = strtoupper($_POST['kelas']);
		$hari = strtolower($_POST['hari']);
		$jam_mulai = $_POST['jam_mulai'];
		$jam_selesai = $_POST['jam_selesai'];
		$lab = strtoupper($_POST['lab']);
		$asisten = $_POST['asisten'];

		$sql = "insert into tbl_jadwal_lab values ('$kode_jadwal','$kode_matakuliah','$kelas','$hari','$jam_mulai','$jam_selesai','$lab','$asisten')";

		if($conn->query($sql)==true) {

			header('Refresh: 0; URL=../index.php?page=setting-account');

		} else {

			echo $conn->error();

		}

	}

	if ($_POST['submit-btn']=="jadwal_delete") {
		
		include "connect.php";

		$kode_jadwal = $_POST['kode_jadwal'];

		$sql = "delete from tbl_jadwal_lab where kode_jadwal = '$kode_jadwal';";

		echo $kode_jadwal;
		if( $conn->query($sql) === true ) {
			pesan_sukses('Data berhasil dihapus', 'setting-account');
		} else {
			pesan_gagal('Data gagal dihapus', 'setting-account');
		}

		header('Refresh: 3; URL=../index.php?page=setting-account');

	}


}


 ?>

 <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BASIC LABORATORY</title>

    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<?php 

function pesan_sukses($pesan, $page){
	echo "<div class=\"alert alert-success\"><p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php?page=$page\" class=\"alert-link\">Kembali</a>.</p></div>";
}
function pesan_gagal($pesan, $page){
	echo "<div class=\"alert alert-danger\"><p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php?page=$page\" class=\"alert-link\">Kembali</a>.</p></div>";
}


 ?>