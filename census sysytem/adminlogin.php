<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Online Cencus</title>
<link href="mainstyle.css" type="text/css" rel="stylesheet" />
<style>
input {border-radius:5px; width:150px; height:20px;}
</style>

</head>

<body bgcolor="#000066">
<?php include("main.php");?>
<form action="adminloginprocess.php" method="post" >
<table height="220px" width="80%px" bgcolor="#FFFFFF"  style="margin-left:10%; margin-right:10%; margin-top:50px; border-radius:10px">
<tr>
<td align="center"><h2>Admin Login</h2></td>
</tr>
<tr>
<tr>
<td align="center"><?php
if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){
echo "Incorrect Detail.!!!!";
}
?></td>
</tr>
<tr>
<td align="center"  ><input type="number" name="id" placeholder="ID"  /></td>
</tr>
<tr>
<td align="center" style="padding:10px" ><input type="password"  name="password" placeholder="Password"  /></td>
</tr>
<tr>
<td align="center" ><input type="submit" value="Sign in" style=" margin-bottom:15px ;width:70px; height:40px;border-radius:15px; font-size:16px; color:#FF5FAA /></td>
</tr>
</table>
</form>
 <?php include('footer.php'); ?>
</body>
</html>