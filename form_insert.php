<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>form insert</title>
</head>

<body>
    <form action="insert.php" method="post" enctype="multipart/form-data"> 
        Name Depan:<input type="text"  name="firstname"><br><br>
        E-mail:<input type="text" name="email"><br><br>
        Nama Belakang:<input type="text" name="lastname"><br><br>
        Upload Foto: <input type="file" name="foto" /><br><br>
        <input type="submit">
    </form>
</body>

</html>