<?php
include "proses/connect.php";


function getRandomString($n)
{
    $characters = '012345678';
    $randomString = '';

    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }

    return $randomString;
}

$kode = getRandomString(10);
date_default_timezone_set('Asia/Jakarta');
$query = mysqli_query($conn, "SELECT tb_order.*,tb_bayar.*,nama, SUM(harga*jumlah) AS harganya FROM tb_order
    LEFT JOIN tb_user ON tb_user.id = tb_order.pelayan
    LEFT JOIN tb_list_order ON tb_list_order.kode_order = tb_order.kode_order
    LEFT JOIN tb_daftar_menu ON tb_daftar_menu.no = tb_list_order.menu
    LEFT JOIN tb_bayar ON tb_bayar.id_bayar = tb_order.kode_order
    GROUP BY id_order ORDER BY waktu_order DESC");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}


// $select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>
<div class="col-lg-9 mt-2" style="background-color:#f3ddd7">
    <div class="card" style="background-color:#a4826e">
        <div class="card-header" style="color: #fef2e7;">
            <h3> Halaman Order</h3>
        </div>
        <div class="card-body" style="background-color:#a4826e">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: #664b4a; color:#fef2e7">Tambah Order</button>
                </div>
            </div>
            <!-- Modal Tambah Order Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Tambah Order Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_order.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-floating mb-3">
                                        <input style="color: #664b4a;" type="text" class="form-control" id="kode"  value="<?php echo $kode ?>" readonly>
                                            <input type="text" class="form-control" id="kode" name="kode_order" value="<?php echo  $kode ?>" hidden>
                                            <label for="kode">Kode Order</label>
                                            <div class="invalid-feedback">
                                                Masukan Kode Order
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" type="number" class="form-control" id="meja" placeholder="Nomor Meja" name="meja" required>
                                            <label for="meja">Meja</label>
                                            <div class="invalid-feedback">
                                                Masukan Meja
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required>
                                            <label for="pelanggan">Nama Pelanggan</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Pelanggan
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_order_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Buat Order</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal Tambah Order Baru ----->
            <? foreach ($result as $row) {
                echo $row;
            } ?>
            <?php
            if (empty($result)) {
                echo "Data menu makanan atau minuman tidak ada";
            } else {
                foreach ($result as $row) {

            ?>
                    <!-- Modal Edit Menu-->
                    <div class="modal fade" id="ModalEdit<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                            <div class="modal-content" style="background-color:#a4826e">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Edit Order Makanan dan Minuman</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_edit_order.php" method="POST">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <div class="form-floating mb-3">
                                                    <input style="color: #664b4a;" readonly type="text" class="form-control" id="kode" name="kode_order" value="<?php echo $row['id_order'] ?>" readonly>
                                                    <label for="kode">Kode Order</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Kode Order
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-2">
                                                <div class="form-floating mb-3">
                                                    <input style="color: #664b4a;" type="number" class="form-control" id="meja" placeholder="Nomor Meja" name="meja" required value="<?php echo $row['meja'] ?>">
                                                    <label for="meja">Meja</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Meja
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-7">
                                                <div class="form-floating mb-3">
                                                    <input style="color: #664b4a;" type="text" class="form-control" id="pelanggan" placeholder="Nama Pelanggan" name="pelanggan" required value="<?php echo $row['pelanggan'] ?>">
                                                    <label for="pelanggan">Nama Pelanggan</label>
                                                    <div class="invalid-feedback">
                                                        Masukan Nama Pelanggan
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn" name="edit_order_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Edit Order</button>
                                        </div>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!----- Akhir Modal Edit Menu --- -->

                    <!-- Modal Hapus-->
                    <div class="modal fade" id="ModalDelete<?php echo $row['id_order'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md modal-fullscreen-md-down">
                            <div class="modal-content" style="background-color:#a4826e">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Hapus Data Order</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form class="needs-validation" novalidate action="proses/proses_delete_order.php" method="POST">
                                        <input type="hidden" value="<?php echo $row['id_order'] ?>" name="kode_order">
                                        <div class="col-lg-12" style="color: white;">
                                            Apakah anda ingin menghapus order atas nama <b><?php echo $row['pelanggan'] ?></b> dengan kode order <b><?php echo $row['id_order'] ?></b>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-danger" name="delete_order_validate" value="12345">Delete</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!----- Akhir Modal Hapus ----->
                <?php
                }
                ?>
                <div class="table-responsive">
                    <table class="table table-danger">
                        <thead>
                            <tr class="text-nowrap">
                                <th scope="col">No</th>
                                <th scope="col">Kode Order</th>
                                <th scope="col">Pelanggan</th>
                                <th scope="col">Meja</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Pelayan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Waktu Order</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($result as $row) {
                            ?>
                                <tr>
                                    <th scope="row">
                                        <?php echo $no++ ?>
                                    </th>
                                    <td>
                                        <?php echo $row['kode_order'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['pelanggan'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['meja'] ?>
                                    </td>
                                    <td>
                                        <?php echo number_format((int)$row['harganya'],0,',','.') ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nama'] ?>
                                    </td>
                                    <td>
                                        <?php echo (!empty($row['id_bayar'])) ? "<span class='badge text-bg-success'>dibayar</span>" : "" ; ?>
                                    </td>
                                    <td>
                                        <?php echo $row['waktu_order'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                            <a class="btn btn-info btn-sm me-1" href="./?x=orderitem&order= <?php echo $row['id_order'] . "&meja=" . $row['meja'] . "&pelanggan=" . $row['pelanggan'] ?>"><i class="bi bi-eye-fill"></i></a>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-warning btn-sm me-1" ; ?>" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_order'] ?>"><i class="bi bi-pencil-fill"></i></button>
                                            <button class="<?php echo (!empty($row['id_bayar'])) ? "btn btn-secondary btn-sm disabled" : "btn btn-danger btn-sm" ; ?>" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_order'] ?>"><i class="bi bi-trash-fill"></i></button>
                                        </div>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            <?php
            }
            ?>
        </div>
    </div>
</div>