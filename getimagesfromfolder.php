<?php
//Display Images With Image Name From A Folder
$conn = mysqli_connect("localhost", "root", "", "csvdata");
$files = glob("Frames/*.*");
for ($i=1; $i<count($files); $i++)
{
	$num = $files[$i];
	print $num."<br />";
    // echo '<img src="'.$num.'" alt="random image" />'."<br /><br />";
    $sql = "INSERT INTO images (sorce) VALUES ('$num')";

if (mysqli_query($conn, $sql)) {
   // echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
?>