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
$sql = "UPDATE myguests SET lastname = 'Hardiyanto' WHERE id = 7 " ;
if (mysqli_query( $conn, $sql )) {
    echo "record updated successfully" ;
} else {
    echo "error updating record" . mysqli_error ($conn);
}
mysqli_close($conn) ;
?>