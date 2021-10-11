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
#display {margin-left:10%; margin-right:10%; margin-top:60px; width:80%; height:900px; border-radius:20px; background-color:#00B }


#display table tr td{ color:#FFF; #FFF;}
#display table tr th{ background-color:#000; color:#FFF}
#display a{ color:red}
#display a:hover{ color:#60C}
</style>

</head>

<body bgcolor="#000066">
<?php include("officermain.php");?>
<?php 
include("connection.php");
$id=$_REQUEST['id'];
$q="select * from temporary where id='$id'";
$qry=mysqli_query($con,$q);
$row=mysqli_fetch_array($qry);
?>
<div id="display">
<h1 align="center">Approvel</h1>
<form action="approvelprocess.php" method="post" enctype="multipart/form-data">
<table align="center">
<tr style="padding-left:100px">
<td>Serial Number</td>
<td style="padding:10px"><input type="text" name="id"value="<?php echo $row['id'];?>" placeholder="Serial number" readonly  /></td>
</tr>
<tr style="padding-left:100px">
<td>Name of the person</td>
<td style="padding:10px" ><input type="text" placeholder="name" name="name" value="<?php echo $row['name'];?>"   /></td>
</tr>
<tr style="padding-left:100px">
<td >Relation to Head</td>
<td style="padding:10px"><input type="text" placeholder="relation"  name="relation" value="<?php echo $row['relation'];?>"/></td>
</tr>
<tr style="padding-left:100px">
<td >Gender</td>
<td style="padding:10px"><input type="radio" value="male" <?php if($row['gender']=='male'){?> checked="checked" <?php } ?> name="gender" />Male <input type="radio" value="female" name="gender" <?php if($row['gender']=='female'){?>  checked="checked"<?php } ?> />Female <input type="radio" value="shemale" name="gender" <?php if($row['gender']=='shemale'){?>  
 checked="checked" <?php }?>/>shemale</td>
</tr>
<tr style="padding-left:100px">
<td >Date of Birth</td>
<td style="padding:10px"><input type="date" name="date"  placeholder="yy/mm/dd" value="<?php echo $row['date_of_birth'];?>"/></td>
</tr>
<tr style="padding-left:100px">
<td >Age (in completed years)</td>
<td style="padding:10px"><input type="text" placeholder="Age" name="age" value="<?php echo $row['age'];?>" /></td>
</tr>
</tr>
<tr style="padding-left:100px">
<td >Current Marital Status</td>
<td style="padding:10px"><select name="status"><option value="">--Select--</option><option value="single" 
<?php if($row['marid_status']=='single'){?> selected="selected" <?php } ?> >Single</option><option value="married"
<?php if($row['marid_status']=='married'){?> selected="selected" <?php } ?> >Married</option></select></td>
</tr>
<tr>
<tr style="padding-left:100px">
<td >Religion</td>
<td style="padding:10px"> <select name="religion"> <option>--Select--</option>
<option value="islam"<?php if($row['religion']=='Islam'){?> selected="selected" <?php } ?> >Islam</option>
<option value="christian" <?php if($row['religion']=='christian'){?> selected="selected" <?php } ?>>Christian</option>
<option value="hindo" <?php if($row['religion']=='hindo'){?> selected="selected" <?php } ?>>Hindo</option>
</select></td></tr>
<tr style="padding-left:100px">
<td >Disability</td> 
<td style="padding:10px"><input type="radio" value="yes" name="disability"<?php if($row['disability']=='yes'){?> checked="checked" <?php } ?> />Yes<input type="radio" name="disability" value="no" <?php if($row['disability']=='no'){?>  checked="checked" <?php } ?>/>No</td>
</tr>
<tr style="padding-left:100px">
<td >Mother Tounge</td>
<td style="padding:10px"><select name="taounge" style="width:100px"/>
<option value="">--Select--</option><option value="urdu" <?php if($row['tangue']=='urdu'){?> selected="selected" <?php } ?>>Urdu</option><option value="punjabi"<?php if($row['tangue']=='punjabi'){?> selected="selected" <?php } ?>>Punjabi</option><option value="pushto"<?php if($row['tangue']=='pushto'){?> selected="selected" <?php } ?>>Pushto</option></select></td>
</tr>
<tr style="padding-left:100px">
<td >Highest Qulification</td>
<td style="padding:10px"><select name="education"><option>--Select--</option>
<option value="matric" <?php if($row['education']=='matric'){?> selected="selected" <?php } ?>>Matric</option>
<option value="intermediate" <?php if($row['education']=='intermediate'){?> selected="selected" <?php } ?>>Intermediate</option>
<option value="graduation" <?php if($row['education']=='graduation'){?> selected="selected" <?php } ?>>Graduation</option>
<option value="MA" <?php if($row['education']=='MA'){?> selected="selected" <?php } ?>>Masters/MA</option>
<option value="phd" <?php if($row['education']=='phd'){?> selected="selected" <?php } ?>>Phd</option></select></td>
</tr>
<tr style="padding-left:100px">
<td >Employe Status</td>
<td style="padding:10px"><input type="radio"  name="employee" value="employee" <?php if($row['employee']=='employee'){?> checked="checked" <?php } ?>/>Employe<input type="radio"  name="employee" value="unemploye"<?php if($row['employee']=='unemploye'){?> checked="checked" <?php } ?> />Unemploye</td>
</tr>
<tr style="padding-left:100px">
<td >city</td>
<td style="padding:10px"><select name="city"><option>--Select--</option>
<option value="burewala" <?php if($row['city']=='burewala'){?> selected="selected" <?php } ?>>Burewala</option>
<option value="vehari" <?php if($row['education']=='vehari'){?> selected="selected" <?php } ?>>Vehari</option>
<option value="chichawatni" <?php if($row['education']=='chichawatni'){?> selected="selected" <?php } ?>>chichawatni</option>
<option value="arifwala" <?php if($row['education']=='arifwala'){?> selected="selected" <?php } ?>>Arifwala</option>
<option value="sahiwal" <?php if($row['education']=='sahiwal'){?> selected="selected" <?php } ?>>Sahiwal</option>
</select>
</td>
</tr>
<tr>
<td align="left">Certificat/other Approvel Dacoments picture</td>
<td > <img src="upload/<?php echo $row['picture']; ?>" height="100px" width="100px"/>  </td>
</tr>
<tr>
<td style="padding-left:200px"> <input type="submit" value="Approved" name="approved" style="height:30px; margin-top:30px; margin-right:110px; width:200px; height:30px; border-radius:10px;" /></td>
<td align="right"><a href="disapproved.php?id=<?php echo $row['id']; ?>" style=" text-decoration:none; "> <input type="button" style="width:200px; height:30px; border-radius:10px;"   value="Disapproved" name="disapproved"  /></a></td>
</tr>
</table>
</form>
</div>
<?php include("footer.php"); ?>
</body>
</html>