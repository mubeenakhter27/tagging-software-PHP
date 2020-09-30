<?php  
header('Access-Control-Allow-Origin: *');
define('ROOTPATH', dirname(__FILE__));
exec('python test1.py');

?>