<?php
include "config.php";
if (!empty($_GET) && !empty($_GET["id"])){
    $id = $_GET["id"] ;
} else {
    $id = 0;
}
$sql = "UPDATE myguests SET lastname = 'Hardiyanto' WHERE id=".$id;
if (mysqli_query( $conn, $sql )) {
    echo "record updated successfully" ;
} else {
    echo "error updating record" . mysqli_error ($conn);
}
mysqli_close($conn) ;
?>