<?php
include "connect.php";
$id = (isset($_POST['no'])) ? htmlentities($_POST['no']) : "";
$foto = (isset($_POST['foto'])) ? htmlentities($_POST['foto']) : "";
$message = ""; 
    if(!empty($_POST['input_user_validate'])){ 
        $query = mysqli_query($conn, "DELETE FROM tb_daftar_menu WHERE no = '$id'");
        if(!$query){
            unlink("../asset/img/$foto");
            $message = '<script> alert("Menu gagal dihapus")
            window.location="../menu"</script>';
        }
        else{
            $message = '<script> alert("Menu berhasil dihapus")
            window.location="../menu"</script>';
        }
    }
echo $message;
?>