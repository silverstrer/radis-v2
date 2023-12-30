<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['add'])) {
    $namasiswa = $_POST['namasiswa'];
    $kelamin = $_POST['kelamin'];
    $tempatlahir = $_POST['tempatlahir'];
    $tanggallahir = $_POST['tanggallahir'];
    $kelas = $_POST['kelas'];

    // update user data
    $query = mysqli_query($link, "INSERT INTO datasiswa(nama, kelamin, tempatlahir, tanggallahir, kelas) VALUES ('$namasiswa','$kelamin','$tempatlahir','$tanggallahir','$kelas')");

    echo "<script>
    alert('Data berhasil ditambah!');
    window.location.href='../dashboard/index.php?page=datasiswa';
    </script>";
}

?>