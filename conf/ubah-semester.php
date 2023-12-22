<?php
include "../conf/veriflogin.php";
include "conn.php";

// cek apakah tombol simpan sudah diklik atau blum?
if (isset($_POST['ubah'])) {
    $id = $_POST['IDsemester'];
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $titimangsa = $_POST['titimangsa'];

    // buat query update
    $query = mysqli_query($link, "UPDATE semester SET IDsemester='$id', tahun='$tahun', semester='$semester', titimangsa='$titimangsa' WHERE IDsemester='$id'");

    echo "<script>
    alert('Data berhasil diubah!');
    window.location.href='../dashboard/index.php?page=semester';
    </script>";
}
