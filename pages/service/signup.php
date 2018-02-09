<div id="page-wrapper">
            <br>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Form Pendaftaran Praktikan
                        </div>
                        <form method="post" action="service/signup-execute.php">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form">
                                        <div class="form-group">
                                            <label>NIM : </label>
                                            <input class="form-control" placeholder="201431001" name="nim" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama : </label>
                                            <input class="form-control" placeholder="Jhon doe" name="nama" required>
                                        </div>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                    <div class="form-group">
                                            <label>Password : </label>
                                            <input type="password" class="form-control" placeholder="" name="password" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Password Confirmation : </label>
                                            <input type="password" class="form-control" placeholder="" name="passwordc" required>
                                        </div>
                                        
                                        <p style="text-align: right;">
                                            <button type="submit" class="btn btn-success" name="btn" value="signup">Submit</button>
                                        </p>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        </form>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
        </div>