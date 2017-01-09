<?phervername = "localhost";
$username = "dineshpartan";
$password = "!23456789o";
$db='consume_db';

// Create connection
$con = mysqli_connect($servername, $username, $password,$db);

// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}

?>

