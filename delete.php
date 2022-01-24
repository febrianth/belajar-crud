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

// sql to delete a record

$sql = "DELETE FROM MyGuests WHERE id=3" ;
if (mysqli_query ($conn, $sql )) {
    echo "record deleted successfully" ;
} else {
    echo "error deleting record: " . mysqli_error($conn); 
}
mysqli_close($conn);
?>