<?php
include "config.php";
$sql = "UPDATE myguests SET lastname = 'Hardiyanto' WHERE id = 7 " ;
if (mysqli_query( $conn, $sql )) {
    echo "record updated successfully" ;
} else {
    echo "error updating record" . mysqli_error ($conn);
}
mysqli_close($conn) ;
?>