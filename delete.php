<?php
include "config.php";
include "config.php";
if (!empty($_GET) && !empty($_GET["id"])){
    $id = $_GET["id"];
} else {
    $id = 0;
}

// sql to delete a record

$sql = "DELETE FROM MyGuests WHERE id=".$id;
if (mysqli_query ($conn, $sql )) {
    echo "record deleted successfully" ;
} else {
    echo "error deleting record: " . mysqli_error($conn); 
}
mysqli_close($conn);
?>