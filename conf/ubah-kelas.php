<?php
include "../conf/veriflogin.php";
include "conn.php";

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['ubah'])) {
    $id = $_POST['IDkelas'];
    $kelas = $_POST['kelas'];
    $proke = $_POST['proke'];
    $bidang = $_POST['bidang'];

    // buat query update
    $query = mysqli_query($link, "UPDATE kelas SET IDkelas ='$id', kelas='$kelas', proke='$proke' , bidang='$bidang' WHERE IDkelas='$id'");

    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='../dashboard/index.php?page=kelas';
    </script>";
}
