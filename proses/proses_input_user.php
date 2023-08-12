<?php
include "connect.php";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = md5($_POST['password']);
$nomor_telepon = (isset($_POST['nomor_telepon'])) ? htmlentities($_POST['nomor_telepon']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : 0;

    if(!empty($_POST['input_user_validate'])){
        $query = mysqli_query($conn, "INSERT INTO tb_user (nama,username,password,nomor_telepon,level) values ('$name','$username','$password','$nomor_telepon','$level')");
        if(!$query){
            $message = '<script> alert("Data gagal dimasukan")</script>';
        }
        else{
            $message = '<script> alert("Data berhasil dimasukan")
            window.location="../user"</script>';
        }
    } echo $message;
?>