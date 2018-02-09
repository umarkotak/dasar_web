<!DOCTYPE html>
<html lang="en">

<?php include "head.php"; ?>

<?php  
session_start();
if(isset($_SESSION['hapus']))	{ $hapus = $_SESSION['hapus'];   }
if(isset($_SESSION['materi']))	{ $materi = $_SESSION['materi']; }
if(isset($_SESSION['tugas']))	{ $tugas = $_SESSION['tugas'];   }
if(isset($_SESSION['ujian']))	{ $ujian = $_SESSION['ujian'];   }
if(isset($_SESSION['pesan']))	{ $pesan = $_SESSION['pesan'];   }
?>

<div class="panel-body">
<?php

if(isset($hapus)){
if ($hapus=="1") {
	echo "<div class=\"alert alert-success\">
		 <p style=\"text-align: center;\">File Berhasil Dihapus, <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
} else
if ($hapus=="0") {
	echo "<div class=\"alert alert-danger\">
		 <p style=\"text-align: center;\">File Gagal Dihapus, <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
}} else
if(isset($materi)){
if ($materi=="1") {
	echo "<div class=\"alert alert-success\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
} else
if ($materi=="0") {
	echo "<div class=\"alert alert-danger\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
}} else
if(isset($tugas)){
if ($tugas=="1") {
	echo "<div class=\"alert alert-success\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
} else
if ($tugas=="0") {
	echo "<div class=\"alert alert-danger\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
}} else
if(isset($ujian)){
if ($ujian=="1") {
	echo "<div class=\"alert alert-success\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
} else
if ($ujian=="0") {
	echo "<div class=\"alert alert-danger\">
		 <p style=\"text-align: center;\">".$pesan." <a href=\"index.php\" class=\"alert-link\">Kembali</a>.</p>
    </div>";
}}

?>
</div>

<?php header('Refresh: 5; URL=index.php'); ?>