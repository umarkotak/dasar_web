<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BASIC LABORATORY</title>

    <!-- Bootstrap Core CSS -->
    <link href="../../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<?php
include "connect.php";

$nim = $_POST['nim'];
$nama = strtolower($_POST['nama']);
$password = $_POST['password'];
$passwordc = $_POST['passwordc'];
$jenis = $_POST['btn'];

if ($password == $passwordc) {
	$sql  = "INSERT INTO tbl_user VALUES ('$nim','$nama','$password');";

	if ($conn->query($sql) === TRUE) {
		$pesan = "pendaftaran berhasil";
		$err = 0;
	} else {
		$pesan = "pendaftaran gagal";
		$err = 1;
	}
} else {
	$pesan = "pendaftaran gagal";
	$err = 1;
}

if ($err == 0) {
	echo "<div class=\"alert alert-success\">
		 <p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
} else
if ($err == 1) {
	 echo "<div class=\"alert alert-danger\">
		 <p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
}

header('Refresh: 6; URL=../index.php');