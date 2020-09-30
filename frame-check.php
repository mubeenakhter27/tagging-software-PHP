<?php
$conn = mysqli_connect("localhost", "root", "", "csvdata");
$frame = $_GET['frame'];

$sql = "SELECT * FROM video1output where frame='$frame' ";
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
  //  echo "0 results";
}


?>

<!DOCTYPE html>
<html>

<head>
   <meta charset="utf-8">
    <title>Tagging Software</title>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="fabric.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
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
            width : 300px;
            height : 100px;
        }
    </style>
</head>

<body>
<div class="col text-center">
<a href='index.php'><button class="btn btn-info">Home Page</button></a>
<a href='main.php'><button class="btn btn-success">Main Page</button></a>
<a href='mysqltocsv.php'><button class="btn btn-error">Check CSV</button></a>
   
</div>
   
    
    <canvas id="c" width="1920" height="1080"></canvas>
    
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
                $sql = "SELECT * FROM video1output where frame='$frame' ";
               
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
                echo "0 results";
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
