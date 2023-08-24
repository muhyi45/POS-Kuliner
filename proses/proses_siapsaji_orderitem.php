<?php
session_start();
include "connect.php";
$id = (isset($_POST['id'])) ? htmlentities($_POST['id']) : "";
$jumlah = (isset($_POST['jumlah'])) ? htmlentities($_POST['jumlah']) : "";

    if(!empty($_POST['siapsaji_orderitem_validate'])){
        $query = mysqli_query($conn, "UPDATE catatan='$catatan', status=2 WHERE id_list_order ='$id'");
        if(!$query){
            $message = '<script> alert("Order Gagal Di Sajikan");
            window.location="../dapur"</script>';
        }
        else{
            $message = '<script> alert("Order Siap Disajikan")
            window.location="../dapur"</script>';
        } 
    } echo $message;
?>