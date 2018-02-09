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
$err = 0;

if ($_POST['btn']=="materi") {
	$matakuliah = $_POST['matakuliah'];
	$jenis = $_POST['btn'];
	$target_dir = "../../upload/".$jenis."/".$matakuliah."/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$pesan = "File <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> berhasil di upload.";
	} else {
		$pesan = "Maaf, terjadi kesalahan dalam upload file.";
		$err = 1;
	}
} else
if ($_POST['btn']=="tugas") {
	$jenis = $_POST['btn'];
	$nim = strtoupper($_POST['nim']);
	$nama = strtoupper($_POST['nama']);
	$kelas = strtoupper($_POST['kelas']);
	$matakuliah = $_POST['matakuliah'];
	$mm = strtoupper($matakuliah);
	$target_dir = "../../upload/".$jenis."/".$matakuliah."/";
	
	$filefix = $mm . "_" . $kelas . "_" . $nim . "_" . $nama;
	
	$target_file_origin = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$fileType = pathinfo($target_file_origin,PATHINFO_EXTENSION);
	
	$target_file = $target_dir . $filefix . "." . $fileType;
	
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$pesan = "File <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> -> <b>".$filefix."</b> berhasil di upload.";
	} else {
    	$pesan = "Maaf, terjadi kesalahan dalam upload file.";
    	$err = 1;
	}
} else
if ($_POST['btn']=="ujian") {
	$jenis = $_POST['btn'];
	$nim = strtoupper($_POST['nim']);
	$nama = strtoupper($_POST['nama']);
	$kelas = strtoupper($_POST['kelas']);
	$matakuliah = $_POST['matakuliah'];
	$target_dir = "../../upload/".$jenis."/".$matakuliah."/";
	$filefix = "UJIAN_".$nim . "_" . $nama . "_" . $kelas;
	$target_file_origin = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$fileType = pathinfo($target_file_origin,PATHINFO_EXTENSION);
	$target_file = $target_dir . $filefix . "." . $fileType;
	if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		$pesan = "File <b>". basename( $_FILES["fileToUpload"]["name"]). "</b> -> <b>".$filefix."</b> berhasil di upload.";
	} else {
    	$pesan = "Maaf, terjadi kesalahan dalam upload file.";
    	$err = 1;
	}
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