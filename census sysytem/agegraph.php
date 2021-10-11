    <?php
include("connection.php");
session_start();
$id=$_SESSION['id'];
if(empty($_SESSION['id']))
header("location:adminlogin.php");
$qq="select * from admin where id='$id'";
$qrry=mysqli_query($con,$qq);
$rowww=mysqli_fetch_array($qrry);
$idd=$rowww['id'];
if(!($_SESSION['id']==$idd))
{
	header("location:adminlogin.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Cencus</title>
<link href="mainstyle.css" type="text/css" rel="stylesheet" />
<style>
#display {margin-left:10%; margin-right:10%; margin-top:60px; width:80%; height:3500px; border-radius:20px; background-color:#00B; }
#display table{border-right:2px #FFF; width:200px; height:400px; }
</style>
</head>

<body bgcolor="#000066">
<?php include("adminmain.php");?>
</br>
</br>
</br>
</br>
<center>
<?php
	//connection
	$con = new mysqli('localhost', 'root', '', 'online_cencus');
	$sql = "SELECT gender, count(*) as number FROM member GROUP BY gender";
	$result = mysqli_query($con,$sql);
?>



<div id="piechart" style="width: 900px; height: 500px;"></div>
<script type="text/javascript" src="js\loader.js"></script>  
<script type="text/javascript">  
	google.charts.load('current', {'packages':['corechart']});  
	google.charts.setOnLoadCallback(drawChart);  
	function drawChart(){  
    var data = google.visualization.arrayToDataTable([  
              	['Gender', 'Number'],  
              	<?php  
					while($row = mysqli_fetch_array($result)){  
	               		echo "['".$row["gender"]."', ".$row["number"]."],";  
	              	}  
              	?>  
         	]);  
    var options = {  
          		title: 'Percentage of Male and Female Members',  
          		//is3D:true,  
          		pieHole: 0.4  
         	};  
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
    chart.draw(data, options);  
}  
</script>
</center>
<?php include("footer.php"); ?>

</body>
</html>