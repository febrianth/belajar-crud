<?php
include "config.php";
$sql = "INSERT INTO MyGuests ( firstname, lastname, email )
VALUES ( 'Febrian', 'Hardiyanto', 'pekmbiee14@gmail.com' )" ;
if (mysqli_query( $conn, $sql )) {
    echo "new record created successfully" ;
} else {
    echo "error: " .$sql ."<br>" . $mysqli_error($conn);
}
mysqli_close($conn);
?>