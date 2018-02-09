<?php 

if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin") { 

	?>

    <div id="page-wrapper">
        <div class="container-fluid">

	    	<div class="row">

                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Pesan Bantuan
                        </div>
                        <!-- .panel-heading -->
                        <div class="panel-body">
                            <div class="panel-group" id="accordion">

                            <?php 

                            	include "connect.php";

                            	$sql = "select * from tbl_bantuan order by no_bantuan desc";

                            	$result = $conn->query($sql);

                            	$no = 1;

                            	foreach ($result as $row) {
                            		
                            		if ($row['status'] == "belum") {
                            			$stat = "class = \"panel panel-danger\"";
                            		} else {
                            			$stat = "class = \"panel panel-success\"";
                            		}

                            		?>

                            			<div <?php echo $stat; ?>>
		                                    <div class="panel-heading">
		                                        <h4 class="panel-title">
		                                            <a data-toggle="collapse" data-parent="#accordion" href="<?php echo "#collapse".$no; ?>" aria-expanded="false" class="collapsed"><?php echo $row['no_bantuan'] . " - " . $row['nama'] . " : " . $row['judul']; ?></a>
		                                        </h4>
		                                    </div>
		                                    <div id="<?php echo "collapse".$no; ?>" class="panel-collapse collapse" aria-expanded="false" style="height: 0px;">
		                                        <div class="panel-body">
                                                
		                                            <?php echo $row['keluhan']; ?>
		                                            
		                                        </div>
		                                        <div class="panel-footer" style="text-align: right;">
		                                        	<form method="POST" action="admin/pesan-execute.php">

                                                    <div class="form-group">
                                                        <input class="form-control" placeholder="Masukkan balasan disini" name="balasan" <?php echo "value=\"".$row['balasan'] . "\""; ?>>
                                                    </div>

                                                    <input type="hidden" name="no_bantuan" value="<?php echo $row['no_bantuan']; ?>"></input>
			                                        <button name="btnp" value="selesai" type="submit" class="btn btn-success">Selesai</button>
		                                        	<button name="btnp" value="delete" type="submit" class="btn btn-danger">Delete</button>
		                                        	</form>
		                                        </div>
		                                    </div>
		                                </div>

                            		<?php

                            		$no++;
                            	}

                             ?>

                            </div>
                        </div>
                    </div>
                </div>

            </div> <!--  row end -->

        </div>
    </div>

    <?php 

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
}

 ?>