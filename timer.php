<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<?php
session_start();
$link=mysqli_connect("localhost","root","");
mysqli_select_db($link,"keyur");
$duration="";
$res=mysqli_query($link,"select * from table table1");
while($row=mysqli_fetch_array($res))
{
$duration=$row["duration"];
}
$_SESSION["duration"]=$duration;
$_SESSION["duration"]=date("Y-m-d H:i:s");
$end_time=$end_time=date('Y-m-d H:i:s', strtotime('+'.$_SESSION["duration"].'minutes',strtotime($_SESSION["start_time"])));
$_SESSION["end_time"]=$end_time;


?>
<script type="text/javascript">
window.location="index1.php";
</script>
</body>
</html>
