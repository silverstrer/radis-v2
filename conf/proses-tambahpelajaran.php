<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['add'])) {
    $pelajaran = $_POST['pelajaran'];
    $IDkelas = $_POST['IDkelas'];

    // update user data
    $query = mysqli_query($link, "INSERT INTO pelajaran(namapelajaran, IDkelas) VALUES ('$pelajaran', '$IDkelas')");

    echo "<script>
    alert('Data berhasil ditambah!');
    window.location.href='../dashboard/index.php?page=pelajaran';
    </script>";

}

?>