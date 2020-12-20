<?php
session_start();
include('header.php');

?>
<style>
body {
    background-image: url(images/1.jpg);
}
</style>
<div class="container-fluid">
<div class="row m-5">

<!--login form-->
<div class="card col-4 ml-2" style="max-width: 50%;margin-left: 30rem!important">
<center><i class="fas fa-users fa-5x" ></i></center><b>Librarian<b>
<hr>
<center><form action="librarianlogin.php" method="post" class="p-3">
  <div class="form-group">
    <label for="exampleInputEmail1">Email Address</label>
    <input type="email" class="form-control" name="email" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control"  name="password" id="exampleInputPassword1">
  </div>
  <div class="form-group">
<!--<label>Verification code : </label>-->
<input type="text" class="form-control1"  name="vercode" maxlength="5" autocomplete="off" required  style="height:25px;" placeholder="Enter Code"/>&nbsp;<img src="captcha.php">
</div> 
  <!--<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">remember me</label>
  </div>-->
  <button type="submit" name="submit" class="btn btn-primary">LOGIN</button>
  <input type="hidden" name="_token" value="<?=$_SESSION ['_token']; ?>">
  <!-- Code for check box -->

 <div style="font-size: 12px;">
  <form action="#" onsubmit="if(document.getElementById('agree').checked) { return true; } else { alert('Please indicate that you have read and agree to the Terms and Conditions and Privacy Policy'); return false; }">
    <input type="checkbox" required name="checkbox" value="check" id="agree" /> I agree to the Terms and Conditions and Privacy Policy
    
</form>
</div>
  <div><br>
  <h6>
  <a href="index.php">Student login?</a><h6>
  </div>
</form></center>
<?php
include('token.php');
if(isset($_POST['submit']))
	{
		//code for captach verification
		if ($_POST["vercode"] != $_SESSION["vercode"] OR $_SESSION["vercode"]=='')  {
        echo "<script>alert('Incorrect verification code');</script>" ;
    }
	else{
		include_once('connection.php');
    $email = $_POST['email'];
		//$password = md5($_POST['password']);
		$password = mysqli_real_escape_string($conn,$_POST['password']);
		$sql=mysqli_query($conn,"select * from librarianinfo where email='$email' && password='$password'");
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
           window.location="librarian/librarian.php";
           </script>     
    <?php
	}}}
    ?>
</div>
</div>
</div>
