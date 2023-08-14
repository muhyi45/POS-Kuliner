<?php
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$name = (isset($_POST['nama'])) ? htmlentities($_POST['nama']) : "";
$username = (isset($_POST['username'])) ? htmlentities($_POST['username']) : "";
$password = md5($_POST['password']);
$nomor_telepon = (isset($_POST['nomor_telepon'])) ? htmlentities($_POST['nomor_telepon']) : "";
$level = (isset($_POST['level'])) ? htmlentities($_POST['level']) : 0;
$message = ""; 
    if(!empty($_POST['update_user_validate'])){ 
        $select = mysqli_query($conn, "SELECT * FROM tb_user WHERE username = '$username'");
        if(mysqli_num_rows($select)> 0 ){
            $message = '<script> alert("Username yang dimasukan telah ada")
            window.location="../user"</script>';
        }else{


        $query = mysqli_query($conn, "UPDATE tb_user SET nama='$name', username='$username', password='$password', nomor_telepon='$nomor_telepon', level='$level' WHERE id='$id'");
        $message = '<script></script>';
        if(!$query){
            $message = '<script> alert("Data gagal diupdate")</script>';
        }
        else{
            $message = '<script> alert("Data berhasil diupdate")
            window.location="../user"</script>';
        }
    }}
echo $message;
?>