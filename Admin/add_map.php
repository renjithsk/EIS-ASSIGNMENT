<?php include("../database/db.php"); ?>
<?php if(!isset($_SESSION)) { session_start(); } ?>

<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>My-tour bootstrap Design website | Home :: w3layouts</title>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>

<link href="style.css" rel="stylesheet" type="text/css" />

<link href="../css/bootstrap.css" rel='stylesheet' type='text/css'/>
<link href="../css/style.css" rel="stylesheet" type="text/css" media="all"/>
<meta name="viewport" content="width=device-width, initial-scale=1">




<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js--> 
<script src="js/jquery.min.js"></script>

<!--/js-->
<!--animated-css-->
<link href="../css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="../js/wow.min.js"></script>
<script>
 new WOW().init();
</script>
<!--/animated-css-->
</head>
<body>
<!--header-->
<!--sticky-->
<?php
if($_SESSION['loginstatus']=="")
{
	header("location:loginform.php");
}

?>
<?php include('function.php'); ?>
<?php
if(isset($_POST["sbmt"]))
{
	$cn=makeconnection();
	
	$sq="select * from map";
	$res=mysql_query($sq);
	$dat=mysql_fetch_array($res);
	if($dat>0)
	
	{
		//echo $dat["pl_id"]; exit;
	$map="update map set pl_name='".$_POST["place"]."', pl_lat='".$_POST["lattitude"]."',pl_lon='".$_POST["longitude"]."' where pl_id='".$dat["pl_id"]."' ";
	$res=mysql_query($map);	
	}
	else
	{
	 $s="insert into map(pl_name,pl_lat,pl_lon) values('" . $_POST["place"] ."','" . $_POST["lattitude"] ."','" . $_POST["longitude"] ."')";
	mysqli_query($cn,$s);
	mysqli_close($cn);
	echo "<script>alert('Record Save');</script>";
	}
}
?>



<?php include('top.php'); ?>
<!--/sticky-->
<div style="padding-top:100px; box-shadow:1px 1px 20px black; min-height:570px" class="container">
<div class="col-sm-3" style="border-right:1px solid #999; min-height:450px;">
<?php include('left.php'); ?>
</div>
<div class="col-sm-9">




<form method="post">
<table border="0" width="400px" height="200px" align="center" class="tableshadow">
<tr><td colspan="2" class="toptd">Add Map</td></tr>
<tr><td class="lefttxt">Place Name</td><td>
<input type="text" name="place" value="" placeholder="Place Name"/>
</td></tr>
<tr><td class="lefttxt">Place Lattitude</td><td>
<input type="text" name="lattitude" value="" placeholder="Place Lattitude"/>
</td></tr>
<tr><td class="lefttxt">Place Longitude</td><td>
<input type="text" name="longitude" value="" placeholder="Place Longitude"/>
</td></tr>

<tr><td>&nbsp;</td><td ><input type="submit" value="SAVE" name="sbmt" /></td></tr>




</table>
</form>



</div>


</div>
<?php include('bottom.php'); ?>
</body>
</html>