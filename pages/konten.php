<?php
function konten(){
if (isset($_GET['page'])){
    if ($_GET['page']=="ap2") 				{ include "matakuliah/ap.php"; 			    }
    if ($_GET['page']=="ap1")               { include "matakuliah/ap1.php";             }
    if ($_GET['page']=="barak") 			{ include "matakuliah/barak.php"; 			}
    if ($_GET['page']=="cc") 				{ include "matakuliah/cc.php"; 				}
    if ($_GET['page']=="mikroprosessor") 	{ include "matakuliah/mikroprosessor.php"; 	}
    if ($_GET['page']=="pbd") 				{ include "matakuliah/pbd.php"; 			}
    if ($_GET['page']=="pbo") 				{ include "matakuliah/pbo.php"; 			}
    if ($_GET['page']=="rpl") 				{ include "matakuliah/rpl.php"; 			}
    if ($_GET['page']=="statistika") 		{ include "matakuliah/statistika.php"; 		}
    if ($_GET['page']=="strukturdata")      { include "matakuliah/strukturdata.php";    }
    if ($_GET['page']=="jarkom")            { include "matakuliah/jarkom.php";          }
    if ($_GET['page']=="datamining")        { include "matakuliah/datamining.php";      }
    if ($_GET['page']=="pemvis")            { include "matakuliah/pemvis.php";          }
    if ($_GET['page']=="tekan")             { include "matakuliah/tekan.php";           }
    if ($_GET['page']=="sbd")               { include "matakuliah/sbd.php";             }
    if ($_GET['page']=="moprog")            { include "matakuliah/moprog.php";          }
    if ($_GET['page']=="workshop")          { include "matakuliah/workshop.php";        }

    if ($_GET['page']=="uploadmateri") 		{ include "service/uploadmateri.php"; 		}
    if ($_GET['page']=="uploadtugas") 		{ include "service/uploadtugas.php"; 		}
    if ($_GET['page']=="uploadujian")       { include "service/uploadujian.php";        }

    if ($_GET['page']=="bantuan")           { include "service/bantuan.php";            }

    if ($_GET['page']=="login")             { include "service/login.php";              }
    if ($_GET['page']=="logout")            { include "service/logout-check.php";       }
    if ($_GET['page']=="signup")            { include "service/signup.php";             }
    if ($_GET['page']=="profile")           { include "service/profile.php";            }

    if ($_GET['page']=="setting")           { include "admin/setting.php";              }
    if ($_GET['page']=="setting-account")   { include "admin/setting-account.php";      }
    if ($_GET['page']=="inputnilai")        { include "admin/nilai-input.php";          }
    if ($_GET['page']=="rekapnilai")        { include "admin/rekapnilai.php";           }
    if ($_GET['page']=="pesan")             { include "admin/pesan.php";                }

} else {
											  include "dashboard.php";
}

}