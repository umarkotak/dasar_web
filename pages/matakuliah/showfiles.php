<?php
function showfiles($matkul, $jenis){
//kiri
$files = scandir('../upload/'.$jenis.'/'.$matkul);
$no = 1;

foreach($files as $phpfile)
		{
			if($phpfile == "." || $phpfile == ".."){} else {
			echo "<tr>";
			echo "<td  style=\"text-align: center;\">".$no."</td>";
			echo "<td>".basename($phpfile)."</td>";		
								//session_start();
                                if (isset($_SESSION["priv"])) {if($_SESSION["priv"]=="admin")
                                { admin($matkul, $jenis, $phpfile);  } else            
                                { normal($matkul, $jenis, $phpfile); }} else
                                { normal($matkul, $jenis, $phpfile); }								
			echo "</tr>";
			$no++;
			}
		}
}
?>

<script>
function buka(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
        x[i].style.display = "none"; 
    }
    document.getElementById(cityName).style.display = "block"; 
}
</script>

<?php
function admin($matkul, $jenis, $phpfile){
			echo "<td style=\"text-align:right\">
					<a class=\"btn btn-success btn-xs\" href=../upload/".$jenis."/".$matkul."/".rawurlencode($phpfile)."><span class=\"glyphicon glyphicon-download\"></span> Download</a>
				  </td>";

			echo "<td>
					<form action=\"matakuliah/deletefiles.php\" method=\"POST\">
						<input type=\"hidden\" name=\"loc\" value=../upload/".$jenis."/".$matkul."/".rawurlencode($phpfile)."></input>
						<button type=\"submit\" class=\"btn btn-danger btn-xs\" value=\"delete\"><span class=\"fa fa-trash-o\"></span> Delete</button>
					</form>
				  </td>";
}

function normal($matkul, $jenis, $phpfile){
	if ($jenis=="materi"){
	echo "<td style=\"text-align:right\">
					<a class=\"btn btn-success btn-xs\" href=../upload/".$jenis."/".$matkul."/".rawurlencode($phpfile)."><span class=\"glyphicon glyphicon-download\"></span> Download</a>
				  </td>";
	} else {
	echo "<td style=\"text-align:right\">
					<a class=\"btn btn-default btn-xs\" href=#"." disabled><span class=\"glyphicon glyphicon-download\"></span> Download</a>
				  </td>";
	}			
	echo "<td>
					<form action=\"matakuliah/deletefiles.php\" method=\"POST\">
						<fieldset disabled>
						<input type=\"hidden\" name=\"loc\" value=#"."></input>
						<button type=\"submit\" class=\"btn btn-default btn-xs\" value=\"delete\"><span class=\"fa fa-trash-o\"></span> Delete</button>
						</fieldset>
					</form>
				  </td>";
}
?>