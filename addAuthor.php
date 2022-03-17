<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

session_start();
  $email=$_SESSION['cookieemail'];
  $role_id=$_SESSION['cookierole_id'];

if(isset($_POST['submit'])&&!empty($_POST['submit'])){

    $sql = "insert into public.author(fname,lname,date_of_birth,gender)values('".$_POST['fname']."','".$_POST['lname']."','".$_POST['date']."','".$_POST['gender']."')";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
            echo "Data saved Successfully";
            header("Location: http://localhost/allAuthors.php");
    }else{
        
            echo "Something Went Wrong";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('header.php'); ?>
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

    

    <input type="submit" name="submit" class="btn btn-primary" value="Submit">

   
  </form>
</div>
</body>
</html>