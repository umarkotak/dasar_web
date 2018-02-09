    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">           
            <div class="row">
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h1 class="page-header">Upload Ujian</h1> 
                </div>

                <form method="post" action="service/upload.php" enctype="multipart/form-data">
                <div class="row">                           <!-- row start -->
                <div class="col-lg-6">
                    <div class="panel-body">                <!-- bagian kiri -->
                        <div class="form-group">
                            <label>NIM</label>
                            <input class="form-control" placeholder="201431001" name="nim" required value=<?php if (isset($_SESSION['nim'])) { echo "\"".$_SESSION['nim']."\""." readonly";
                            } ?>>
                        </div>
                        <div class="form-group">
                            <label>Nama</label>
                            <input class="form-control" placeholder="John Doe" name="nama" required value=<?php if (isset($_SESSION['nama'])) { echo "\"".$_SESSION['nama']."\""." readonly";
                            } ?>>
                        </div>
                        <div class="form-group">
                            <label>MataKuliah</label>
                            <select class="form-control" name="matakuliah">
                                <option>-- Pilih Mata Kuliah --</option>
                                
                                <?php 

                                include "service/connect.php";

                                $sql = "select * from tbl_matakuliah where status = 1";

                                $result = $conn->query($sql);

                                 ?>

                                <?php foreach ($result as $row) { ?>
                                   <option value=<?php echo $row['page']; ?>><?php echo $row['nama_matakuliah']; ?></option>
                                <?php } ?>
                                                 
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Kelas</label>
                            <input class="form-control" placeholder="A" name="kelas" required>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="panel-body">                <!-- bagian kanan -->
                        <div class="form-group">
                            <label>Pilih File</label>
                            <input type="file" name="fileToUpload" id="fileToUpload" required>
                        </div>
                        <div class="form-group">
                            <div class="checkbox">
                                <label>
                                <input type="checkbox" name="check" value="" required>Saya sudah mengecek kembali file yang akan di upload
                                </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-default btn-primary" name="btn" value="ujian">Upload File</button>
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