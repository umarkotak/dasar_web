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

<?php if (isset($_POST['submit-btn'])) { ?>

<?php

// ============================================================================ Delete user

	if ($_POST['submit-btn']=="delete") {

		include "connect.php";

		$nim = $_POST['nim'];

		$sql = "delete from tbl_nilai where nim = '$nim';";
		$sql2 = "delete from tbl_user where nim = '$nim';";

		if( $conn->query($sql) === true ) {
			if( $conn->query($sql2) === true ) {
				pesan_sukses('Data berhasil dihapus', 'setting-account');
			}
		} else {
				pesan_gagal('Data gagal dihapus', 'setting-account');
		}

		header('Refresh: 3; URL=../index.php?page=setting-account');
	}

// ============================================================================ Edit user

	if ($_POST['submit-btn']=="edit") {
		
		include "connect.php";

		$nim = $_POST['nim'];
		$kode_matakuliah = $_POST['kode_matakuliah'];
		$kelas = $_POST['kelas'];
		$laporan = $_POST['laporan'];

		$nilai = $_POST['nilai'];

		// echo $nim;
		// echo $nilai;

		$sql = "update tbl_nilai set nilai = $nilai where nim = '$nim' and kode_matakuliah = '$kode_matakuliah' and kelas = '$kelas' and laporan = '$laporan';";

		if( $conn->query($sql) === true ) {
				pesan_sukses('Data berhasil dirubah', 'rekapnilai');
		} else {
				pesan_gagal('Data gagal dihapus', 'rekapnilai');
		}

		header('Refresh: 3; URL=../index.php?page=rekapnilai');

	}

// ============================================================================ Make admin

	if ($_POST['submit-btn']=="admin") {
		
		include "connect.php";

		$nim = $_POST['nim'];

		$sql = "insert into tbl_admin values ('$nim')";

		if( $conn->query($sql) === true ) {
			pesan_sukses('User berhasil menjadi admin', 'setting-account');
		} else {
			pesan_gagal('User gagal menjadi admin', 'setting-account');
		}

	}

// ============================================================================ Delete nilai

	if ($_POST['submit-btn']=="delete-nilai") {
		
		include "connect.php";

		$nim = $_POST['nim'];
		$laporan = $_POST['laporan'];
		$kode_matakuliah = $_POST['kode_matakuliah'];
		$nilai = $_POST['nilai'];

		$sql = "delete from tbl_nilai where nim = '$nim' and laporan = '$laporan' and kode_matakuliah = '$kode_matakuliah' and nilai = '$nilai';";

		if( $conn->query($sql) === true ) {
			pesan_sukses('Data berhasil dihapus', 'rekapnilai');
		} else {
			pesan_gagal('Data gagal dihapus', 'rekapnilai');
		}

		header('Refresh: 3; URL=../index.php?page=rekapnilai');

	}

?>

<?php } ?>


<?php 

function pesan_sukses($pesan, $page){
	echo "<div class=\"alert alert-success\"><p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php?page=$page\" class=\"alert-link\">Kembali</a>.</p></div>";
}
function pesan_gagal($pesan, $page){
	echo "<div class=\"alert alert-danger\"><p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php?page=$page\" class=\"alert-link\">Kembali</a>.</p></div>";
}

 ?>