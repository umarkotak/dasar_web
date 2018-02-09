<?php
    if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
            { 
?> 

    <!-- Page Content -->
        <div id="page-wrapper">
        <?php
        if (isset($_POST['btn'])) {
            include "admin/nilai-input-execute.php";
        }
        ?>
            
            <div class="container-fluid"> 

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Input Nilai</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div> 

            <div class="row">
            <div class="panel panel-default">
                
                <form method="post" action="" enctype="multipart/form-data">
                <div class="row">                           <!-- row start -->
                <div class="col-lg-6">
                    <div class="panel-body">                <!-- bagian kiri -->
                        <div class="form-group">
                            <label>NIM</label>
                            <input class="form-control" placeholder="201431001" name="nim" value="<?php //if(isset($nim)) echo $nim; ?>" required autofocus tabindex=1>
                        </div>
                        <div class="form-group">
                            <label>MataKuliah</label>
                            <select class="form-control" name="matakuliah"tabindex=4>
                                <option>-- Pilih Mata Kuliah --</option>

                                <?php 

                                include "service/connect.php";

                                $sql = "select * from tbl_matakuliah where status = 1";

                                $result = $conn->query($sql);

                                 ?>

                                   <option value="C31040101" <?php if(isset($matakuliah))  checked("C31040101",$matakuliah) ?>>AP1 Pretest</option> 
                                <?php foreach ($result as $row) { ?>
                                   <option value=<?php echo $row['kode_matakuliah']; ?> <?php if(isset($matakuliah))  checked($row['kode_matakuliah'],$matakuliah) ?> ><?php echo $row['nama_matakuliah']; ?></option>

                                <?php } ?>

                                                
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input type="text" class="form-control" placeholder="A" name="kelas" value="<?php if(isset($kelas)) echo $kelas; ?>" required tabindex=5>
                        </div>
                        <div class="form-group">
                            <label>Nomor Laporan</label>
                            <input type="text" class="form-control" placeholder="1" name="nomor" value="<?php if(isset($nolap)) echo $nolap; ?>"required tabindex=6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel-body">  
                                  <!-- bagian kanan -->
                        <div class="form-group">
                            <label>Nilai</label>
                            <input class="form-control" placeholder="90" name="nilai" value="<?php //if(isset($nilai)) echo $nilai; ?>" required tabindex=2>
                        </div>
                        <div class="form-group" align="right">
                            <button type="submit" class="btn btn-default btn-primary btn-md btn-block" name="btn" value="nilai-input"><span class="fa fa-arrow-circle-o-right"tabindex=3></span> Masukkan Nilai</button>
                        </div>
                    </div>
                </div>
                </div>                                      <!-- row end -->
                </form>
            </div>
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

<?php 
 

function checked2($kode, $matakuliah){
    if ($kode == $matakuliah) {
        echo "selected=\"true\"";
    }
}
?>

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