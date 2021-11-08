<? php
session_start();
 //connect to db
 $DATABASE_HOST = 'db.luddy.indiana.edu';
 $DATABASE_USER = 'i494f21_ttormohl';
 $DATABASE_PASS = 'my+sql=i494f21_ttormohl';
 $DATABASE_NAME = 'i494f21_ttormohl';
 
 //test connection_aborted
 $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
 if(mysqli_connect_errno()) {
	 exit('Failed to connect: ' .mysqli_connect_error());
 }
 
 //tables
 
 $sql = "CREATE TABLE users (
	id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	username VARCHAR(50) NOT NULL UNIQUE,
	password VARCHAR(50) NOT NULL,
	)";

//inserting into tables

$sql "INSERT INTO users (id, username, password)
VALUES ('0123', 'tyler0', 'password0)";

$sql "INSERT INTO users (id, username, password)
VALUES ('4567', 'tyler1', 'password1)";

if ( !isset($_POST['username'], $_POST['password']) ) {
	exit('Failed to fill both fields');
	
if ($stmt = $con->prepare('SELECT username, password, FROM users WHERE username =?')) {
	$stmt->bindparam('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();

if($stmt-> num_rows > 0) {
	$stmt->bind_result($username, $password);
	$stmt->fetch();
	
	if (password_verify($_POST['password'], $password)) {
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $_POST['username'];
		$_SESSION['id'] = $username;
		echo 'My favorite food is almost any type of Mexican food.';
	} else {
		echo 'Incorrect username or password.';
	}
} else {
	echo 'Incorrect username or password.';
}
	$stmt->close();
}
?>
		
	

	
	 