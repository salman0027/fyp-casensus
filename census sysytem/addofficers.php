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
<script src="jquery_library/jquery-3.2.1.min.js">
</script>
<script src="jquery_library/jquery.validate.js"></script>
<script>
// Wait for the DOM to be ready
$(function() {
  // Initialize form validation on the registration form.
  // It has the name attribute "registration"
  $("form[name='addofficer']").validate({
    // Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      id: "required",
      name: "required",
	   address: "required",
	    cellno: "required",
		 area: "required",
		  picture: "required",
      email: {
        required: true,
        // Specify that email should be validated
        // by the built-in "email" rule
        email: true
      },
      password: {
        required: true,
        minlength: 5,
		maxlength:15
      },
	   password2: {
        required: true,
       equalTo:"#password"
      }
    },
    // Specify validation error messages
    messages: {
      id: "id required",
      name: "name required",
	   address: "addrs required",
	  cellno:"Cell_no required",
	  area:" Area required",
	  picture:" Pic required",
      password: {
        required: "Please provide a password",
        minlength: " minimum 5 characters ",
		 minlength: "maximum 15 characters ",
		
      },
	   password2: {
        required: "Please provide a password",
     equalTo:"password mismatch"
		
      },
      email: {
		  email:"enter a valid email ",
		  required:"email required"
		  }
    },
    // Make sure the form is submitted to the destination defined
    // in the "action" attribute of the form when valid
    submitHandler: function(form) {
      form.submit();
    }
  });
});
</script>

<style>
#form1 { height:800px; width:80%;margin-left:10%; margin-right:10%; margin-top:60px;}
input {
	border-radius:10px;
	}
	td{ color:#FFF;}
	table{ text-align:left}
	label{ margin-left:200px; margin-right:40px}
</style>
</head>

<body bgcolor="#000066">

<?php include("adminmain.php");?>
<div id="form1">
<?php
if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==1){
echo "<h1>Add Officer Successfully</h3>";
}

if(isset($_REQUEST['msg'])&& $_REQUEST['msg']==2){
echo "<h1>Officer Not Added!!!!</h3>";
}
?>

<form action="addofficerprocess.php" method="post" enctype="multipart/form-data" name="addofficer">
<table align="center"  width="100%px" bgcolor="#000099">
<tr>
<td  align="right"><label><h2>Add Officer</h2></label></td>
</tr>

<tr>
<td align="center"><label for="id">id&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label></td><td><input type="text" name="id"placeholder="ID" tabindex="1" id="id" /> </td>
</tr>
<tr>
<td align="center"><label for="name">Name </label></td><td> <input type="text" name="name" placeholder="Name" tabindex="2" id="name" /></td>
</tr>
<tr>
<td align="center" ><label>Gender</label></td><td><input type="radio" name="gender" value="male" />male<input type="radio" name="gender" value="female"/>female<input type="radio" name="gender" value="shemale"  />shemale</td>
</tr>
<tr>
<td align="center"><label for="email">email</label></td><td><input  type="email" name="email" placeholder="enter email" tabindex="3"  id="email"/></td>
</tr>
<tr>
<td align="center"><label for="cellno">Ph.No</label></td><td><input  type="text" name="cellno"  id="cellno"placeholder="CELL NO" tabindex="4" required /></td>
</tr>
<tr>
<td align="center"><label for="address">address</label></td><td><input  type="text" name="address" id="address" placeholder="ENTER ADDRESS" tabindex="5" required /></td>
</tr>
<tr>
<td align="center"><label for="password">Pasword</label></td><td><input type="password" id="password" name="password" placeholder="password" tabindex="6" required /></td>
</tr>
<tr>
<td align="center"><label for="password2">RE_paswrd</label></td><td><input type="password"  name="password2" placeholder="password" tabindex="6"  id="password2" /></td>
</tr>
<tr>
<td align="center"><label for="area">Area</label></td><td><select style="margin-left:30px" name="area" id="area">
<option  value="" >select area</option>
<option  value="burewala" >burewala</option>
<option  value="vehari" >vehari</option>
<option  value="arifwala" >Arifwala</option>
<option   value="sahiwal" >Sahiwal</option>
<option  value="chichawatni" >Chichawatni</option>
</select></td>
</tr>
<tr>
<td align="center"><label style="margin-right:30px" for="picture">picture </label> </td><td><input type="file"  name="picture" tabindex="7" id="picture" /></td>
</tr>
<tr>
<td align="center"><label></label></td><td><input type="submit"  style="width:200px" value="add" name="add" tabindex="8"  /></td>
</tr>

</table>
</form>
<?php include("footer.php"); ?>
</div>

</body>
</html>