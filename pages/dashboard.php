 <div id="page-wrapper">
            <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Welcome to Basic Laboratory</strong>
                        </div>
                        <div class="panel-body">
                            <p>Selamat datang kepada mahasiswa dan mahasiswi baru STT-PLN, Lab Basic merupakan Lab komputer yang digunakan untuk mempelajari berbagai matakuliah pada bidang informatika. Dikhususkan dalam mempelajari Bahasa pemrograman. </p>
                        </div>
                        <div class="panel-footer">
                            <!-- <a href="#">Detail >></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Info - Peraturan</strong>
                        </div>
                        <div class="panel-body">
                            <p>Harap seluruh praktikan untuk mematuhi tata tertib yang ada di dalam Laboratorium. Apabila didapati praktikan yang melanggar peraturan akan dikenakan sanksi oleh asisten yang berjaga. </p>
                        </div>
                        <div class="panel-footer">
                            <!-- <a href="#">Detail >></a> -->
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <strong>Info - Pengumpulan Tugas</strong>
                        </div>
                        <div class="panel-body">
                            <p>Tugas praktikum di lab dapat dikumpulkan melalui website ini, gunakan menu upload disebelah kiri website kemudian pilih tugas ataupun ujian. Ikuti langkah selanjutnya. </p>
                        </div>
                        <div class="panel-footer">
                            <!-- <a href="#">Detail >></a> -->
                        </div>
                    </div>
                </div>
            </div>
            </div>
<!-- ======================================================================================================================= -->
            <div class="row">
            <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Jadwal Perkuliahan Laboratorium Komputer Dasar : 
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#senin" data-toggle="tab">Senin</a>
                                </li>
                                <li><a href="#selasa" data-toggle="tab">Selasa</a>
                                </li>
                                <li><a href="#rabu" data-toggle="tab">Rabu</a>
                                </li>
                                <li><a href="#kamis" data-toggle="tab">Kamis</a>
                                </li>
                                <li><a href="#jumat" data-toggle="tab">Jumat</a>
                                </li>
                                <li><a href="#sabtu" data-toggle="tab">Sabtu</a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="senin">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("senin"); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="selasa">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("selasa"); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="rabu">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("rabu"); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="kamis">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("kamis"); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="jumat">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("jumat"); ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane fade" id="sabtu">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Jam</th>
                                                <th>Kode Jadwal</th>                                   
                                                <th>Kode Matakuliah</th>
                                                <th>Matakuliah</th>
                                                <th>Kelas</th>
                                                <th>Ruang</th>
                                                <th>PJ Asisten</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showkuliah("sabtu"); ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
            </div>

            <div class="row">
                <!-- <div class="col-lg-12">
                    <h1 class="page-header">Jadwal Perkuliahan Lab. Dasar</h1>
                </div> -->
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <!-- <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Selasa
                        </div>
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>No. </th>
                                    <th>Jam</th>
                                    <th>Kode Jadwal</th>                                   
                                    <th>Kode Matakuliah</th>
                                    <th>Matakuliah</th>
                                    <th>Kelas</th>
                                    <th>Ruang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php //showkuliah("selasa"); ?>
                            </tbody>
                        </table>
                        <div class="panel-body">

                        </div>

                    </div>
                </div> -->   
            </div>
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

<?php
function showkuliah($hari){
    include "service/connect.php";
        $sql = "select *,tbl_matakuliah.nama_matakuliah as matakuliah 
        from tbl_jadwal_lab 
        inner join tbl_matakuliah on (tbl_matakuliah.kode_matakuliah = tbl_jadwal_lab.kode_matakuliah) 
        where hari='$hari'
        order by kode_jadwal";
        $result = $conn->query($sql);
        $no = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
            ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $row['jam_mulai']." - ".$row['jam_selesai']; ?></td>
                <td><?php echo $row['kode_jadwal']; ?></td>
                <td><?php echo $row['kode_matakuliah']; ?></td>
                <td><?php echo $row['matakuliah']; ?></td>
                <td><?php echo $row['kelas']; ?></td>                
                <td><?php echo $row['nama_lab']; ?></td>
                <td><?php echo $row['pjasisten']; ?></td>
                <!-- <td><?php //echo $row['username']; ?></td> -->
                <!-- <td>
                    <form action='#' method='POST'>
                    <input type='hidden' name='tmpdelete' value=<?php //echo $row['kode_jadwal']; ?>>
                    <input type='submit' class='btn btn-xs btn-danger' name='submit-btn' value='delete'>
                    </form>
                </td> -->
            </tr>
            <?php
            $no++;
            }
        }
}

function activatetab($hari){
    $haricheck = date("D");
    if ($hari == $haricheck) {
        echo "class=\"active\"";
    }
}
?>