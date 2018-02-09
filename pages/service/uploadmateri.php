    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">           
            <div class="row">
            <div class="panel panel-default">
                
                <div class="panel-heading">
                    <h1 class="page-header">Upload Materi</h1> 
                </div>

            <div class="row">                           <!-- row start -->
                <form method="post" action="service/upload.php" enctype="multipart/form-data">
                <div class="col-lg-6">
                    <div class="panel-body">                <!-- bagian kiri -->
                        <div class="form-group">
                            <label>MataKuliah</label>
                            <select class="form-control" name="matakuliah" required>
                                <option>-- Pilih Mata Kuliah --</option>

                                <?php 

                                include "service/connect.php";

                                $sql = "select * from tbl_matakuliah where status = 1";

                                $result = $conn->query($sql);

                                 ?>

                                <?php foreach ($result as $row) { ?>
                                   <option value=<?php echo $row['page']; ?>><?php echo $row['nama_matakuliah']; ?></option>
                                <?php } ?>

                                <!-- <option value="ap2">Algoritma Dan Pemrograman 2</option>
                                <option value="barak">Bahasa Rakitan</option>
                                <option value="statistika">Statistika</option>
                                <option value="mikroprosesor">Mikroprosesor</option>
                                <option value="cc">Cloud Computing</option>
                                <option value="pbo">Pemrograman Berbasis Objek</option>
                                <option value="pbd">Perancangan Basis Data</option>
                                <option value="rpl">Rekayasa  Perangkat Lunak</option>    -->               
                            </select>
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
                            <button type="submit" class="btn btn-default btn-primary" name="btn" value="materi">Upload File</button>
                        </div>
                    </div>
                </div>
                </form>
            </div>                                      <!-- row end -->
                <!-- <div class="row">
                    <div class="col-lg-12">
                    <div class="panel-body">
                        <div class="form-group">
                        <p style="text-align: right;">
                        <button type="submit" class="btn btn-default btn-primary">Submit Button</button>
                        </p>
                        </div>
                    </div>
                    </div>
                </div> -->
            </div>

                <!-- /.panel default -->
            </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->