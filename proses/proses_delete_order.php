<?php
include "connect.php";
$kode_order = (isset($_POST['kode_order'])) ? htmlentities($_POST['kode_order']) : "";
$message = "";
if (!empty($_POST['delete_order_validate'])) {
    $select = mysqli_query($conn, "SELECT * FROM tb_order WHERE id_order = '$kode_order'");
    $kode = mysqli_fetch_assoc($select);
    $sql = mysqli_query($conn, "DELETE FROM tb_list_order WHERE kode_order = $kode[kode_order]");
    $query = mysqli_query($conn, "DELETE FROM tb_order WHERE id_order = '$kode_order'");
    if (!$query) {
        $message = '<script> alert("Data order gagal dihapus");
        window.location="../order"</script>';
    } else {
        $message = '<script> alert("Data order berhasil dihapus");
        window.location="../order"</script>';
    }
}
echo $message;
