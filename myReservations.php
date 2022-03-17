<?php
session_start();
$email=$_SESSION['cookieemail'];
$role_id=$_SESSION['cookierole_id'];

$host = "localhost";
$port = "5432";
$dbname = "postgres";
$user = "postgres";
$password = "nikola96"; 
$connection_string = "host={$host} port={$port} dbname={$dbname} user={$user} password={$password} ";
$dbconn = pg_connect($connection_string);

$sqlGetId="select * from users where users.email='".$email."'";
$dataGetId=pg_query($dbconn, $sqlGetId);
while($row=pg_fetch_assoc($dataGetId))
{
     $userId=$row['user_id'];
}

$sql= "select distinct user_book.user_book_id, user_book.user_id, user_book.book_id, user_book.date_borrowed,user_book.date_due from public.user_book join public.users on user_book.user_id='".$userId."'";
$data=pg_query($dbconn, $sql);


$data1=pg_query($dbconn, $sql);
$bookArray=array();

while($rowBookId=pg_fetch_assoc($data1)){
	$book_id=$rowBookId['book_id'];
	array_push($bookArray, $book_id);
	//echo $book_id;
	//echo $bookArray[1];
}

$data2=pg_query($dbconn, $sql);
$userArray=array();

while($userBookId=pg_fetch_assoc($data2)){
	$user_id=$userBookId['user_id'];
	array_push($userArray, $user_id);
	//echo $user_id;
	//echo $userArray;
}

$userfName=array();
$userlName=array();

for($x=0; $x<count($userArray);$x++){
	//$userArray[$x];
        $sqlUserName="select * from public.users where user_id=$userArray[$x]";
	$data3=pg_query($dbconn,$sqlUserName);
	$login_check=pg_num_rows($data3);
	if($login_check > 0){
        while($rowUserName=pg_fetch_assoc($data3)){
	    array_push($userfName, $rowUserName['fname']);
	    array_push($userlName, $rowUserName['lname']);
	}
	}
}

$bookTitle = array();
for($x=0; $x<count($bookArray);$x++){
	//$userArray[$x];
        $sqlBookName="select * from public.book where book_id=$bookArray[$x]";
	$data4=pg_query($dbconn,$sqlBookName);
	$login_check=pg_num_rows($data4);
	if($login_check > 0){
        while($rowBookName=pg_fetch_assoc($data4)){
	    array_push($bookTitle, $rowBookName['title']);
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
                        <th>Reservation_id</th>
                        <th>Name and surname</th>
                        <th>Book title</th>
			<th>Date_borrowed</th>
			<th>Date_due</th>			
                    </tr>
                </thead>
                <tbody>
        		<?php
				$brojac=0;
				 while($row=pg_fetch_assoc($data)) {?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['user_book_id']); ?></td>
                            <td><?php echo $userfName[$brojac]."  ".$userlName[$brojac];; ?></td>
                            <td><?php echo $bookTitle[$brojac]; ?></td>
			    <td><?php echo htmlspecialchars($row['date_borrowed']); ?></td>
			    <td><?php echo htmlspecialchars($row['date_due']); ?></td>			   			    
                        </tr>
                   	<?php $brojac=$brojac+1;}?>
                </tbody>
            </table>
    </div>
    
  
</div>
</body>
</html>