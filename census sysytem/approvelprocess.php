<?php

	$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"online_cencus");
$id=$_REQUEST['id'];
$name=$_REQUEST['name'];
$relation=$_REQUEST['relation'];
$gender=$_REQUEST['gender'];
$date=$_REQUEST['date'];
$age=$_REQUEST['age'];
$status=$_REQUEST['status'];
$religion=$_REQUEST['religion'];
$disability=$_REQUEST['disability'];
$tangue=$_REQUEST['taounge'];
$education=$_REQUEST['education'];
$employee=$_REQUEST['employee'];
$city=$_REQUEST['city'];
$picture=$_FILES['picture']['name'];
if(isset($_REQUEST['approved']))
{
$size=$_FILES['picture']['size'];
$q="insert into member(id,name,relation,gender,age,marid_status,religion,disability,tangue,education,employee,city,date_of_birth,picture) values('$id','$name','$relation','$gender','$age','$status','$religion','$disability','$tangue','$education','$employee','$city','$date','$picture')";
$qry=mysqli_query($con,$q);
$reason="NULL";
$status="Approved";
$query="insert into status(id,name,gender,relation,area,status,reason) values('$id','$name','$gender','$relation','$city','$status','$reason')";
mysqli_query($con,$query);
$qq="delete from temporary where id='$id'";
$qrry=mysqli_query($con,$qq);
if($qry&&$qrry)
header("location:viewrequest.php");
}
if(isset($_REQUEST['disapproved']))
{
	$id=$_REQUEST['id'];
	$reason=$_REQUEST['reason'];
	$con=mysqli_connect("localhost","root","");
mysqli_select_db($con,"online_cencus");
$status="Disapproved";
$query="insert into status(id,name,gender,relation,area,status,reason) values('$id','$name','$gender','$relation','$city','$status','$reason')";
mysqli_query($con,$query);
$qq="delete from temporary where id='$id'";
$qqrry=mysqli_query($con,$qq);
if($qqrry)
header("location:viewrequest.php");
	}
?>