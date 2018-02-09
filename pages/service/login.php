    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Please Sign In</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form" method="POST" action="service/login-check.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="NIM" name="nim" type="text" autofocus required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" required>
                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary btn-block" name="submit" type="submit" value="login">
                                </div>
                                <div>
                                    <a href="?page=signup" class="btn btn-primary btn-block">Sign Up</a>
                                </div>
                               
                                <!-- Change this to a button or input when using this as a form -->
                                <!-- <a href="index.html" class="btn btn-lg btn-success btn-block">Login</a> -->
                            </fieldset>
                        </form>
                    </div>
                </div>
                    <!-- /.col-lg-12 -->
            </div>
                <!-- /.row -->
        </div>
            <!-- /.container-fluid -->
    </div>