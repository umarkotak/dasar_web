<?php       
    $nama = $_SESSION['nama'];
    $nim = $_SESSION['nim'];
    
    function profilepribadi($nim){
    include "connect.php";
    $sql = "select
        *,
        tbl_user.nama as nama,
        tbl_matakuliah.nama_matakuliah as matakuliah 
        from tbl_nilai
        inner join tbl_matakuliah on (tbl_matakuliah.kode_matakuliah = tbl_nilai.kode_matakuliah)
        inner join tbl_user on (tbl_user.nim = tbl_nilai.nim)
        where tbl_user.nim = '$nim'
        ";
    
    $result = $conn->query($sql);
    $no = 1;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['matakuliah']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['laporan']; ?></td>
            <td><?php echo $row['tgl_kumpul']; ?></td>                
            <td><?php echo $row['nilai']; ?></td>
        </tr>
        <?php
        $no++;
        }
    }
    }
?>

<!-- Page Content -->
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">User Profile</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>

        <div class="row">
            <div class="col-lg-12">

                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>Data Nilai</p>
                    </div>

                    <div class="panel-body">
                        <table width="100%" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Matakuliah </th>
                                    <th>Kelas </th>
                                    <th>No Laporan </th>
                                    <th>Tanggal Kumpul</th>
                                    <th>Nilai</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php profilepribadi($nim); ?>
                            </tbody>
                        </table>
                    </div>

                    <div class="panel-footer">
                        
                    </div>
                </div>
            
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <p>Pesan Bantuan</p>
                    </div>

                    <div class="panel-body">
                        <?php 

                            include "connect.php";

                            $sql = "select * from tbl_bantuan where nama = '$nama'";
                            $no = 1;

                            $result = $conn->query($sql);

                            ?>

                            <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                
                                <tr>
                                    <th width="5%">No.</th>
                                    <th>Judul Keluhan</th>
                                    <th>Jawaban</th>
                                    <th width="10%">Status</th>
                                </tr>

                            

                            <?php

                            foreach ($result as $row) {
                                echo "<tr>";
                                echo "<td>" . $no . "</td>";
                                echo "<td>" . $row['judul'] . "</td>";
                                echo "<td>" . $row['balasan'] . "</td>";
                                echo "<td>" . $row['status'] . "</td>";
                                echo "</tr>";
                            }

                         ?>
                            </table>
                            </div>
                    </div>

                    <div class="panel-footer">
                        
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>