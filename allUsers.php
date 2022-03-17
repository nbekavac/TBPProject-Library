<?php
$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$sql= "select * from public.users where role_id=3";
$data=pg_query($dbconn, $sql);

?>


<!DOCTYPE html>
<?php
  session_start();
  $email=$_SESSION['cookieemail'];
  $role_id=$_SESSION['cookierole_id'];
?>
<html lang="en">
 <?php include('header.php'); ?>
      	  <table class="table table-bordered">
                <thead>
                    <tr>
			<th>User ID</th>
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
			    <td><?php echo htmlspecialchars($row['user_id']); ?></td>
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
    
  
</div>
</body>
</html>