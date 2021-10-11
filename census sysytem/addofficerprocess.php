<?php
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$gender=$_REQUEST['gender'];
$email=$_REQUEST['email'];
$phno=$_REQUEST['cellno'];
$address=$_REQUEST['address'];
$password=$_REQUEST['password'];
$area=$_REQUEST['area'];
$picture=$_FILES['picture']['name'];
$tmp=$_FILES['picture']['tmp_name'];
$store="upload/".$picture;
include("connection.php");
$q="insert into officer(id,name,gender,email,phno,address,password,area,picture) values('$id','$name','$gender','$email','$phno','$address','$password','$area','$picture')";
$qry=mysqli_query($con,$q);
if($qry)
{
	move_uploaded_file($tmp,$store);
header("location:addofficers.php?msg=1");
}
else
header("location:addofficers.php?msg=2");

?>