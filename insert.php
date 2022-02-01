<?php
//3variable default
$firsname="mewaga";
$email="megawagarenggaling@gmail.com";
$lastname="mewagarenggaling";

/*
pengecekan variabel $_post, apakah kosong atau tidak
jika tidak kosong variabel $firstname dkk diisi dengan nilai dari $_post
jika kosong, hentikan script dan tampilkan keterangan 
*/
if (!empty($_POST)){
    $firstname=$_POST["firstname"];
    $email=$_POST["email"];
    $lastname=$_POST["lastname"];
} else {
    die("input harus lewat form");
}

// masukan script config.php
include "config.php";

// variabel $sql diisi query insert 
$sql = "INSERT INTO myguests (firstname, lastname, email)
VALUES (?,?,?)";

/* variabel $stmt diisi fungsi mysqli_prepare dengan input parameter $conn dan $sql
*/
$stmt = mysqli_prepare($conn,$sql);

/* menjalanklan fungsi mysqli_stmt_bind_param untuk mengganti karakter ? menjadi nilai dari parameter yang diinputkan
-parameter ke1 adalah $stmt nilai dari fungsi mysqli_prepare
-parameter ke2 adalah (sss) adalah tipe data dari masing-masing ?
( refrensi :https://www.php.net/manual/en/mysqli-stmt.bind-param.php)
-parameter ke3 dst adalah nilai variabel untuk menggantikan ?
*/ 
//print_r($conn);
//print_r($stmt);
//die ("$firstname, $lastname, $email");
mysqli_stmt_bind_param($stmt, "sss" , $firstname,$lastname,$email);
/*menjalankan mysqli_stmt_execute dengan input parameter $stmt 
jika fungi berhasil menjalankan query maka tampilan pesan succes
jika gagal akan menampilkan pesan failed
*/
if (mysqli_stmt_execute($stmt)) {
    echo "New record created successfully<br/>";
    if (!empty($_FILES)){
        // validasi file upload harus lebih kecil dari 5MB
        if($_FILES['foto']['size'] <= 5000000){
            $ekstensiYangDibolehkan = [
                'image/png',
                'image/jpg',
                'image/jpeg',
                'image/webp'
            ];
            $type = mime_content_type($_FILES['foto']['tmp_name']);
            if (in_array($type, $ekstensiYangDibolehkan)) {
                // ambil data file
                $namaFile = 'foto_'.time().'.png';
                $namaSementara = $_FILES['foto']['tmp_name'];

                // tentukan lokasi file akan dipindahkan
                $dirUpload = "upload/";

                // pindahkan file
                $terupload = move_uploaded_file($namaSementara, $dirUpload.$namaFile);
                if ($terupload) {
                    echo "Upload berhasil!<br/>";
                    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
                    $sql = "update myguests set foto=? where id=?";
                    $id= mysqli_stmt_insert_id($stmt);
                    /* variabel $stmt diisi fungsi mysqli_prepare dengan input parameter $conn dan $sql
                    */
                    $stmt = mysqli_prepare($conn,$sql);
                    mysqli_stmt_bind_param($stmt, "si" , $namaFile,$id);
                    mysqli_stmt_execute($stmt);
                } else {
                    echo "Upload Gagal!";
                }
            }else{
                echo 'File adalah '.$type.'. File harus berupa '.implode(', ', $ekstensiYangDibolehkan);
            }
        }else{
            echo 'file harus lebih kecil dari 5MB';
        }
    }
} else {
    echo "Error:".$sql ."<br>". mysqli_error($conn);
}
// menjalankan fungsi mysqli_close untuk menutup koneksi database
mysqli_close($conn);
?>