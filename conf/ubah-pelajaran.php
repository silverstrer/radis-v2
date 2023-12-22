<?php
include "../conf/veriflogin.php";
include "conn.php";

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['ubah'])) {
    $id = $_POST['IDpelajaran'];
    $pelajaran = $_POST['namapelajaran'];

    // buat query update
    $query = mysqli_query($link, "UPDATE pelajaran SET IDpelajaran ='$id', namapelajaran='$pelajaran' WHERE IDpelajaran='$id'");

    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='../dashboard/index.php?page=pelajaran';
    </script>";
}
