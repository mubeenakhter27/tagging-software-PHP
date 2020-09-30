<html>
<body>
<p>
<?php 
session_start();
$conn = mysqli_connect("localhost", "root", "", "csvdata");
$jArray = $_POST['finaloutput'];
$frame = $_POST['frame'];
echo $jArray;
$item1 = $item2 = $item3 = $item4 = NULL ;
if(jArray !=NULL){
$array =  (explode(",",$jArray));
}
$arraycount = count($array);
echo $arraycount;
for($i=0;$i<$arraycount;$i++){
    $item1 = (int)$array[$i]; $i++;
    $item2 = (int)$array[$i]; $i++;
    $item3 = (int)$array[$i]; $i++;
    $item4 = (int)$array[$i]; $i++;
    $item5 = $array[$i]; $i++;
    $item6 = $array[$i]; $i++;
    $item7 = $array[$i]; $i++;
    $item8 = $array[$i]; 
 if($item1==0&&$item2==0&&$item3==0&&$item4==0){
        $sql = "INSERT into video1output(frame) 
    values('$frame')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
     }else{
   $sql = "INSERT into video1output(frame, x, y, w, h,gender,face,masktype,pose) 
    values('$frame','$item1','$item2','$item3','$item4','$item5','$item6','$item7','$item8')";
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
	 }
}
$frame = $frame + 15;
echo $var_value = $frame;

//On page 2
 $_SESSION['varname'] = $var_value;
 
 $var_value = $_SESSION['varname'];
 header('Location:main.php');
?>
</p>
</body>
</html>