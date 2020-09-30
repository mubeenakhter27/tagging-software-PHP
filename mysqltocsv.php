<?php  
error_reporting(0);
 $connect = mysqli_connect("localhost", "root", "", "csvdata");  
 $query ="SELECT * FROM video1output";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Tagging Software</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Export Mysql Table Data to CSV file in PHP</h2>  
                <h3 align="center">Employee Data</h3>   
                <a href='main.php'><button align="center" class="btn btn-success id="save">Back to main Page</button></a>              
                <br />  
                <form method="post" action="export.php" align="center">  
                     <input type="submit" name="export" value="CSV Export" class="btn btn-success" />  
                </form>  
                <br />  
                <div class="table-responsive" id="employee_table">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="5%">Frame</th>  
                               <th width="15%">Track Id</th>  
                               <th width="15%">X</th>  
                               <th width="10%">Y</th>  
                               <th width="15%">W</th>  
                               <th width="5%">H</th>
                               <th width="10%">Gender</th> 
                               <th width="20%">Freme Edit Time</th> 
                          </tr>  
                     <?php  
                     while($row = mysqli_fetch_array($result))  
                     {  
                     ?>  
                          <tr>  
                               <td><?php echo $row["frame"]; ?></td>  
                               <td><?php echo $row["track_id"]; ?></td>  
                               <td><?php echo $row["x"]; ?></td>  
                               <td><?php echo $row["y"]; ?></td>  
                               <td><?php echo $row["w"]; ?></td>  
                               <td><?php echo $row["h"]; ?></td>
                               <td><?php echo $row["gender"]; ?></td>
                               <td><?php echo $row["timestamp"]; ?></td>
                               <th width="5%"><form method='get' action='frame-check.php'><button type='submit'name='frame' value='<?php echo $row["frame"]; ?>'>Check</button></form></th>  
                          </tr>  
                     <?php       
                     }  
                     ?>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html> 