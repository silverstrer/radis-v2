<?php include "../conf/veriflogin.php"; ?>
<?php
if (isset($_GET['page'])) {
  $page = $_GET['page'];
  switch ($page) {
      // Beranda
    case 'semester':
      include '../dashboard/semester.php';
      break;
    case 'pelajaran':
      include '../dashboard/pelajaran.php';
      break;
    case 'kelas':
      include '../dashboard/kelas.php';
      break;
    case 'ekskul':
      include '../dashboard/ekskul.php';
      break;
    case 'datasiswa':
      include '../dashboard/datasiswa.php';
      break;
  }
} else {
  include "../dashboard/beranda.php";
}
?>