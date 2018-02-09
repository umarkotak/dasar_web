<div id="page-wrapper">
<div class="container-fluid">           
<div class="row">
<div class="panel panel-default">

	<?php input_pesan(); ?>
        
    <div class="panel-heading">
        <h1 class="page-header">Bantuan</h1> 
    </div>

    <div class="panel-body">

	    <!-- <div class="row">                           
	        <div class="col-sm-12">
		        <div class="alert alert-danger">
		        	<div align="center">THIS PAGE IS UNDER MAINTENANCE</div>
		        </div>


	        </div>
	    </div> -->

	    <div class="row">
	    	<div class="col-md-12">

	    		<form method="post" action="#">
	    		<div class="panel panel-primary">
	    			<div class="panel-heading">
	    				Kolom Bantuan
	    			</div>
	    			<div class="panel-body">
	    				<div class="row">
	    					<div class="col-md-4">
	    						<div class="form-group">
		                            <label>Nim</label>
		                            <input class="form-control" placeholder="John Doe" name="nim" required value=<?php if (isset($_SESSION['nama'])) { echo "\"".$_SESSION['nim']."\""." readonly";
		                            } ?>>
		                        </div>
	    					</div>

	    					<div class="col-md-4">
	    						<div class="form-group">
		                            <label>Nama</label>
		                            <input class="form-control" placeholder="John Doe" name="nama" required value=<?php if (isset($_SESSION['nama'])) { echo "\"".$_SESSION['nama']."\""." readonly";
		                            } ?>>
		                        </div>
	    					</div>

	    					<div class="col-md-4">
	    						<div class="form-group">
		                            <label>Judul</label>
		                            <input class="form-control" placeholder="Judul Bantuan" name="judul" required>
		                        </div>
	    					</div>
	    				</div>
	    				
	    			
	    				<div class="form-group">
                            <label>Pesan :</label>
                            <textarea class="form-control" rows="5" type="text" name="pesan" required></textarea>
                            <p class="help-block">Masukkan bantuan yang anda butuhkan disini (ex. barang tertinggal, kritik dan saran dll)</p>
                        </div>
	    			</div>
	    			<div class="panel-footer">
	    				<input class="btn btn-success btn-block" name="btn" value="submit" type="submit"></input>
	    			</div>
	    		</div>
	    		</form>
	    	</div>
	    </div>   

	    

    </div>                                  

</div>
</div>
</div>
</div>

<?php 

function input_pesan(){
	if (isset($_POST['btn'])) {
		$nama = $_POST['nama'];
		$pesan = $_POST['pesan'];
		$H =  date("H")+5;
		$date = date("Y-m-d $H:i:s");
		$status = "belum";
		$judul = $_POST['judul'];

		include "connect.php";

		$sql = "insert into tbl_bantuan values('','$nama','$judul','$pesan','$date','$status','');";

		if ($conn->query($sql) === TRUE) {
			$err = 0;
			$pesan = "pesan anda berhasil tersimpan";

		} else {	
			$err = 1;
			$pesan = "pesan anda gagal tersimpan";

		}

		if ($err == 0) {
			echo "<div class=\"alert alert-success alert-dismissable\">
				 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				 <p style=\"text-align: center;\">".$pesan." - ".$date.", .</p>
		    </div>";
		} else
		if ($err == 1) {
			 echo "<div class=\"alert alert-danger alert-dismissable\">
			 	 <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
				 <p style=\"text-align: center;\">".$pesan." - ".$date.", .</p>
		    </div>";
		}

	}
}

 ?>