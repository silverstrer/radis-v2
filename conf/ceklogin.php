<?php
session_start();

include_once("conn.php");

$userakun = $_POST['userakun'];
$passakun = $_POST['passakun'];

$data = mysqli_query($link,"SELECT * FROM akun WHERE userakun='$userakun' AND passakun='$passakun'");
$cek = mysqli_num_rows($data);

$rows=mysqli_fetch_array($data);

if($cek > 0){
    $_SESSION['userakun']=$userakun;
    $_SESSION['roleakun']=$rows['roleakun'];
    $_SESSION['status'] = "login";
    header("Location:../dashboard/index.php");
} else {
    header("Location:../index.php?pesan=gagal");
}
