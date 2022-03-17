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
$data1=pg_query($dbconn, $sql);
session_start();
$email=$_SESSION['cookieemail'];
$role_id=$_SESSION['cookierole_id'];

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
<?php include('header.php'); ?>
      
    <div class="form-group">
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
    
  
</div>
</body>
</html>