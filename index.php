<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$sql= "select * from public.book";
$data=pg_query($dbconn, $sql);
//session_start();
//$_SESSION['cookierole_id'] = 1;
//echo $_SESSION['cookierole_id'];
$data1=pg_query($dbconn, $sql);
$authorArray=array();

while($rowAuthorId=pg_fetch_assoc($data1)){
	$author_id=$rowAuthorId['author_id'];
	array_push($authorArray, $author_id);
	//echo $author_id;
	//echo $authorArray;
}

$authorfName=array();
$authorlName=array();

for($x=0; $x<count($authorArray);$x++){
	$authorArray[$x];
        $sqlAuthorName="select * from public.author where author_id=$authorArray[$x]";
	$data2=pg_query($dbconn,$sqlAuthorName);
	$login_check=pg_num_rows($data2);
	if($login_check > 0){
        while($rowAuthorName=pg_fetch_assoc($data2)){
	    array_push($authorfName, $rowAuthorName['fname']);
	    array_push($authorlName, $rowAuthorName['lname']);
	}
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
 .container{
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
<div class="container">     
    <h2>ReserveBook </h2>
    <div class="topcorner">
	<a href="login.php">Login</a>
        <a href="register.php">Register</a>
    </div>
    
</div>
<div class="padd">
</div>
    <div>
        <h2>Books that can be borrowed:</h2>
    	<table class="table table-bordered">
                <thead>
                    <tr>
			<th>Book_id</th>
                        <th>Title</th>
                        <th>Release year</th>
			<th>Genre</th>
			<th>Author name</th>
                    </tr>
                </thead>
                <tbody>
        		<?php 
			$brojac=0;
			while($row=pg_fetch_assoc($data)) {?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['book_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['title']); ?></td>                          
			    <td><?php echo htmlspecialchars($row['release_year']); ?></td>
			    <td><?php echo htmlspecialchars($row['genre']); ?></td>
			    <td><?php echo $authorfName[$brojac]."  ".$authorlName[$brojac];  ?></td>			    			    
                        </tr>
                   	<?php $brojac=$brojac+1;}?>
                </tbody>
         </table>
  
    </div>
</body>
</html>