<?php
// include database connection file
include_once("conn.php");

// Get id from URL to delete that user
$id = $_GET['id'];
 
// Delete user row from table based on given id
$query = mysqli_query($link, "DELETE FROM kelas WHERE IDkelas=$id");
 
// After delete redirect to Home, so that latest user list will be displayed.
echo "<script>
alert('Data berhasil dihapus!');
window.location.href='../dashboard/index.php?page=kelas';
</script>";
?>