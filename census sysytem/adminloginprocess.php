<?php
session_start();
$idd=$_REQUEST['id'];
$pass=$_REQUEST['password'];
include("connection.php");
$q="select * from admin where id='$idd' and password='$pass'";
$eq=mysqli_query($con,$q);
$num=mysqli_num_rows($eq);
if($num>0)
	{
		$row=mysqli_fetch_array($eq);
		$_SESSION['id']=$row['id'];
		$_SESSION['password']=$row['password'];
		$_SESSION['name']=$row['name'];
		$_SESSION['picture']=$row['picture'];
		header("location:adminpage.php");
	}
	else
	header("location:adminlogin.php?msg=1");
?>