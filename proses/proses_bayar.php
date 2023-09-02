<?php
session_start();
include "connect.php";
$id_order = (isset($_POST['id_order'])) ? htmlentities($_POST['id_order']) : "";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$meja = (isset($_POST['meja'])) ? htmlentities($_POST['meja']) : "";
$pelanggan = (isset($_POST['pelanggan'])) ? htmlentities($_POST['pelanggan']) : "";
$total = (isset($_POST['total'])) ? htmlentities($_POST['total']) : "";
$uang = (isset($_POST['uang'])) ? htmlentities($_POST['uang']) : "";
$kembalian = (int)$uang - (int)$total;
$message="";


    if(!empty($_POST['bayar_validate'])){
        if($kembalian < 0){
            $message = '<script> alert("NOMINAL UANG TIDAK MENCUKUPI");
            window.location="../?x=orderitem&order=' . $id_order . '&meja=' . $meja . '&pelanggan=' . $pelanggan . '"</script>';
        }else{
            $query = mysqli_query($conn, "INSERT INTO tb_bayar (id_bayar, nominal_uang, total_bayar) VALUES ('$kode_order', '$uang', '$total')");

        if (!$query) {
            $message = "Pembayaran Gagal !";
        } else {
            $message = "Pembayaran Berhasil !\nUANG KEMBALIAN Rp. " . $kembalian;
            // Update stock for each menu item in the order
            $listMenu = mysqli_query($conn, "SELECT * FROM tb_list_order WHERE kode_order = '$kode_order'");
            while ($menuItem = mysqli_fetch_assoc($listMenu)) {
                $jumlah = (int)$menuItem['jumlah'];
                $menuId = (int)$menuItem['menu'];
                $menuQuery = mysqli_query($conn, "SELECT * FROM tb_daftar_menu WHERE no = $menuId");
                $menuData = mysqli_fetch_assoc($menuQuery);
                $sisaStok = $menuData['stok'] - $jumlah;
                $update = mysqli_query($conn, "UPDATE tb_daftar_menu SET stok = '$sisaStok' WHERE no = $menuId");
                }
                
            }
        if(!$query){
            $message = '<script> alert("Pembayaran Gagal !");
            window.location="../?x=orderitem&order=' . $id_order . '&meja=' . $meja . '&pelanggan=' .$pelanggan . '"</script>';
        }else{
            $message = '<script> alert("Pembayaran Berhasil ! \nUANG KEMBALIAN Rp. '.$kembalian.'");
            window.location="../?x=orderitem&order=' . $id_order . '&meja=' . $meja . '&pelanggan=' .$pelanggan . '"</script>';
            }
        }
    }
echo $message;
?>