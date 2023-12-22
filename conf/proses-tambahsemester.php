<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['add'])) {
    $namasekolah = $_POST['namasekolah'];
    $namakepsek = $_POST['namakepsek'];
    $nipkepsek = $_POST['nipkepsek'];
    $tahun = $_POST['tahun'];
    $semester = $_POST['semester'];
    $titimangsa = $_POST['titimangsa'];

    // update user data
    $query = mysqli_query($link, "INSERT INTO semester(namasekolah, namakepsek, nipkepsek, tahun, semester, titimangsa) VALUES ('$namasekolah','$namakepsek','$nipkepsek','$tahun','$semester','$titimangsa')");

    echo "<script>
    alert('Data berhasil ditambah!');
    window.location.href='../dashboard/index.php?page=semester';
    </script>";

}

?>