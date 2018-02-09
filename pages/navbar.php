<div id="wrapper">

        <!-- Navigation -->
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">BASIC LABORATORY</a>
        </div>
        <!-- /.navbar-header -->

        <ul class="nav navbar-top-links navbar-right">
            <li>
                <?php hari(date("D")); echo date("d / M / Y"); ?>
            </li>
            <!-- Put Here -->
                <?php 
                            
                            session_start();

                            if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
                            { 
                                ?>

                                <?php include "service/connect.php"; ?>

                                <?php $sql = "select count(status) as status from tbl_bantuan where status='belum';"; ?>

                                <?php $result = $conn->query($sql); ?>

                                <li>
                                    <a href="?page=pesan" style="font-color: red;"><i class="fa fa-envelope-o fa-fw"></i> <?php foreach ($result as $obj) {
                                        echo $obj['status'];
                                    }; ?> pesan</a>
                                </li>

                                <?php
                            }
                            } 


                            
                            if (isset($_SESSION["set"]))
                            { logged();     } else            
                            { not_logged(); } 


                ?>
            <!-- Put Here End -->
        </ul>
<!-- ======================================================================================================================================== -->
        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li class="sidebar-search">
                        <div>
                            <p style="text-align: center;"><img src="../image/navhead.png" style="width : 100px; height : 100px;"></p>
                        </div>
                    </li>

                    <li>
                        <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-book fa-fw"></i> Matakuliah<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">

                            <?php 

                                include "service/connect.php";

                                $sql = "select * from tbl_matakuliah where status = 1";

                                $result = $conn->query($sql);

                             ?>

                             <?php foreach ($result as $row) { ?>
                                <li>
                                    <a href=<?php echo "?page=".$row['page']; ?>><?php echo $row['nama_matakuliah']; ?></a>
                                </li>
                             <?php } ?>

                            
                        </ul>
                    </li>
                     <li>
                     <a href="#"><i class="fa fa-upload fa-fw"></i> Upload<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                        <li>
                            <a href="?page=uploadmateri"><i class="fa fa-cube fa-fw"></i> Materi</a>
                        </li>
                        <li>
                            <a href="?page=uploadtugas"><i class="fa fa-tasks fa-fw"></i> Tugas</a>
                        </li>
                        <li>
                            <a href="?page=uploadujian"><i class="fa fa-file-text-o fa-fw"></i> Ujian</a>
                        </li>
                        
                    </li>

                </ul>
                

                <?php 

                    if (isset($_SESSION["set"]))
                            { 

                                ?>

                                <li>
                                    <a href="?page=bantuan"><i class="fa fa-phone fa-fw"></i> Bantuan</a>
                                </li> 
                                
                                <?php


                            }

                 ?>

                <?php
                    if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
                            { 
                                ?>
                                    <li class="bg bg-warning">
                                        <a href=?page=inputnilai><i class="fa fa-edit fa-fw"></i> Input Nilai</a>
                                    </li>
                                    <li class="bg bg-warning">
                                        <a href=?page=rekapnilai><i class="fa fa-table fa-fw"></i> Rekap Nilai</a>
                                    </li><li class="bg bg-warning">
                                        <a href=?page=setting-account><i class="fa fa-windows fa-fw"></i> Settings</a>
                                    </li>
                                <?php
                            }
                            } 
                ?>  
            </div>
            <!-- /.sidebar-collapse -->
        </div>
        <!-- /.navbar-static-side -->
    </nav>
</div>

<?php
function not_logged(){
                ?>
                <li>
                <a href="?page=login"><span class="glyphicon glyphicon-log-in"></span> login & Sign Up </a>
                </li>
                <?php
}

function logged(){
                ?>
                        <li>
                            <a href="?page=profile"><i class="fa fa-user fa-fw"></i> <?php echo $_SESSION['nama']; ?></a>
                        </li>
                        <!-- <li>
                            <a href="?page=setting"><i class="fa fa-gear fa-fw"></i> Settings</a>
                        </li> -->
                        <li class="divider">
                            
                        </li>
                        <li>
                            <a href="service/logout-check.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>

                <?php
}

function hari($data){
    switch ($data) {
        case 'Sun':
            $har="Minggu";
            break;
        case 'Mon':
            $har="Senin";
            break;
        case 'Tue':
            $har="Selasa";
            break;
        case 'Wed':
            $har="Rabu";
            break;
        case 'Thu':
            $har="Kamis";
            break;
        case 'Fri':
            $har="Jumat";
            break;
        case 'Sat':
            $har="Sabtu";
            break;
    }
    echo $har.", ";
}
?>