<html>
<head>
<title>test page</title>
<script type="text/javascript">
 function submitJArray() {
var jArray = [ "One", "Two", "Three"];
   document.getElementById("hiddenF").value = jArray;
   };</script>
</head>
<body>
<form id="testform" action="process.php" method="post" onsubmit="return submitJArray();">
<div>
<input type="hidden" id="hiddenF" name="hiddenF" value="">
Dummy Field: <input type="text" id="txt" name="txt" value="" size="30"><br><br>
<input type='button' onclick="submitJArray();" >
<input type="submit" value="submit">
</div>
</form>
</body>
</html>