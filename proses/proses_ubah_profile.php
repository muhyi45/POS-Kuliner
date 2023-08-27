<?php
session_start();
include "connect.php";
$nama = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$nomor_telepon = (isset($_POST['nomor_telepon'])) ? htmlentities($_POST['nomor_telepon']) : "";
$message = ""; 
$username = $_SESSION['username_kuliner'];

if(!empty($_POST['ubah_profile_validate'])){
            $query = mysqli_query($conn, "UPDATE tb_user SET nama='$nama', nomor_telepon='$nomor_telepon' WHERE username = '$username'");
            if(!$query){
                $message = '<script> alert("Profile Users Gagal Diubah");
                window.history.back()</script>';
            }else{
                $message = '<script> alert("Profile Users Berhasil Diubah");
                window.history.back()</script>';
            }
        }else{
                $message = '<script> alert("Terjadi Kesalahan");
                window.history.back()</script>';
}echo $message;
?>