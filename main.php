<?php
session_start();
error_reporting(0);
$session = NULL;
$restart_program = NULL;
//echo $var_value = $_SESSION['varname'];
//On page 1
$session = $var_value = $_SESSION['varname'];
$frame = $track_id = $x = $y = $w = $h = $gender = NULL;
$conn = mysqli_connect("localhost", "root", "", "csvdata");
    

$i = 383;
// if($session!= NULL){
   
//     $sql = "SELECT * FROM video1 where frame='$session' ";
//     $image_path = '';
//     $result = mysqli_query($conn, $sql);

//     if (mysqli_num_rows($result) > 0) {
//         // output data of each row
//         while($row = mysqli_fetch_assoc($result)) {
//         //  echo $row["frame"]. "<br>";
//             $frame = $row['frame'];
//             $image_path ='Frames/' . $row['frame'] . '.jpg' ; 
//             $track_id = $row['track_id'];
//             $x = $row['x'];
//             $y = $row['y'];
//             $w = $row['w'];
//             $h = $row['h'];
//             $gender = $row['gender'];
//         //  echo $image_path;
//         }
//     } else {
//         $image_path ='Frames/' . $session . '.jpg' ; 
//     }
   

// }
// else{

    //start again project
    $sql = "SELECT frame FROM video1output ";
    $image_path = '';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        //  echo $row["frame"]. "<br>";
            $frame = $row['frame'];
           
            $frame = $frame + 100;
           
        }
    } else {
      //  echo "0 results";
    }

    if($frame!=NULL){
     //   echo $frame;
        $sql = "SELECT * FROM video1 where frame='$frame' ";
    $image_path = '';
    $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        //  echo $row["frame"]. "<br>";
            $frame = $row['frame'];
            $image_path ='Frames/' . $row['frame'] . '.jpg' ; 
            $track_id = $row['track_id'];
            $x = $row['x'];
            $y = $row['y'];
            $w = $row['w'];
            $h = $row['h'];
            $gender = $row['gender'];
        //  echo $image_path;
        }
         } else {
       // echo "0 results";
      // $frame = $row['frame'];
            $image_path ='Frames/' . $frame . '.jpg' ; 
            $track_id = 10;
            $x = 10;
            $y = 10;
            $w = 10;
            $h = 10;
            $gender = 'male';
        }
    }else{
        $sql = "SELECT * FROM video1 LIMIT 2 ";
    $image_path = '';
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
        //  echo $row["frame"]. "<br>";
            $frame = $row['frame'];
            $image_path ='Frames/' . $row['frame'] . '.jpg' ; 
            $track_id = $row['track_id'];
            $x = $row['x'];
            $y = $row['y'];
            $w = $row['w'];
            $h = $row['h'];
            $gender = $row['gender'];
        //  echo $image_path;
        }
    } else {
        $frame = 1;
        $image_path ='Frames/' . $frame . '.jpg' ; 
            $track_id = 10;
            $x = 10;
            $y = 10;
            $w = 10;
            $h = 10;
            $gender = 'male';
    }
}
   // }


  

if (!file_exists($image_path));
list($width, $height, $type, $attr) = getimagesize($image_path);

//echo $width . ' ' . $height; 



// $row = 0;
// $cellcount = 0;
// $frame = NULL;
// $track_id = $x = $y = $w = $h = $gender = [];
// if (($handle = fopen("testdata.csv", "r")) !== FALSE) {
//     while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
//         $num = count($data);
//       //  echo "<p> $num fields in line $row: <br /></p>\n";
//        // $row++;
//         for ($c=0; $c < $num; $c++) {
             
//             if($cellcount==0){
//                 $frame[$row] = $data[$c];
//                 $cellcount++;
//             }else if ($cellcount == 1){
//                 $track_id[$row] = $data[$c];
//                 $cellcount++;
//             }else if($cellcount == 2){
//                 $x[$row] = $data[$c];
//                 $cellcount++;
//             }else if($cellcount == 3){
//                 $y[$row] = $data[$c];
//                 $cellcount ++;
//             }else if ($cellcount == 4){
//                 $w[$row] = $data[$c];
//                 $cellcount ++;
//             }else if($cellcount == 5){
//                 $h[$row] = $data[$c];
//                 $cellcount ++;
//             }else{
//                 $gender[$row] = $data[$c];
//                 $cellcount = 0;
//             }
          
//         }
//            // echo $frame[$row];
        
//         $row ++;
//     }
//     fclose($handle);
// }

//
       
?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <title>Tagging Software</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="fabric.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link href="css/elements.css" rel="stylesheet">
    <script src="js/my_js.js"></script>
    <script>
    </script>
    <script>
function validateOutputForm() {
  var x = document.forms["outputform"]["frame"].value;
  if (x == "") {
    alert("First Save Frame");
    return false;
  }
}
</script>
    <style>
    canvas {
		 border : 4px solid blue;
		}
        button{
           
        }
    </style>
</head>

<body>
<div class="col text-center">
<a href='index.php'><button class="btn btn-info">Home Page</button></a>
<a href='mysqltocsv.php'><button class="btn btn-info">Check Edit CSV</button></a>
   
</div>
    <button class="btn btn-success" id="rect">Add a Bounding Box</button>
    <button class="delete_object btn btn-success">Delete Selected Bounding Box</button>
    <canvas id="c" width="<?php echo $width; ?>" height="<?php echo $height; ?>"></canvas>
    <div class="col text-center">
    <button class="btn btn-success" id="save">Push to CSV</button>
    <form action="process.php" method="post" name="outputform" onsubmit="return validateOutputForm()">
    <label for="fname">Frame</label>
        <input type='text' id='frame' value='' name='frame' />
       
            <input type='hidden' id='finaloutput' value='' name='finaloutput' readonly/>
           
            <input class="btn btn-warning" type="submit" value="Verify" readonly>
        </form>
    </div>


    <div id="abc">
        <!-- Popup Div Starts Here -->
        <div id="popupContact">
            <!-- Contact Us Form -->
            <div id="form">
                <img id="close" src="images/3.png" onclick="div_hide()">
                <h2>Object Info</h2>
                <hr>
                <label for="Gender">Gender</label>
                <select name="objectGender" id="objectGender">
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                 </select>
                <label for="Gender">ON Face</label>
                <select name="objectFace" id="objectFace">
                    <option value="masked">masked</option>
                    <option value="unmasked">Unmasked</option>
                 </select>
                 <label for="Gender">Mask Type</label>
                <select name="objectMaskType" id="objectMaskType">
                    <option value="medical">Medical</option>
                    <option value="other">Other</option>
                    <option value="none">None</option>
                </select>
                <label for="Gender">pose</label>
                <select name="objectPose" id="objectPose">
                    <option value="front">front</option>
                    <option value="side">side</option>
                    <option value="back">back</option>
                </select>
                <!-- <a href="javascript:%20check_empty()" id="submit">Send</a> -->
                <hr>
                <button id='submit' class="assign_object_values">Submit</button>
    </div>
        </div>
        <!-- Popup Div Ends Here -->
    </div>


   <!-- <p class="save"> -->
        
        <script>

            var canvas = new fabric.Canvas('c');
            
            canvas.setBackgroundImage('<?php echo $image_path?>', canvas.renderAll.bind(canvas));
            var canvasXvalue = <?php echo $x?>;
            var canvasYvalue = <?php echo $y?>;
            var canvasWidth = <?php echo $w?>;
            var canvasHeight = <?php echo $h?>;
            var finalCanvasXvalue = finalCanvasYvalue = finalCanvasWidth = finalCanvasHeight = 0;
           
                <?php // echo "<script>window.write('canvasHeight');</script>" . "hello world"; ?>


            //Function to genrate random color for canvas 
            function getRndColor() {
                var r = 255 * Math.random() | 0,
                    g = 255 * Math.random() | 0,
                    b = 255 * Math.random() | 0;
                return 'rgb(' + r + ',' + g + ',' + b + ')';
            }


            //OnClick add rectagle on image 
            $("#rect").on("click", function(e) {
                rect = new fabric.Rect({
                    left: 200,
                    top: 100,
                    width: 150,
                    height: 150,
                    fill: 'transparent',
                    stroke: getRndColor(),
                    strokeWidth: 5,
                });
                canvas.add(rect);
                // console.log(canvas.getObjects());
            });


            var frameoutput = <?php echo $frame;?>

            // rect variable for set reactangle value 
            <?php  
          //  $frame = 500;
                $sql = "SELECT * FROM video1 where frame='$frame' ";
               
                $result = mysqli_query($conn, $sql);
            
                if (mysqli_num_rows($result) > 0) {
                    // output data of each row
                    while($row = mysqli_fetch_assoc($result)) {
                   
            ?>
           
            rect = new fabric.Rect({
                left: <?php echo $row['x']; ?>,
                top: <?php echo $row['y']; ?>,
                width: <?php echo $row['w']; ?>,
                height: <?php echo $row['h']; ?>,
                fill: 'transparent',
                stroke: getRndColor(),
                strokeWidth: 3,
            });
      
             canvas.add(rect);
            <?php 
              }
            } else {
               // echo "0 results";
            }
            ?>
           

    

            function objectAddedListener(ev) {
                let target = ev.target;
                console.log('left', target.left, 'top', target.top, 'width', target.width, 'height', target.height);

            }

            function objectMovedListener(ev) {
                let target = ev.target;
                finalCanvasXvalue = target.left;
                finalCanvasYvalue = target.top;
                finalCanvasWidth = target.width * target.scaleX;
                finalCanvasHeight = target.height * target.scaleY;
                console.log('left', finalCanvasXvalue, 'top', finalCanvasYvalue, 'width', finalCanvasWidth, 'height', finalCanvasHeight);
            }

            canvas.on('object:added', objectAddedListener);
            canvas.on('object:modified', objectMovedListener);

            var canvasXvalueout = [];
            var canvasYvalueout = [];
            var canvasWvalueout = [];
            var canvasHvalueout = [];
            var finalOutPutCounter = 0;
            var form = '';
            var counterr = 0;

            
            //Final image and csv save
            $("#save").on("click", function(e) {
                $(".save").html(canvas.toSVG());
                //   consol.log('hello world');
                console.log(canvas.getObjects());
                // console.log(canvas.toSVG());
                canvas.forEachObject(function(obj) {
                    console.log(obj.left);
                    console.log(obj.top);
                    console.log(obj.width * obj.scaleX);
                    console.log(obj.height * obj.scaleY);
                    canvasXvalueout[finalOutPutCounter] = obj.left;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.top;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.width * obj.scaleX;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.height * obj.scaleY;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.gender;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.face;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.maskType;
                    finalOutPutCounter ++;
                    canvasXvalueout[finalOutPutCounter] = obj.pose;
                    finalOutPutCounter ++;
                    counterr++;
                });
             // alert('Total Frames' + counterr);
              
              finalOutPutCounter = 0;
              counterr = 0;
           
             
             // $('#finaloutput').value(finalOutPutCounter);
              document.getElementById('finaloutput').value = canvasXvalueout;
              document.getElementById('frame').value = frameoutput;
            });


            //code for delete selected object
            $('.delete_object').click(function() {
                var activeObject = canvas.getActiveObjects();
                if (confirm('Are you sure?')) {
                    canvas.discardActiveObject();
                    canvas.remove(...activeObject);
                }
            });

            $('.assign_object_values').click(function() {
                var objectId = document.getElementById('objectGender').value;
                document.getElementById('objectGender').value = '';
                var objectFace = document.getElementById('objectFace').value;
                document.getElementById('objectFace').value = '';
                var objectMaskType = document.getElementById('objectMaskType').value;
                document.getElementById('objectMaskType').value = '';
                var objectPose = document.getElementById('objectPose').value;
                document.getElementById('objectPose').value = '';
                object = canvas.getActiveObject();
                var activeObject = canvas.getActiveObjects();
                object.set({
                    id: objectId,
                    gender: objectId,
                    face: objectFace,
                    maskType: objectMaskType,
                    pose: objectPose
                });
                div_hide();
            });


            let activeObjects = canvas.getActiveObjects();
            if (activeObjects.length) {
                if (confirm('Do you want to delete the selected item??')) {
                    activeObjects.forEach(function(object) {
                        canvas.remove(object);
                    });
                }
            } else {
               // alert('Please select the drawing to delete')
            }

            canvas.on('mouse:dblclick', function(ev) {
                //  e.target.set('fill', 'green');
                //  canvas.renderAll();
                let target = ev.target;
                console.log(target.gender);
                div_show();
            });

           
        <?php
          
       
            ?>
          
        </script>


<script>
   var res = "success";
</script>
<?php
//    $abcd =  "<script>document.writeln(canvasXvalueout);</script>";
//    echo $abcd;
?>
</body>

</html>

<?php
     session_destroy();
?>