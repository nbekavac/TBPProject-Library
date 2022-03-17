<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

//if (session_status() != PHP_SESSION_ACTIVE) {
  //echo 'Session is not active';
//}
//else
//{
  //header("Location: http://localhost/administrator.php");
//}

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    $email=$_POST['email'];
    $userpassword = $_POST['pwd'];
    $role_id=0;
    $sql ="select * from public.users where email = '".pg_escape_string($_POST['email'])."' and password ='".$userpassword."'";
    $data = pg_query($dbconn,$sql); 
    session_start();
    $_SESSION['cookieemail'] = $email;
    $login_check = pg_num_rows($data);
    if($login_check > 0){ 
        
        echo "Login Successfully";
	while($row=pg_fetch_assoc($data)){
	   $role_id=$row['role_id'];
	}
	if($role_id==1){		
	   header("Location: http://localhost/allBooks.php");
	}
	if($role_id==2){
	   header("Location: http://localhost/allBooks.php");
	}
	if($role_id==3){
	   header("Location: http://localhost/allBooks.php");
	}
	    
    }else{
        
        echo "Invalid Details";
    }
    $_SESSION['cookierole_id'] = $role_id;
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
   width:1920px;
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
      <label for="email">Email:</label>
      <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
    </div>   
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
    </div>
     
    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
</body>
</html>