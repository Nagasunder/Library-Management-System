<?php
session_start();
include('header.php');

?>


<php?
	header("Content-Security-Policy: default-src 'self'");
	header('X-FRAME-OPTIONS: SAMEORIGIN');
?>

<div class="container-fluid">
<div class="row m-5">
<div class="col-7 mx-4">
<style>
body {
    background-image: url(images/1.jpg);
}
</style>
<!--login form-->

<div class="card col-4 ml-2 login-card" style="max-width: 25rem;margin-left: 30rem!important">
<center><i class="fas fa-users fa-5x"></i></center>
<b style=" margin-bottom: -1rem;"/>Student Login </b>
<hr>
<form  method="post" class="p-3">
  <div class="form-group">
   <center> <label for="exampleInputEmail1" style="  font-weight: bolder;">Email Address</label></center>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp" required>
   
  </div>
  <div class="form-group">
    <center><label for="exampleInputPassword1" style="  font-weight: bolder;">Password</label></center>
    <input type="password" class="form-control"  name="password" id="exampleInputPassword1" required>
  </div>
  
<div class="form-group">
<!--<label>Verification code : </label>-->
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" placeholder="Enter Code"/>&nbsp;<img src="captcha.php">
</div> 
 <button type="submit" name="submit" class="btn btn-primary" style="width: -webkit-fill-available;width: -moz-available;width: 100%;">LOGIN</button>
<!-- Code for check box -->

 <div style="font-size: 12px;">
  <form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
    <input type="checkbox" required name="checkbox" value="check" id="agree" /> I agree to the Terms and Conditions and Privacy Policy
    
</form>
</div>
 
 

  <div>
 
  <br/>
  <h6 class="pt-2" >
  <a href="#" onclick="alert('Contact Librarian');">Forgot Password?</a>
  <a href="librarianlogin.php" style="display: inline-block;    overflow: hidden;    margin: -3px auto;    position: relative;    margin-top: -3rem!important;    margin-left: 2rem!important;">Librarian?</a><br> <br>
  <!--<a onclick='alert("Please contact to librarian")'  href="">forgetten password?</a><br>-->
  <a href=registration.php style="display: inline-block;    overflow: hidden;    margin: 33px auto;    position: relative;    margin-top: -10rem!important;    margin-left: 18rem!important;">Register?</a></h6>
  </div>
</form>
<?php
if(isset($_POST['submit']))
	{
		//code for captach verification
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    }
	else{
		include_once('connection.php');
		$email = $_POST['email'];
		
		//Code to prevent from SQL injection
		
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		
		//$email = stripslashes($email);
		//$email = mysqli_real_escape_string($email);
		//$password = stripslashes($password);
		//$password = mysqli_real_escape_string($password);
		$sql=mysqli_query($conn,"select * from userinfo where email='$email' && password='$password' && status='yes'");
        $count=0;
        $count=mysqli_num_rows($sql);
	
        if($count==0)
		{?>
		<p style="color:white; text-align:center; background-color:red;margin:auto; padding:5px;border-radius:5px;">Invalid user</p>
	<?php	}
		else{
    $_SESSION["email"]=$_POST["email"];
   ?>
     <script>
     window.location="users/profile.php";
     </script>     
     <?php
	}}}
   
else{} ?>

</div></div>
</div>
</div>
</div>


 