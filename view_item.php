<?php
include "proses/connect.php";

$queryDetailOrder = mysqli_query($conn, "SELECT * FROM tb_order WHERE tb_order.id_order = '" . $_GET['order'] . "'");

$meja = $_GET['meja'];
$pelanggan = $_GET['pelanggan'];
$kode = "";
while ($record = mysqli_fetch_assoc($queryDetailOrder)) {
    // $kode = $record; // This line should be replaced with the following line
    $kode = $record['kode_order'];
}

$query = mysqli_query($conn, "SELECT *, (tb_list_order.jumlah * tb_daftar_menu.harga) as harganya FROM tb_list_order LEFT JOIN tb_daftar_menu ON tb_list_order.menu = tb_daftar_menu.no LEFT JOIN tb_bayar ON tb_bayar.id_bayar = kode_order where kode_order = '$kode'");

$result = []; // Initialize the $result array
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_menu = mysqli_query($conn, "SELECT no, nama_menu FROM tb_daftar_menu");
?>
<div class="col-lg-9 mt-2" style="background-color:#f3ddd7">
    <div class="card" style="background-color:#a4826e">
        <div class="card-header" style="color: #fef2e7;">
            <h3>Halaman View Item</h3>
        </div>
        <div class="card-body">
            <a href="report" class="btn btn-info mb-3"><i class="bi bi-arrow-left-circle-fill"></i> Back</a>
            <div class="row">
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="kodeorder" value="<?php echo $kode; ?>">
                        <label for="uploadFoto">Kode Order</label>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="meja" value="<?php echo $meja; ?>">
                        <label for="uploadFoto">Meja</label>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-floating mb-3">
                        <input disabled type="text" class="form-control" id="pelanggan" value="<?php echo $pelanggan; ?>">
                        <label for="uploadFoto">Pelanggan</label>
                    </div>
                </div>
            </div>
            
            <?php
            if (empty($result)) {
                echo "Data menu makanan atau minuman tidak ada";
            } else {
                foreach ($result as $row) {

            ?>



                <?php
                }
                ?>

                


                <div class="table-responsive">
                    <table class="table table-danger">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">Menu</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Qty</th>
                                <th scope="col">Status</th>
                                <th scope="col">Catatan</th>
                                <th scope="col">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $total = 0;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harga'], 0, ',', '.')  ?>
                                    </td>
                                    <td>
                                        <?php echo $row['jumlah'] ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($row['status'] == 1) {
                                            echo "<span class='badge text-bg-warning'>Masuk ke dapur</span>";
                                        } elseif ($row['status'] == 2) {
                                            echo "<span class='badge text-bg-primary'>Siap saji</span>";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php echo $row['catatan'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format($row['harganya'], 0, ',', '.')  ?>
                                    </td>
                                </tr>
                            <?php
                                $total += $row['harganya'];
                            }
                            ?>
                            <tr>
                                <td colspan="5" class="fw-bold">
                                    Total Harga
                                </td>
                                <td class="fw-bold">
                                    <?php echo number_format($total, 0, ',', '.')  ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>