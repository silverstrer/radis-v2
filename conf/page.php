<?php include "../conf/veriflogin.php"; ?>
<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'semester':
      include '../dashboard/semester.php';
      break;
  }
} else {
  include "../dashboard/beranda.php";
}
?>