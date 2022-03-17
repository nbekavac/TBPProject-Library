<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$sql= "select * from public.users where role_id=2";
$data=pg_query($dbconn, $sql);
session_start();
$email=$_SESSION['cookieemail'];
$role_id=$_SESSION['cookierole_id'];

if(isset($_POST['submit'])&&!empty($_POST['submit'])){
        header("Location: http://localhost/addEmployee.php");
}

?>


<!DOCTYPE html>
<html lang="en">


<head>
  <?php include('header.php'); ?>
<style type="text/css">
   .addEmployee{
	padding-top:30px;
	padding-right:1700px;	
   }
</style>
      
    <div class="form-group">
	  <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>First name</th>
                        <th>Last name</th>
                        <th>Username</th>
			<th>Email</th>
			<th>Gender</th>
			<th>Date of birth</th>
                    </tr>
                </thead>
                <tbody>
        		<?php while($row=pg_fetch_assoc($data)) {?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['fname']); ?></td>
                            <td><?php echo htmlspecialchars($row['lname']); ?></td>
                            <td><?php echo htmlspecialchars($row['username']); ?></td>
			    <td><?php echo htmlspecialchars($row['email']); ?></td>
			    <td><?php echo htmlspecialchars($row['gender']); ?></td>
			    <td><?php echo htmlspecialchars($row['date_of_birth']); ?></td>			    
                        </tr>
                   	<?php }?>
                </tbody>
            </table>
    </div>
    <div class="addEmployee">
	 <form method="post"> 
		<input type="submit" name="submit" class="btn btn-primary" value="Add employee">
	 </form>
    </div>  
</div>
</body>
</html>