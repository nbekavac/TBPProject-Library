<?php
 
?>
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
  .lista{
	position:absolute;
	right:0;	
	
  }
  li {
	display:inline;
	padding: 10px;
  }
  .padd{
        padding:50px;   
   }
</style>
<div class="container" id=container>     
    <h2>ReserveBook </h2>
    <div class="topcorner"><a href="login.php">Odjava</a></div>
    <div class="lista">
 	<ul>
		<?php if($role_id==1): ?>
  		<li id=allUsers><a href="allUsers.php">Users </a></li>
  		<li id=allBooks><a href="allBooks.php">Books  </a></li>
		<li><a href="allLoans.php">Reservations  </a></li>
  		<li><a href="addBook.php">Add new book  </a></li>
		<li><a href="allEmployees.php">Employees  </a></li>
		<li><a href="allAuthors.php">Authors </a></li>
                <?php elseif($role_id==2): ?>
   	 	<li id=allUsers><a href="allUsers.php">Users </a></li>
  		<li id=allBooks><a href="allBooks.php">Books  </a></li>
		<li><a href="allLoans.php">Reservations  </a></li>
		<?php else: ?>
		<li id=allBooks><a href="allBooks.php">Books  </a></li>
		<li id=allBooks><a href="myReservations.php">My reservations </a></li>
		<li id=allBooks><a href="reserveBook.php">Reserve book </a></li>
		<?php endif; ?>
		
       </ul>
    </div>
<div class="padd">
</div>