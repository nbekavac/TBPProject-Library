<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    $role=$_POST['role'];
    $user_status=$_POST['userstatus'];
    $city=$_POST['city'];
    $streetname=$_POST['streetname'];
    $streetnumber=$_POST['number'];
    $postalcode=$_POST['postalcode'];
    $address=array($city,$streetname,$streetnumber,$postalcode);
    $address='{'.implode(",",$address).'}';

    $sql = "insert into public.users(fname,lname,date_of_birth,gender,role_id,username,password,email,user_status)values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['date']."','".$_POST['gender']."','".$_POST['role']."','".$_POST['username']."','".$_POST['password']."','".$_POST['email']."','".$_POST['userstatus']."')";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
            echo "Data saved Successfully";
            header("Location: http://localhost/login.php");
    }else{
        
            echo "Something Went Wrong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Aplikacija za upravljanje korisničkim racunima</title>
  <meta name="keywords" content="PHP,PostgreSQL,Insert,Login">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style type="text/css">
 #container{
   text-align:center;
   position:relative;
   width:1900px;
   height:100px;
   background-color:#FFFAF0;
  }
 .topcorner{
   position:absolute;
   top:0;
   right:0;
  }
  
  .padd{
	padding:15px;
  }
  a{
   padding:5px;
  }

</style>
<div class="container" id="container">     
    <h2>ReserveBook </h2>
    <div class="topcorner">
	<a href="index.php">Pocetna</a>
	<a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
    
</div>
<div class="padd">
</div>
<div class="container">
  <form method="post">
    
    <div class="form-group">
      <label for="fname">First name:</label>
      <input type="text" class="form-control" id="fname" placeholder="First name" name="fname" requuired>
    </div>
    
    <div class="form-group">
      <label for="lname">Last name:</label>
      <input type="text" class="form-control" id="lname" placeholder="Last name" name="lname" requuired>
    </div>

    <div class="form-group">
      <label for="date">Date:</label>
      <input type="date" class="form-control" id="date" placeholder="Date" name="date" requuired>
    </div>

    <div class="form-group">
      <label for="gender">Gender:</label>
      <input type="text" class="form-control" id="gender" placeholder="M/F" name="gender" requuired>
    </div>

    <div class="form-group">
      <label for="username">Username:</label>
      <input type="text" class="form-control" id="username" placeholder="Username" name="username" requuired>
    </div>
    
    <div class="form-group">
      <label for="password">Password:</label>
      <input type="password" class="form-control" id="password" placeholder="Password" name="password" requuired>
    </div>

    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Email" name="email">
    </div>
    
    <div class="form-group">
      <label for="city">City:</label>
      <input type="text" class="form-control"  id="city" placeholder="City" name="city">
    </div>
    
    <div class="form-group">
      <label for="streetname">Street name:</label>
      <input type="text" class="form-control" id="streetname" placeholder="Street name" name="streetname">
    </div>

   <div class="form-group">
      <label for="streetnumber">Street number:</label>
      <input type="number" class="form-control" id="number" placeholder="Street number" name="number">
    </div> 

    <div class="form-group">
      <label for="postalcode">Postal code:</label>
      <input type="number" class="form-control" id="postalcode" placeholder="Postal code" name="postalcode">
    </div> 

    <input type="submit" name="submit" class="btn btn-primary" value="Submit">

    <div class="form-group" style="visibility:hidden";>
      <input type="number" class="form-control" id="role" name="role" visibility="hidden" value=3>
    </div> 

    <div class="form-group" style="visibility:hidden";>
      <input type="text" class="form-control" id="userstatus" name="userstatus" visibility="hidden" value="nije na vezi">
    </div> 

  </form>
</div>
</body>
</html>