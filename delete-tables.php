<?php 
$conn = mysqli_connect("localhost", "root", "", "csvdata");


$sql = "DROP TABLE `video1`, `video1output`";
    if (mysqli_query($conn, $sql)) {
        echo "<script>alert('Old record deleted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    header('Location:index.php');
?>