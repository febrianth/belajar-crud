<?php
$servername = "localhost" ;
$username = "root" ;
$password = "" ;
$dbname = "myDB" ;

//create connection

$conn = mysqli_connect($servername, $username, $password, $dbname) ;

//check connection

if (!$conn) {
    die ("connection failed: " . mysqli_connect_error());
}

//sql to create table

$sql = "CREATE TABLE MyGuests(
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
req_date TIMESTAMP
)";
if (mysqli_query($conn, $sql)) {
    echo "Table MyGuests created successfully";
} else {
    echo "error creating table: " . mysqli_error ($conn) ;
}
mysqli_close($conn)
?>