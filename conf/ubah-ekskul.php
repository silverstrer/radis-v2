<?php
include "../conf/veriflogin.php";
include "conn.php";

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['ubah'])) {
    $id = $_POST['IDekskul'];
    $namaekskul = $_POST['namaekskul'];
    $desk1 = $_POST['desk1'];
    $desk2 = $_POST['desk2'];
    $desk3 = $_POST['desk3'];

    // buat query update
    $query = mysqli_query($link, "UPDATE ekskul SET IDekskul ='$id', namaekskul='$namaekskul', desk1='$desk1' , desk2='$desk2', desk3='$desk3' WHERE IDekskul='$id'");

    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='../dashboard/index.php?page=ekskul';
    </script>";
}
