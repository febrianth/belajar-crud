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
$sql = "SELECT id, firstname, lastname FROM MyGuests" ;
$result = mysqli_query ($conn, $sql) ;
if (mysqli_num_rows($result) > 0) {
    // output data from each row
    while($row = mysqli_fetch_assoc($result)){
        echo "id : " . $row["id"]. " - Name: " . $row["firstname"]. " " .
        $row["lastname"]. "<br>";
    }
} else {
    echo "0 result" ; 
}
mysqli_close($conn) ;
?>