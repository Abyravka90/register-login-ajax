<?php

include 'koneksi.php';
// PARSING DATA
$namaLengkap = $_POST['namaLengkap'];
$username = $_POST['username'];
$password=$_POST['password'];

//Jalankan Querynya
$result=mysqli_query($conn,"INSERT INTO `tbluser`(namaLengkap, username, `password`) VALUES ('$namaLengkap','$username','$password')")or die(mysqli_error($conn));
if($result){
    echo 'success';
}else{
    echo 'error';
}