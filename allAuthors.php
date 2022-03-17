<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$sql= "select author.author_id,author.fname,author.lname,author.date_of_birth,author.gender from author left join users on author.author_id=users.author_id WHERE users.author_id IS NULL";
$data=pg_query($dbconn, $sql);
session_start();
$email=$_SESSION['cookieemail'];
$role_id=$_SESSION['cookierole_id'];

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
        header("Location: http://localhost/addAuthor.php");
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <?php include('header.php'); ?>
<style type="text/css">
   .addAuthor{
	padding-top:30px;
	padding-right:1700px;	
   }
</style>
      
<div class="form-group">
	  <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Author id</th>
                        <th>First name</th>
                        <th>Last name</th>
			<th>Date of birth</th>
			<th>Gender</th>
                    </tr>
                </thead>
                <tbody>
        		<?php while($row=pg_fetch_assoc($data)) {;?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['author_id']); ?></td>
                            <td><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lname']); ?></td>
			    <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>
			    <td><?php echo htmlspecialchars($row['gender']); ?></td>		    
                        </tr>
                   	<?php }?>
                </tbody>
            </table>
</div>

<div class="addAuthor">
	 <form method="post"> 
		<input type="submit" name="submit" class="btn btn-primary" value="Add author">
	 </form>
</div>



</div>
</body>
</html>