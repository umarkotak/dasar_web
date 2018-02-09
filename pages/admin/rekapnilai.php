<?php
    if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
            { 
?> 

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Rekap Nilai Laporan</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Option
                        </div>
                        <div class="panel-body">
                            <form action="?page=rekapnilai" method="post">
                                <div class="col-lg-6">
                                    
                                    <div class="form-group">
                                        <label>MataKuliah</label>
                                        <select class="form-control" name="kode" >
                                        <option value="">-- Pilih Mata Kuliah --</option>
                                        <option value="C31040101" <?php if(isset($_POST['kode'])){ if ($_POST['kode']=="C31040101" ) { echo "selected"; } } ?>> AP1 Pretest</option>
                                        <?php 

                                        include "service/connect.php";

                                        $sql = "select * from tbl_matakuliah where status = 1";
 
                                        $result = $conn->query($sql);

                                         ?>

                                        <?php foreach ($result as $row) { ?>
                                           <option value=<?php echo $row['kode_matakuliah']; ?> <?php if(isset($_POST['kode'])){ if ($_POST['kode']==$row['kode_matakuliah'] ) { echo "selected"; } } ?> ><?php echo $row['nama_matakuliah']; ?></option>
                                        <?php } ?>       

                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Kelas</label>
                                        <input class="form-control" placeholder="A" name="kelas" value=<?php if (isset($_POST['kelas'])) {
                                           echo strtoupper($_POST['kelas']); } ?>>
                                    </div>

                                    

                                </div>

                                <div class="col-lg-6">

                                    <div class="form-group">
                                        <label>No. Laporan</label>
                                        <input class="form-control" placeholder="1" name="no" value=<?php if (isset($_POST['no'])) {
                                           echo strtoupper($_POST['no']); } ?>>
                                    </div>                                   

                                    <div class="form-group" align="right">
                                        <button type="submit" class="btn btn-default btn-primary btn-md btn-block" name="btn" value="nilai-input"><span class="fa fa-table"></span> Lihat Rekap</button>
                                    </div>

                                    <div class="form-group" align="right">
                                        <button  target="_blank" formaction="admin/nilai-cetak-execute.php" type="submit" class="btn btn-default btn-primary btn-md btn-block" name="btn" value="nilai-input"><span class="fa fa-print"></span> Cetak Rekap</button>
                                    </div>

                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Rekap Nilai Laporan
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Matakuliah</th>
                                        <th>Kelas</th>
                                        <th>No Laporan</th>
                                        <th>Tanggal</th>
                                        <th>Nilai</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php showrekap(); ?>
                                </tbody>
                            </table>

                            <!-- /.table-responsive -->
                            
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>

<?php 

}
            } else {
                ?>

                <div id="page-wrapper">
                    <div class="container-fluid">
                        <div class="alert alert-danger">
                             <p>Maaf, anda tidak memiliki akses ke halaman ini!</p>
                        </div>
                    </div>
                </div>

                <?php    
            }

 ?>

<?php
function showrekap()
{
    
    include "admin/connect.php";

    if (isset($_POST['btn'])){


    $kode = $_POST['kode'];
    $kelas = $_POST['kelas'];
    $no = $_POST['no'];

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
            and ('$no' = '' or tbl_nilai.laporan ='$no')";
    } else {

    $sql = "select
            *,
            tbl_user.nama as nama,
            tbl_matakuliah.nama_matakuliah as matakuliah,
            tbl_matakuliah.kode_matakuliah as kode_matakuliah 
            from tbl_nilai
            inner join tbl_matakuliah on (tbl_matakuliah.kode_matakuliah = tbl_nilai.kode_matakuliah)
            inner join tbl_user on (tbl_user.nim = tbl_nilai.nim)
            where tbl_user.nama = 'admin'";    
    }

            
        $result = $conn->query($sql);
        $no = 1;

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) { 
            ?>
            <tr>

                <td><?php echo $row['nim']; ?></td>
                <td><?php echo $row['nama']; ?></td>
                <td><?php echo $row['matakuliah']; ?></td>
                <td><?php echo $row['kelas']; ?></td>
                <td><?php echo $row['laporan']; ?></td>
                <td><?php echo $row['tgl_kumpul']; ?></td>                
                <td><?php echo $row['nilai']; ?></td>
                <!-- <td><?php //echo $row['username']; ?></td> -->
                <td><table><tr>
                <td>
                    <form action='admin/setting-action.php' method='POST'>
                    <input type='hidden' name='nim' value=<?php echo $row['nim']; ?>>
                    <input type='hidden' name='laporan' value=<?php echo $row['laporan']; ?>>
                    <input type='hidden' name="kode_matakuliah" value=<?php echo $row['kode_matakuliah']; ?>></input>
                    <input type='hidden' name="nilai" value=<?php echo $row['nilai']; ?>></input>
                    <button type='submit' class='btn btn-xs btn-danger' name='submit-btn' value='delete-nilai' onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"> <span class="fa fa-times-circle"></span> Delete</button>
                    </form>
                </td>
                <td>
                    <button class='btn btn-xs btn-primary' data-toggle="modal" data-target=<?php echo "#myModal".$no; ?>>
                        <span class="fa fa-pencil"></span> Edit
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id=<?php echo "myModal".$no; ?> tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <form action="admin/setting-action.php" method="POST">
                                
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                    <h4 class="modal-title" id="myModalLabel">Edit Nilai - <?php echo $row['nama']; ?>, <?php echo $row['matakuliah']; ?> Laporan - <?php echo $row['laporan']; ?></h4>
                                </div>

                                <div class="modal-body">
                                    <div class="row">

                                    <div class="col-sm-6">

                                        <div class="form-group">
                                            <label>Nilai : </label><br>
                                            <input class="form-control" name="nilai" value=<?php echo $row['nilai']; ?>>
                                        </div>

                                        <br><br>

                                        <div class="form-group">
                                            <label>Tanggal : </label><br>
                                            <input type="date" class="form-control" name="tanggal" value=<?php echo $row['tgl_kumpul']; ?>>
                                        </div>

                                    </div>
                                    </div>
                                </div>

                                <div class="modal-footer">

                                    <input type="hidden" name="nim" value=<?php echo $row['nim']; ?>></input>
                                    <input type="hidden" name="kode_matakuliah" value=<?php echo $row['kode_matakuliah']; ?>></input>
                                    <input type="hidden" name="kelas" value=<?php echo $row['kelas']; ?>></input>
                                    <input type="hidden" name="laporan" value=<?php echo $row['laporan']; ?>></input>

                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" name="submit-btn" value="edit">Save changes</button>
                                </div>

                            </form>    
                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>
                    <!-- /.modal -->

                </td>
                </tr></table></td>

            </tr>
            <?php
            $no++;
            }
        }
        // echo $kode;
    
    
}
?>

<script>
    // tooltip demo
    $('.tooltip-demo').tooltip({
        selector: "[data-toggle=tooltip]",
        container: "body"
    })
    // popover demo
    $("[data-toggle=popover]")
        .popover()
</script>