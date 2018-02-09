<?php
include "connect.php";

$nim = $_POST['nim'];
$matakuliah = $_POST['matakuliah'];
$kelas = strtoupper($_POST['kelas']);
$nolap = $_POST['nomor'];
$jenis = $_POST['btn'];
$nilai = $_POST['nilai'];
$H =  date("H")+5;
$date = date("Y-m-d $H:i:s");

$sqlcek = "select * from tbl_nilai where nim='$nim' and kode_matakuliah='$matakuliah' and kelas='$kelas' and laporan='$nolap'";

	$result = $conn->query($sqlcek);

	
	if ($result->num_rows >0) {
		$pesan = "Nilai sudah ada";
		$err = 1;
	} else {
		$sql  = "INSERT INTO tbl_nilai VALUES ('$nim','$matakuliah','$kelas','$nolap','$date',$nilai);";

		if ($conn->query($sql) === TRUE) {
			$pesan = $nim." laporan ke - ".$nolap." Dengan Nilai = ".$nilai." Berhasil Di Input";
			$err = 0;
		} else {
			$pesan = "Nilai Gagal Di Input";
			$err = 1;
		}
	}


	

if ($err == 0) {
	echo "<div class=\"alert alert-success alert-dismissable\">
		 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		 <p style=\"text-align: center;\">".$pesan." - ".$date.", .</p>
    </div>";
} else
if ($err == 1) {
	 echo "<div class=\"alert alert-danger alert-dismissable\">
	 	 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
		 <p style=\"text-align: center;\">".$pesan." - ".$date.", .</p>
    </div>";
}



?>

<?php 
 

function checked($kode, $matakuliah){
    if ($kode == $matakuliah) {
        echo "selected=\"true\"";
    }
}
?>