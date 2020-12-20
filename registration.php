<?php
include('header.php')
?>
  <!--content-->
  <div class="data p-4">
	<h3>REGISTRATION FORM</h3>
	<!--<form action="#" method="post" name="sform" enctype="multipart/form-data" onsubmit="return validateform()">-->
	<form action="#" method="post" name="sform" enctype="multipart/form-data" onsubmit="validate()">
  <div class="row pt-2">
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="firstname" id="firstname" placeholder="First name" required>
      <div class="error text-warning" id="firstnameErr"></div>
    </div>
	<div class="form-group col-md-4">
      <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Middle  name" required>
    </div>
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name" required>
      <div class="error text-warning" id="lastnameErr"></div>
    </div>
    <div class="form-group col-md-4">
      <input type="text" class="form-control" name="gnib" id="gnib" placeholder="GNIB" required>
      <div class="error text-warning" id="gnibErr"></div>
    </div> 
	<div class="form-group col-md-4">
      <input type="number" class="form-control" name="phone" id="phone" placeholder="Phone" required>
      <div class="error text-warning" id="phoneErr"></div>
    </div>
    <div class="form-group col-md-4">
      <input type="text" class="form-control "  name="birth" id="inputDate" onfocus="(this.type='date')" min="1979-12-31" max="2000-01-02" placeholder="DOB" required>
    </div>
		 <div class="form-group col-md-4">
	Gender:
  <input type="radio" name="gender" value="Male" checked/> Male
  <input type="radio" name="gender" value="Female"/> Female
	<input type="radio" name="gender" value="others"/> Others
	</div>
    
    <div class="form-group col-md-4">
      <input type="text" class="form-control " name="city" id="city" placeholder="City" required>
    	<div class="error text-warning" id="cityErr"></div>
    </div>
    
  <div class="form-group col-md-12">
       <input type="text" class="form-control" id="inputAddress" name="paddress" placeholder="Permanent address" required>
  </div>
  <div class="form-group col-md-12">
    <input type="text" class="form-control" id="inputAddress2" name="taddress" placeholder="Temporary address" required>
  </div>
  <div class="form-group col-md-4">
      <input type="email" class="form-control" name="email" id="inputEmail4" placeholder="Email" required>
    	<div class="error text-warning" id="emailErr"></div>
    </div>
    <div class="form-group col-md-4">
      <input type="password" class="form-control " name="password" id="password" placeholder="Password" required>
    </div>
    <div class="form-group col-md-4">
      <input type="password" class="form-control " name="password1" id="password1" placeholder="Confirm password" required>
      <div class="error text-warning" id="passwordErr"></div>
    </div>
	</div>
  <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
  <button type="reset" class="btn btn-primary">Reset</button>
</form>
</div>

<script>
function validate()
{
  var phoneNumber = document.getElementById('phone').value;
  var phoneRGEX = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
  var phoneResult = phoneRGEX.test(phoneNumber);
  if(phoneResult == false)
  {
    alert('Please enter a valid phone number');
    return false;
  }

  if(postalResult == false)
  {
    alert('Please enter a valid postal number');
    return false;
  }

  return true;
}
</script>

<!-- validations-->
<!--<script>
  	// Defining a function to display error message
function printError(elemId, hintMsg) {
    document.getElementById(elemId).innerHTML = hintMsg;
   }   
// Defining a function to validate form 
function validateform() {
    // Retrieving the values of form elements 
    var firstname = document.sform.firstname.value;
	var lastname = document.sform.lastname.value;
	var gnib = document.sform.gnib.value;
	var password1 = document.sform.password.value;
	var password2 = document.sform.password1.value;
	var phone = document.sform.phone.value;
	//var blood = document.sform.blood.value;
    var city = document.sform.city.value;
   // var state = document.sform.state.value;
	//var pin = document.sform.pin.value;
    
	// Defining error variables with a default value
    var firstnameErr = lastnameErr = gnibErr  = passwordErr = phoneErr = cityErr = true;    
    // Validate firstname
    if(firstname == "") {
        printError("firstnameErr", "Please enter your firstname");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(firstname) === false) {
            printError("firstnameErr", "Please enter a valid firstname");
        } else {
            printError("firstnameErr", "");
            firstnameErr = false;
        }
    }
	// Validate lastname
    if(lastname == "") {
        printError("lastnameErr", "Please enter your lastname");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(lastname) === false) {
            printError("lastnameErr", "Please enter a valid lastname");
        } else {
            printError("lastnameErr", "");
            lastnameErr = false;
        }
    }
	// Validate gnib
    if(gnib == "") {
        printError("gnibErr", "Please enter your gnib");
    }else {
        var regex = /^[1-9]\d{11}$/;
        if(regex.test(gnib) === false) {
            printError("gnibErr", "Please enter a valid 12 digit gnib number");
        } else{
            printError("gnibErr", "");
            phoneErr = false;
        }
    }
	// validate password
	if(password1==password2){
            printError("passwordErr", "");
            passwordErr = false;
	
	} else {
        printError("passwordErr", "Please enter same password");
        }
    
    // Validate phone number
    if(phone == "") {
        printError("phoneErr", "Please enter your phone number");
    } else {
        var regex = /^[1-9]\d{9}$/;
        if(regex.test(phone) === false) {
            printError("phoneErr", "Please enter a valid 10 digit mobile number");
        } else{
            printError("phoneErr", "");
            phoneErr = false;
        }
    }
	
	// Validate city
    if(city == "") {
        printError("cityErr", "Please enter your city");
    } else {
        var regex = /^[a-zA-Z\s]+$/;                
        if(regex.test(city) === false) {
            printError("cityErr", "Please enter a valid city");
        } else {
            printError("cityErr", "");
            cityErr = false;
        }
    }
        
    // Prevent the form from being submitted if there are any errors
    if((firstnameErr || lastnameErr || gnibErr || passwordErr || phoneErr || cityErr ) == true) {
       return false;
    } else {
		alert("succesfull");
    }
}
</script>-->
          <!-- php code-->

<?php
function reg()
{
    include_once('connection.php');
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gnib=$_POST['gnib'];
    $phone = $_POST['phone'];
    $birth = $_POST['birth'];
   // $blood = $_POST['blood'];
    $gender = $_POST['gender'];
   // $nationality = $_POST['nationality'];
    $city =$_POST['city'];
   // $state = $_POST['state'];
   // $pin = $_POST['pin'];
    $paddress = $_POST['paddress'];
    $taddress = $_POST['taddress'];
    $email = $_POST['email'];
	
	// Password hashing alogithim md5//
    $password = md5($_POST['password']);
    
	
	//$files=$_FILES['file'];
    //$filename=$files['name'];
    //$fileerror=$files['error'];
    //$filetmp=$files['tmp_name'];
    //$dst='../photo/'.$filename;
   // move_uploaded_file($filetmp,$dst);
	//$sql="insert into userinfo (firstname,middlename,lastname,gnib,phone,birth,blood,gender,nationality,city,state,pin,paddress,taddress,email,password,photo,status) values('$firstname','$middlename','$lastname','$gnib','$phone','$birth','$blood','$gender','$nationality','$city','$state','$pin','$paddress','$taddress','$email','$password','$dst','no')";
	$sql="insert into userinfo (firstname,middlename,lastname,gnib,phone,birth,gender,city,paddress,taddress,email,password,status) values('$firstname','$middlename','$lastname','$gnib','$phone','$birth','$gender','$city','$paddress','$taddress','$email','$password','no')";
if(mysqli_query($conn, $sql)){  
 echo "Record inserted successfully";  
}else{  
echo "Could not insert record: ".mysqli_error($conn);  
}
}
if(isset($_POST['submit']))
{
	reg();
  echo 'succesfully inserted';
}
?>