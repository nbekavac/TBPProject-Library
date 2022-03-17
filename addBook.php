<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
    
    $sql = "insert into public.book(author_id,title,release_year,genre)values('".$_POST['author_id']."','".$_POST['title']."','".$_POST['releaseyear']."','".$_POST['genre']."')";
    $ret = pg_query($dbconn, $sql);
    if($ret){
        
            echo "Data saved Successfully";
	    header("Location: http://localhost/allBooks.php");
    }else{
        
            echo "Something Went Wrong";
    }
}
session_start();
$email=$_SESSION['cookieemail'];
$role_id=$_SESSION['cookierole_id'];
?>
<!DOCTYPE html>
<html lang="en">
<?php include('header.php'); ?>

<div class="container">	
  <form method="post">
    
    <div class="form-group">
      <label for="title">Title of the book:</label>
      <input type="text" class="form-control" id="title" placeholder="Title" name="title" requuired>
    </div>
    
    <div class="form-group">
      <label for="releaseyear">Release year:</label>
      <input type="number" class="form-control" id="releaseyear" placeholder="Release year" name="releaseyear" requuired>
    </div>

    <div class="form-group">
      <label for="genre">Genre:</label>
      <input type="text" class="form-control" id="genre" placeholder="Genre" name="genre" requuired>
    </div>

    <div class="form-group">
      <label for="author_id">Author id:</label>
      <input type="number" class="form-control" id="author_id" placeholder="Author id" name="author_id" requuired>
    </div>

   

    <input type="submit" name="submit" class="btn btn-primary" value="Submit">
  </form>
</div>
</body>
</html>