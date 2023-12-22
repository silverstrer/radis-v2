<?php include "../conf/veriflogin.php"; ?>
<?php
include "../conf/conn.php";
// Check if form is submitted for user update, then redirect to homepage after update
if (isset($_POST['add'])) {
    $namaekskul = $_POST['namaekskul'];

    // update user data
    $query = mysqli_query($link, "INSERT INTO ekskul(namaekskul) VALUES ('$namaekskul')");

    echo "<script>
    alert('Data berhasil ditambah!');
    window.location.href='../dashboard/index.php?page=ekskul';
    </script>";

}

?>