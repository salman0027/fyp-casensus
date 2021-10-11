<?php
include("connection.php");
session_start();
if(empty($_SESSION['id']))
header("location:adminlogin.php");
$id=$_SESSION['id'];
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
#display {margin-left:10%; margin-right:10%; margin-top:60px; width:80%; height:400px; border-radius:20px; background-color:#00B }
#display table tr td{ color:#FFF; #FFF; text-align:center}
#display table tr th{ color:#FFF; background-color:#000}
#display table caption{ color:#FFF}
#display table { }
</style>

</head>

<body bgcolor="#000066">
<?php include("adminmain.php");?>
<div id="display">

 
<img src="ki/IMG-20191224-WA0043.jpg"<?php echo $_SESSION['picture']; ?>" style="margin-top:20px; margin-left:30px; border-radius:40px" width="200" height="200"/>


<table  align="right" style="margin-top:0px; border-bottom-style:solid;">
<caption style="font-size:40px">  Officers</caption>
<tr>
<th>Picture</th><th>Id</th><th>Name</th><th>Password</th><th>Area</th><th>Action</th>
</tr>
<?php
 include("connection.php");
$q="select * from officer";
$qry=mysqli_query($con,$q);

 while($row=mysqli_fetch_array($qry))
{
	?>
<tr>
<td><img src="ki/<?php echo $row['picture']; ?>" width="40px" height="30px"  /></td>
<td><?php echo $row['id'];?></td>
<td><?php echo $row['name'];?></td>
<td><?php echo $row['password'];?></td>
<td><?php echo $row['area'];?></td>
<td id="container"><ul><li style="width:130
px; height:10px;"><a href="deleteofficer.php?id=<?php echo $row['id']; ?>" style=""/>Remove</a></li></ul></td>
</tr>
<?php } ?>
</table>

</div>
<?php include("footer.php"); ?>

</body>
</html>