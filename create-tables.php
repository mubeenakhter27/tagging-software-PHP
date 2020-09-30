<?php 
$conn = mysqli_connect("localhost", "root", "", "csvdata");
$sql = "CREATE TABLE `video1` (
     `frame` varchar(30) DEFAULT NULL,
      `track_id` varchar(30) DEFAULT NULL,
       `x` varchar(30) DEFAULT NULL,
        `y` varchar(30) DEFAULT NULL,
         `w` varchar(30) DEFAULT NULL,
          `h` varchar(30) DEFAULT NULL,
           `gender` varchar(30) DEFAULT NULL,
           `face` varchar(30) DEFAULT NULL,
           `masktype` varchar(30) DEFAULT NULL,
           `pose` varchar(30) DEFAULT NULL
            )";
    if (mysqli_query($conn, $sql)) {
        //echo "<script>alert('Old record deleted successfully');</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
   
   $sql = "CREATE TABLE `video1output` (
    `frame` varchar(30) DEFAULT NULL,
     `track_id` varchar(30) DEFAULT NULL,
      `x` varchar(30) DEFAULT NULL,
       `y` varchar(30) DEFAULT NULL,
        `w` varchar(30) DEFAULT NULL,
         `h` varchar(30) DEFAULT NULL,
          `gender` varchar(30) DEFAULT NULL,
          `face` varchar(30) DEFAULT NULL,
          `masktype` varchar(30) DEFAULT NULL,
          `pose` varchar(30) DEFAULT NULL,
          `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
           )";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('New Project Created successfully');</script>";
            header('Location:index.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
        
        // $sql = "ALTER TABLE `video1`
        // ADD PRIMARY KEY (`id`)";
        //     if (mysqli_query($conn, $sql)) {
        //         //echo "<script>alert('Old record deleted successfully');</script>";
        //     } else {
        //         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //     }
           
        //    $sql = "ALTER TABLE `video1`
        //    MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT;
        //  COMMIT";
        //         if (mysqli_query($conn, $sql)) {
        //             //echo "<script>alert('Old record deleted successfully');</script>";
        //         } else {
        //             echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //         }

        //         $sql = "ALTER TABLE `video1output`
        //         ADD PRIMARY KEY (`id`)";
        //             if (mysqli_query($conn, $sql)) {
        //                 //echo "<script>alert('Old record deleted successfully');</script>";
        //             } else {
        //                 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //             }
                   
        //            $sql = "ALTER TABLE `video1output`
        //            MODIFY `id` int(11) DEFAULT NULL AUTO_INCREMENT;
        //          COMMIT";
        //                 if (mysqli_query($conn, $sql)) {
        //                     echo "<script>alert('Old record deleted successfully');</script>";
        //                 } else {
        //                     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        //                 }
  
?>