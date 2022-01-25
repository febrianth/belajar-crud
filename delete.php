<?php
include "config.php";
// sql to delete a record

$sql = "DELETE FROM MyGuests WHERE id=1" ;
if (mysqli_query ($conn, $sql )) {
    echo "record deleted successfully" ;
} else {
    echo "error deleting record: " . mysqli_error($conn); 
}
mysqli_close($conn);
?>