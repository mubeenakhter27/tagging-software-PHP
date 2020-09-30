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
           <script>
                function conformDelete(){
                    var result = confirm("Are You Sure!");
                    if (result == true) { 
                         window.location = "delete-tables.php";
            } else { 
              
            } 
                }
               
           </script>
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:900px;">  
                <h2 align="center">Tagging Software</h2>  
                <h3 align="center"></h3>   
                <a href='main.php'><button align="center" class="btn btn-success id="save">Work on current project</button></a>
              
                <a href='create-tables.php'><button align="center" class="btn btn-success">Create New Project</button></a> 
                <a href='csvtomysql.php'><button align="center" class="btn btn-success ">Import CSV</button></a>
                <a href='mysqltocsv.php'><button align="center" class="btn btn-success">Export CSV</button></a>     
                <button align="center" onclick='conformDelete();' class="btn btn-success">Delete old Project</button>
                <br />  
               
                </div>  
           </div>  
      </body>  
 </html> 