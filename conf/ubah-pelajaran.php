<?php
include "../conf/veriflogin.php";
include "conn.php";

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['ubah'])) {
    $id = $_POST['IDpelajaran'];
    $pelajaran = $_POST['namapelajaran'];
    $IDkelas = $_POST['IDkelas'];
    $kd1 = $_POST['kd1'];
    $kd2 = $_POST['kd2'];
    $kd3 = $_POST['kd3'];
    $kd4 = $_POST['kd4'];
    $kd5 = $_POST['kd5'];
    $kd6 = $_POST['kd6'];

    // buat query update
    $query = mysqli_query($link, "UPDATE pelajaran SET IDpelajaran ='$id', namapelajaran='$pelajaran', IDkelas='$IDkelas', kd1='$kd1' , kd2='$kd2' , kd3='$kd3' , kd4='$kd4' , kd5='$kd5' , kd6='$kd6' WHERE IDpelajaran='$id'");

    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='../dashboard/index.php?page=pelajaran';
    </script>";
}
