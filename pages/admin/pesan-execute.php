<?php 

include "connect.php";

if (isset($_POST['btnp'])) {
	if ($_POST['btnp'] == "selesai") {

		$no_bantuan = $_POST['no_bantuan'];
		$balasan = $_POST['balasan'];

		$sql = "update tbl_bantuan set status = 'selesai', balasan = '$balasan' where no_bantuan = '$no_bantuan';";

		if( $conn->query($sql) === true ) {
				pesan_sukses('Pesan ini telah berhasil diproses', 'pesan');
		} else {
				pesan_gagal('Pesan ini gagal diproses', 'pesan');
		}

		header('Refresh: 3; URL=../index.php?page=pesan');

	}

	if ($_POST['btnp'] == "delete") {
		
		$no_bantuan = $_POST['no_bantuan'];

		$sql = "delete from tbl_bantuan where no_bantuan = '$no_bantuan';";

		if( $conn->query($sql) === true ) {
				pesan_sukses('Pesan ini berhasil dihapus', 'pesan');
		} else {
				pesan_gagal('Pesan ini gagal dihapus', 'pesan');
		}

		header('Refresh: 3; URL=../index.php?page=pesan');

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