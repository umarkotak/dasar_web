<?php
    if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
            { 
?> 

<?php       
    $nama = $_SESSION['nama'];
    $nim = $_SESSION['nim'];
    
    function accsetting(){
    include "connect.php";
    $sql = "select
        tbl_user.nim as nim,
        tbl_user.nama as nama,
        tbl_admin.nim as status
        from tbl_user
        left join tbl_admin on (tbl_admin.nim = tbl_user.nim)
        ";
    
    $result = $conn->query($sql);
    $no = 1;

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) { 
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row['nim']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php if (isset($row['status'])) echo "admin"; else echo "user"; ?></td>
            <td>
                <table><tr>

                    <td>
                    <form action='admin/setting-action.php' method='POST'  style="margin: 1px;" >
                    <input type='hidden' name='nim' value=<?php echo $row['nim']; ?>>
                    <button type='submit' class='btn btn-xs btn-danger' name='submit-btn' value='delete' onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"> <span class="fa fa-times-circle"></span> Delete</button>
                    </form>
                    </td>

                    <!-- <td>
                    <form action='admin/setting-action.php' method='POST'  style="margin: 1px;">
                    <input type='hidden' name='nime' value=<?php //echo $row['nim']; ?>>
                    <button type='submit' class='btn btn-xs btn-info' name='submit-btn' value='editacc'> <span class="fa fa-pencil-square"></span> Edit</button>
                    </form>
                    </td> -->

                    <td><form action='admin/setting-action.php' method='POST'  style="margin: 1px;">
                    <input type='hidden' name='nim' value=<?php echo $row['nim']; ?>>
                    <button type='submit' class='btn btn-xs btn-success' name='submit-btn' value='admin' onclick="return confirm('Apakah anda yakin ingin menjadikan admin?');"> <span class="fa fa-info"></span> Admin</button>
                    </form></td>

                </tr></table>

            </td>
        </tr>
        <?php
        $no++;
        }
    }
    }
?>


<div id="page-wrapper">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Global Setting</h1>
            </div>
        </div>

        <ul class="nav nav-tabs">
            <li class="active"><a href="#makun" data-toggle="tab">Setting Akun</a></li>
            <li><a href="#mmatakuliah" data-toggle="tab">Setting Matakuliah</a></li>
            <li><a href="#settingjadwal" data-toggle="tab">Setting Jadwal</a></li>
            <li><a href="#tambahmatakuliah" data-toggle="tab">Tambah Matakuliah</a></li>
            <li><a href="#tambahjadwal" data-toggle="tab">Tambah Jadwal</a></li>
        </ul>

        <div class="tab-content">

        <!-- =============================================================================================== -->
        <div class="tab-pane fade in active" id="makun">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">

                    <div class="panel-heading">
                        Setting Akun
                    </div>

                    <div class="panel-body">                       
                        <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">

                            <thead>
                                <tr>
                                    <th width="7%">No.</th>
                                    <th>NIM </th>
                                    <th>Nama </th>
                                    <th>Status </th>
                                    <th width="10%">Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php accsetting(); ?>
                            </tbody>

                        </table>
                    </div>

                    <div class="panel-footer">
                        <a href="?page=signup" class='btn btn-primary'>Tambah Akun</a>
                        <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">Button Test</button>

                    </div>

                </div>


            </div>
        </div>
        </div>

        <!-- =============================================================================================== -->

        <div class="tab-pane fade in" id="settingjadwal">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    
                    <div class="panel-heading">
                        Setting Jadwal
                    </div>

                    <div class="panel-body"> 
                                
                        <div class="panel panel-default">
                                        <div class="panel-body">
                                            
                                        <?php include "connect.php"; ?>
                                        <?php 
                                        $sql = "select *,tbl_matakuliah.nama_matakuliah as matakuliah 
                                        from tbl_jadwal_lab 
                                        inner join tbl_matakuliah on (tbl_matakuliah.kode_matakuliah = tbl_jadwal_lab.kode_matakuliah) order by kode_jadwal";

                                        $result = $conn->query($sql);
                                        $no = 1;
                                         ?>

                                         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example3">
                                             <thead>
                                                 <tr>
                                                     <th>No.</th>
                                                     <th>Kode</th>
                                                     <th>Nama Matakuliah</th>
                                                     <th>Kelas</th>
                                                     <th>Hari</th>
                                                     <th>Jam Mulai</th>
                                                     <th>Jam Selesai</th>
                                                     <th>Lab</th>
                                                     <th>PJ Asisten</th>
                                                     <th>Action</th>
                                                 </tr>
                                             </thead>

                                             <tbody>
                                                <?php foreach ($result as $row) { ?>

                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $row['kode_jadwal']; ?></td>
                                                        <td><?php echo $row['nama_matakuliah']; ?></td>
                                                        <td><?php echo $row['kelas']; ?></td>
                                                        <td><?php echo $row['hari']; ?></td>
                                                        <td><?php echo $row['jam_mulai']; ?></td>
                                                        <td><?php echo $row['jam_selesai']; ?></td>
                                                        <td><?php echo $row['nama_lab']; ?></td>
                                                        <td><?php echo $row['pjasisten']; ?></td>
                                                        <td>

                                                            <table><tr>
                                                               
                                                                <td>
                                                                <form action='admin/setting-matakuliah.php' method='POST'>
                                                                <input type='hidden' name='kode_jadwal' value=<?php echo $row['kode_jadwal']; ?>>
                                                                <button type='submit' class='btn btn-xs btn-danger' name='submit-btn' value='jadwal_delete' onclick="return confirm('Apakah anda yakin ingin menghapus data ini?');"> <span class="fa fa-times-circle"></span> Delete</button>
                                                                </form>
                                                                </td>
                                                                

                                                            </tr></table>

                                                        </td>
                                                    </tr>

                                                <?php $no++; } ?>
                                             </tbody>

                                         </table>

                                        </div>
                                    </div>

                    </div>

                </div>                       
            </div>
        </div>
        </div>

        <!-- =============================================================================================== -->

        <div class="tab-pane fade in" id="mmatakuliah">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    
                    <div class="panel-heading">
                        Setting Matakuliah
                    </div>

                    <div class="panel-body"> 

                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            
                                        <?php include "connect.php"; ?>
                                        <?php 
                                        $sql = "select * from tbl_matakuliah";

                                        $result = $conn->query($sql);
                                        $no = 1;
                                         ?>

                                         <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example2">
                                             <thead>
                                                 <tr>
                                                     <th>No.</th>
                                                     <th>Kode Matakuliah</th>
                                                     <th>Nama Matakuliah</th>
                                                     <th>SKS</th>
                                                     <th>Status</th>
                                                     <th>Action</th>
                                                 </tr>
                                             </thead>

                                             <tbody>
                                                <?php foreach ($result as $row) { ?>

                                                    <tr>
                                                        <td><?php echo $no; ?></td>
                                                        <td><?php echo $row['kode_matakuliah']; ?></td>
                                                        <td><?php echo $row['nama_matakuliah']; ?></td>
                                                        <td><?php echo $row['sks']; ?></td>
                                                        <td><?php echo $row['status']; ?></td>
                                                        <td>

                                                            <table><tr>
                                                               
                                                                <td>
                                                                <form action='admin/setting-matakuliah.php' method='POST'>
                                                                <input type='hidden' name='kode_matakuliah' value=<?php echo $row['kode_matakuliah']; ?>>
                                                                <button type='submit' class='btn btn-xs btn-success' name='submit-btn' value='active'> <span class="fa fa-check-circle"></span> Active</button>
                                                                </form>
                                                                </td>

                                                                <td>
                                                                <form action='admin/setting-matakuliah.php' method='POST'>
                                                                <input type='hidden' name='kode_matakuliah' value=<?php echo $row['kode_matakuliah']; ?>>
                                                                <button type='submit' class='btn btn-xs btn-danger' name='submit-btn' value='deactive'> <span class="fa fa-times-circle"></span> Deactive</button>
                                                                </form>
                                                                </td>

                                                                

                                                            </tr></table>

                                                        </td>
                                                    </tr>

                                                <?php $no++; } ?>
                                             </tbody>

                                         </table>

                                        </div>
                                    </div>

                    </div>
                </div>                       
            </div>
        </div>
        </div>

        <!-- =============================================================================================== -->
        <div class="tab-pane fade in" id="tambahmatakuliah">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    
                    <div class="panel-heading">
                        Tambah Matakuliah
                    </div>
                    
                    <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">

                                                <form action="admin/setting-matakuliah.php" method="post">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kode Matakuliah</label>
                                                        <input class="form-control" placeholder="C31040101" name="kode_matakuliah" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Nama Matakuliah</label>
                                                        <input class="form-control" placeholder="Algoritma & Pemrograman 1" name="nama_matakuliah" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Jumlah SKS</label>
                                                        <input class="form-control" placeholder="3" name="sks" required>
                                                    </div>
                                                    <input type="hidden" name="status" value="1">
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Page Name/ Folder Name</label>
                                                        <input class="form-control" placeholder="ap1" name="page" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-md btn-block" name="submit-btn" value="tambah_matkul">Submit</button>
                                                </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                    </div>

                </div>                       
            </div>
        </div>
        </div>

        <!-- =============================================================================================== -->

        <div class="tab-pane fade in" id="tambahjadwal">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    
                    <div class="panel-heading">
                        Tambah Jadwal Matakuliah
                    </div>
                    
                    <div class="panel-body">
                                    <div class="panel panel-default">
                                        <div class="panel-body">
                                            <div class="row">

                                                <form action="admin/setting-matakuliah.php" method="post">
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Kode Jadwal</label>
                                                        <input class="form-control" placeholder="sn001" name="kode_jadwal" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>MataKuliah</label>
                                                        <select class="form-control" name="kode_matakuliah">
                                                            <option>-- Pilih Mata Kuliah --</option>

                                                            <?php 

                                                            include "service/connect.php";

                                                            $sql = "select * from tbl_matakuliah where status = 1";

                                                            $result = $conn->query($sql);

                                                             ?>

                                                            <?php foreach ($result as $row) { ?>
                                                               <option value=<?php echo $row['kode_matakuliah']; ?> <?php if(isset($matakuliah)) checked($row['kode_matakuliah'],$matakuliah) ?> ><?php echo $row['nama_matakuliah']; ?></option>
                                                            <?php } ?>
                   
                                                        </select>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Kelas</label>
                                                        <input class="form-control" placeholder="A" name="kelas" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Hari</label>
                                                        <input class="form-control" placeholder="Senin" name="hari" required>
                                                    </div>

                                                    
                                                </div>

                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <label>Jam Mulai</label>
                                                        <input type="time" class="form-control" placeholder="08:00" name="jam_mulai" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Jam Selesai</label>
                                                        <input type="time" class="form-control" placeholder="10:00" name="jam_selesai" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>Tempat Lab</label>
                                                        <input class="form-control" placeholder="Lab dasar 1" name="lab" required>
                                                    </div>

                                                    <div class="form-group">
                                                        <label>PJ Asisten</label>
                                                        <input class="form-control" placeholder="Asisten Penanggungjawab" name="asisten" required>
                                                    </div>

                                                    <button type="submit" class="btn btn-success btn-md btn-block" name="submit-btn" value="tambah_jadwal">Submit</button>
                                                </div>
                                                </form>

                                            </div>

                                        </div>
                                    </div>
                    </div>

                </div>                       
            </div>
        </div>
        </div>

        <!-- =============================================================================================== -->

        </div>

    </div>
</div>

<!-- MODAL SECTION -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- MODAL SECTION -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Modal title</h4>
            </div>
            <div class="modal-body">
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
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