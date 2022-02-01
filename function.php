<?php
function tulisPesan($cb){
    echo "halo mewaga renggaling!<br>";
    $cb("mewa");
}
$namabelakang="evan";
function namaKeluarga($namadepan="agus") {
global $namabelakang;
return $namadepan." ".$namabelakang;
tulisPesan();
return "$namadepan Mewaga.<br>";
}
echo namaKeluarga();

tulisPesan(function($name)
{
printf("Hello %s\r\n", $name);
});

?>

