<?php include "showfiles.php"; $judul="jarkom"; ?>

    <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Jaringan Komputer</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <a class = "btn btn-info" onclick="buka('materi')"><i class="fa fa-cube fa-fw"></i> Materi Kuliah</a>
                        <a class = "btn btn-info" onclick="buka('tugas')"><i class="fa fa-tasks fa-fw"></i> File Tugas</a>
                        <a class = "btn btn-info" onclick="buka('ujian')"><i class="fa fa-file-text-o fa-fw"></i> File Ujian</a>
                    </div>
                </div>
                <div class="row">
                    <br>
                    <div class="col-lg-12 city" id="materi" style="display: block;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <b>File Materi Perkuliahan</b>
                            </div>                
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="10%" style="text-align: center;">No. </th>
                                                <th width="80%" style="text-align: center;">Nama File</th>
                                                <th width="10%" style="text-align: center;" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showfiles($judul,"materi"); ?>                                      
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                        </div>                    
                    </div>

                    <!-- Kolom Tugas -->
                    <div class="col-lg-12 city" id="tugas" style="display: none;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <b>File Tugas</b>
                            </div>                
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="10%" style="text-align: center;">No. </th>
                                               <th width="80%" style="text-align: center;">Nama File</th>
                                                <th width="10%" style="text-align: center;" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showfiles($judul,"tugas"); ?>                                         
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                        </div>                    
                    </div>

                    <!-- Kolom Ujian -->
                    <div class="col-lg-12 city" id="ujian" style="display: none;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                            <b>File Ujian</b>
                            </div>                
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th width="10%" style="text-align: center;">No. </th>
                                               <th width="80%" style="text-align: center;">Nama File</th>
                                                <th width="10%" style="text-align: center;" colspan="2">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php showfiles($judul,"ujian"); ?>                                          
                                        </tbody>
                                    </table>
                                </div>
                          </div>
                        </div>                    
                    </div>
                </div>
            </div>
        </div>