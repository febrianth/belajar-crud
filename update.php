<?php

// 3 variabel default
$firstname="Febrian";
$email="pekmbiee@gmail.com";
$lastname = "Hardiyanto";

/*
pengecekan variabel $_POST, apakah kosong atau tidak
jika tidak kosong, variabel $firstname dkk. diisi dengan nilai dari $_POST
jika kosong, hentikan script dan tampilkan keterangan
*/
if (!empty($_POST) && !empty($_POST["id"])){
    $id = $_POST["id"] ;
    $firstname=$_POST["firstname"];
    $email=$_POST["email"];
    $lastname=$_POST["lastname"];
} else {
    die ("data tidak ditemukan");
}

// masukkan script config.php
include "config.php";

//
$sql = "UPDATE myguests SET firstname=?,lastname=?,email=?  WHERE id=? ";

//variabel $stmt diisi fungsi mysqli_prepare dengan input parameter $conn dan $sql
$stmt = mysqli_prepare($conn,$sql);

/* 
- menjalankan fungsi  mysqli_stmt_bind_param untuk mengganti karakter ? menjadi nilai dari parameter yang diinputkan
parameter ke-1 adalah $stmt nilai dari fungsi mysqli_prepare
- parameter ke-2 (s,s,s) adalah tipe data dari masing - masing ? 
{ ref: https://www.php.net/manual/en/mysqli-stmt.bind-param.php}
- parameter ke-3 dst adalah nilai variabel untuk menggantikan ?
*/ 
mysqli_stmt_bind_param($stmt, "sssi", $firstname,$lastname,$email,$id);

/*
menjalankan mysqli_stmt_execute dengan input parameter $stmt
jika fungsi berhasil menjalankan query maka tampilkan pesan success
jika gagal maka tampilkan pesan error
*/
if (mysqli_stmt_execute($stmt)) {
    echo "new record created successfully" ;
} else {
    echo "error: " .$sql ."<br>" . mysqli_error($conn);
}

// menjalankan fungsi mysqli_close untuk menutup koneksi database
mysqli_close($conn) ;
?>