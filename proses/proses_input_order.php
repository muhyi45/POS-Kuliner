<?php
session_start();
include "connect.php";
$id_kuliner = $_SESSION['id_kuliner'];
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
//$kode_order = getRandomString(10);
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$message = "";
    if(!empty($_POST['input_order_validate'])){
        $query = mysqli_query($conn, "INSERT INTO tb_order (kode_order,meja,pelanggan,pelayan) values ('$kode_order','$meja','$pelanggan','$id_kuliner')");
        if(!$query){
            $message = '<script> alert("Order gagal dimasukan")</script>';
        }
        else{
            $message = '<script> alert("Order berhasil dimasukan")
            window.location="../?x=orderitem&order='.$conn->insert_id.'&meja='.$meja.'&pelanggan='.$pelanggan.'"</script>';
        }
    }
echo $message;

?>