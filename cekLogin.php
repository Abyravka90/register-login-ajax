<?php
session_start();
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];

$result = mysqli_query($conn, "SELECT * FROM `tbluser` WHERE username = '$username' AND `password` = '$password'")or die(mysqli_error($conn));
$numROw=mysqli_num_rows($result);
$row=mysqli_fetch_object($result);

if($numROw==1){
    echo "success";

    $_SESSION['idUser'] = $row->idUser;
    $_SESSION['namaLengkap'] = $row->namaLengkap;
    $_SESSION['username'] = $row->username;
} else {
    echo "error";
}