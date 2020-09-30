<?php  
$conn = mysqli_connect("localhost", "root", "", "csvdata");
if(isset($_POST["submit"]))
{
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
   $handle = fopen("csv/newcsv.csv", "r");
   while($data = fgetcsv($handle))
   {
       echo $data[0];
    $item1 = mysqli_real_escape_string($conn, $data[0]);  
                $item2 = mysqli_real_escape_string($conn, $data[1]);
                $item3 = mysqli_real_escape_string($conn, $data[2]);
                $item4 = mysqli_real_escape_string($conn, $data[3]);
                $item5 = mysqli_real_escape_string($conn, $data[4]);
                $item6 = mysqli_real_escape_string($conn, $data[5]);
                $item7 = mysqli_real_escape_string($conn, $data[6]);
                $query = "INSERT into video1(frame, track_id, x, y, w, h, gender) 
                values('$item1','$item2','$item3','$item4','$item5','$item6','$item7')";
                mysqli_query($conn, $query);
   }
   fclose($handle);
   echo "<script>alert('Import done');</script>";
   header('Location:index.php');
  }
 }
}
?>  
<!DOCTYPE html>  
<html>  
 <head>  
  <title>Webslesson Tutorial</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
 </head>  
 <body>  
  <h3 align="center">How to Import Data from CSV File to Mysql using PHP</h3><br />
  <form method="post" enctype="multipart/form-data">
   <div align="center">  
    <label>Select CSV File:</label>
    <input type="file" name="file" />
    <br />
    <input type="submit" name="submit" value="Import" class="btn btn-info" />
   </div>
  </form>
 </body>  
</html>
