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
session_start();
include "connect.php";
$nim = $_POST['nim'];
$password = $_POST['password'];

$sql = "
SELECT 
tbl_user.nim as nim,
tbl_user.password as password,
tbl_user.nama as nama 
FROM tbl_user
";
$sql2 = "
SELECT
tbl_admin.nim as nim
from tbl_admin
";

if(isset($_POST['submit'])){

$result = $conn->query($sql);
$result2 = $conn->query($sql2);

if ($result->num_rows > 0) {
    	session_unset();
    while($row = $result->fetch_assoc()) {
        	$s_nim = $_POST["nim"];
			$s_password = $_POST["password"];

			$_SESSION["nim"]=$row["nim"];
            $_SESSION["nama"]=$row["nama"];

        if (($s_nim==$row["nim"])&&($s_password==$row["password"])) {
        	$_SESSION["set"]=1;
            if ($result2->num_rows > 0) { while($row2 = $result2->fetch_assoc()) {
            if($s_nim==$row2["nim"]){
        	$_SESSION["priv"]="admin"; break; } else {
            $_SESSION["priv"]="other";  }}}
        	break;
        } else {
        	session_unset();

        }
    } 
} 
}

if (!isset($_SESSION['set'])) {
	session_unset();
	session_destroy();
    $pesan = "Maaf Username atau Password Yang Anda Masukkan Salah!";
    echo "<div class=\"alert alert-danger\">
         <p style=\"text-align: center;\">".$pesan.", <a href=\"../index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
    header('Refresh: 6; URL=../index.php');
} else {
    header('Refresh: 0; URL=../index.php');
}
?>