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
$size=$_FILES['picture']['size'];
$q="insert into temporary(id,name,relation,gender,age,marid_status,religion,disability,tangue,education,employee,city,date_of_birth,picture) values('$id','$name','$relation','$gender','$age','$status','$religion','$disability','$tangue','$education','$employee','$city','$date','$picture')";
$qry=mysqli_query($con,$q);
if($qry)
{
if(isset($_REQUEST['submit']))
{
$qe="insert into increment() values()";
mysqli_query($con,$qe);
header("location:userpage.php");
}
}
else
echo "error";
?>