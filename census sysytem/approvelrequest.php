<?php
include("connection.php");
session_start();
$id=$_SESSION['id'];
if(empty($_SESSION['id']))
header("location:officerlogin.php");
$qq="select * from officer where id='$id'";
$qrry=mysqli_query($con,$qq);
$rowww=mysqli_fetch_array($qrry);
$idd=$rowww['id'];
if(!($_SESSION['id']==$idd))
{
	header("location:officerlogin.php");
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Cencus</title>
<link href="mainstyle.css" type="text/css" rel="stylesheet" />
<style>
#display {margin-left:10%; margin-right:10%; margin-top:60px; width:80%; height:500px; border-radius:20px; background-color:#00B }


#display table tr td{ color:#FFF; #FFF;}
#display table tr th{ background-color:#000; color:#FFF}
#display a{ color:red}
#display a:hover{ color:#60C}
</style>

</head>

<body bgcolor="#000066">
<?php include("officermain.php");?>
<div id="display">
<table align="left" style="margin-left:50px; margin-top:50px">
<caption style=" font-size:24px; color:#FFF;">Users</caption>
<tr>
<th>Display</th><th>ID</th><th>Family No</th><th>Name</th><th>Area</th>
</tr>
<?php
include("connection.php"); 
$id=$_SESSION['id'];
$qr="select * from officer where id='$id'";
$qry=mysqli_query($con,$qr);
$area=mysqli_fetch_array($qry);
$areaa=$area['area'];
$q="select * from nadra where area='$areaa'";
$qryy=mysqli_query($con,$q);
while($roww=mysqli_fetch_array($qryy))
{ ?>
<tr>
<td><a href="approvelrequest.php?id=<?php echo $roww['id'];?>" >Request</a></td>
<td style="padding-right:10px"><?php echo $roww['id'];?></td>
<td> <?php echo $roww['family_number']; ?></td>
<td style="padding-right:15px"> <?php echo $roww['name']; ?></td>
<td> <?php echo $roww['area']; ?></td>
</tr>
<?php }?>
</table>
<table align="right" style="margin-right:50px; margin-top:50px">
<caption style="font-size:25px; color:#FFF">Request</caption>
<th>Display</th><th>ID</th><th>Name</th>
<?php 
include("connection.php");
$idd=$_REQUEST['id'];
$quer="select * from temporary  where id like '$idd%'";
$exe=mysqli_query($con,$quer);
while($rowww=mysqli_fetch_array($exe))

{?>
<tr>
<td><a href="approvelsystem.php?id=<?php echo $rowww['id'];?>" >Select</a></td>
<td><?php echo $rowww['id']; ?></td>
<td><?php echo $rowww['name']; ?></td>
</tr>
<?php }?>
</table>
</div>
<?php include("footer.php"); ?>

</body>
</html>