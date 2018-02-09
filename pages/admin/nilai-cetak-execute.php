<?php

?>

<style type="text/css">
	
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 10px;
}


</style>

<?php 

include "connect.php";

$kode = $_POST['kode'];
$kelas = $_POST['kelas'];
$no = $_POST['no'];

$file="REKAP LAPORAN ".$kode." KELAS ".strtoupper($kelas).".xls";
header("Content-type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=$file");

$sql = "select 
        *,
        tbl_user.nama as nama,
        tbl_matakuliah.nama_matakuliah as matakuliah 
        from tbl_nilai
        inner join tbl_matakuliah on (tbl_matakuliah.kode_matakuliah = tbl_nilai.kode_matakuliah)
        inner join tbl_user on (tbl_user.nim = tbl_nilai.nim)
        where
        ('$kode' = '' or tbl_nilai.kode_matakuliah ='$kode')
        and ('$kelas' = '' or tbl_nilai.kelas ='$kelas')
        and ('$no' = '' or tbl_nilai.laporan ='$no')
        group by
        tbl_user.nama
        order by
        tbl_user.nim
        ";

$result = $conn->query($sql);
$no = 1;
?>

<table>

<tr>
	<td>Kode Matakuliah :</td>
	<td><?php echo $kode; ?></td>
</tr>
<tr>
	<td>Kelas :</td>
	<td><?php echo strtoupper($kelas); ?></td>
</tr>
	
<tr>
	<th>No.</th>
	<th>NIM</th>
    <th>Nama</th>
    <th>1</th> 
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
    <th>6</th>
    <th>7</th>
    <th>8</th>
    <th>9</th>
    <th>10</th>
</tr>

<?php
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) { 
    ?>
    <tr>
    	<td><?php echo $no; ?></td>
        <td><?php echo $row['nim']; ?></td>
        <td><?php echo $row['nama']; ?></td>

        <?php 

        	$nim = $row['nim'];
        	
        	$sql2 = "select nilai from tbl_nilai where nim='$nim' and kode_matakuliah='$kode' order by laporan";

        	$result2 = $conn->query($sql2);

        	foreach ($result2 as $row) {
        		echo "<td>".$row['nilai']."</td>";
        	}

         ?>

    </tr>
    <?php
    $no++;
    }
}

?>

</table>

