<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update</title>
</head>
<?php
include "../config.php";
$id = "";
$firstname = "";
$lastname = "";
$email = "";
if (!empty($_GET) && !empty($_GET["id"])){
    $id = $_GET["id"];
    $sql = "SELECT id, firstname, lastname, email FROM MyGuests WHERE id=?";
    $stmt = mysqli_prepare($conn,$sql);
    mysqli_stmt_bind_param($stmt, "d", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    if (mysqli_num_rows($result) > 0) {
        // output data from each row
        while ($row = mysqli_fetch_array($result)) {
            //print_r($row); die("");
            $id = $row["id"];
            $firstname = $row["firstname"];
            $lastname = $row["lastname"];
            $email = $row["email"];
        }
    } else {
        die("0 result");
    }
}
?>
<body>
    <form action="../update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        Nama Depan : <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br><br>
        E-mail : <input type="text" name="email" value="<?php echo $email; ?>"><br><br>
        Nama Belakang : <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br><br>
        <input type="submit">
    </form>
</body>
</html>