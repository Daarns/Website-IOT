<?php
require 'koneksi/koneksi.php';
$username = $_POST["username"];
$password = $_POST['password'];

$query_sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

$result = mysqli_query($koneksi,$query_sql);

if (mysqli_num_rows($result) > 0 ) {
    header("Location: index.php");
} else if(empty($user)){
    header("Location:login.php?gagal=userKosong");
}else if(empty($pass)){
    header("Location:login.php?gagal=passKosong");
}else if($jumlah==0){
    header("Location:login.php?gagal=userpassSalah");
}