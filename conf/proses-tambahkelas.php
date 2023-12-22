<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['add'])) {
    $kelas = $_POST['kelas'];
    $proke = $_POST['proke'];
    $bidang = $_POST['bidang'];

    // update user data
    $query = mysqli_query($link, "INSERT INTO kelas(kelas, proke, bidang) VALUES ('$kelas','$proke','$bidang')");

    echo "<script>
    alert('Data berhasil ditambah!');
    window.location.href='../dashboard/index.php?page=kelas';
    </script>";

}

?>