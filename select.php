<?php
include "config.php";
if (!empty($_GET) && !empty($_GET["id"])){
    $id = $_GET["id"];
} else {
    $id = 0;
}
$sql = "SELECT id, firstname, lastname FROM MyGuests WHERE id=".$id;
$result = mysqli_query ($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data from each row
    while($row = mysqli_fetch_assoc($result)){
        echo "id : " . $row["id"]. " - Name: " . $row["firstname"]. " " .
        $row["lastname"]. "<br>";
    }
} else {
    echo "0 result";
}
mysqli_close($conn);
?>