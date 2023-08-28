<?php
include "proses/connect.php";
$query = mysqli_query($conn, 'SELECT * FROM tb_kategori_menu');
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2" style="background-color:#f3ddd7">
    <div class="card" style="background-color:#a4826e">
        <div class="card-header" style="color: #fef2e7;">
           <h3>Halaman Kategori Makanan dan Minuman</h3> 
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: #664b4a; color:#fef2e7">Tambah Kategori</button>
                </div>
            </div>
            <!-- Modal Tambah Kategori Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Tambah Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_katmenu.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" name="jenismenu" id="" style="color: #664b4a;">
                                                <option value="1">Makanan</option>
                                                <option value="2">Minuman</option>
                                            </select>
                                            <label for="floatingInput">Jenis Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Jenis Menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" required placeholder="Kategori Menu" name="katmenu" style="color: #664b4a;">
                                            <label for="floatingInput">Kategori Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Kategori Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_katmenu_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Tambah Kategori</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal Tambah kategori Baru ----->

            <?php
            foreach ($result as $row) {

            ?>

            <!-- Modal Edit Kategori Menu -->
            <div class="modal fade" id="ModalEdit<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Edit Data Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_katmenu.php" method="POST">
                            <input type="hidden" value="<?php echo $row['id_kat_menu'] ?>" name="id">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="jenismenu" id="" required style="color: #664b4a;">
                                        <?php
                                        $data = array("Makanan", "Minuman");
                                        foreach($data as $key => $value){
                                            if($row['jenis_menu'] == $key+1){
                                                echo "<option selected value= ".($key+1)." $value>$value</option>";
                                            }else{
                                                echo "<option value= ".($key+1)." $value>$value</option>";
                                            }

                                        }
                                        ?>
                                        </select>
                                            <label for="floatingInput">Jenis Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Jenis Menu.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" required placeholder="Kategori Menu" name="katmenu" value="<?php echo $row['kategori_menu'] ?>" style="color: #664b4a;">
                                            <label for="floatingInput">Kategori Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Kategori Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_katmenu_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Edit Kategori</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal Edit Kategori Menu --- -->

             <!-- Modal Hapus-->
             <div class="modal fade" id="ModalDelete<?php echo $row['id_kat_menu'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Hapus Data Kategori Menu</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_katmenu.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id_kat_menu']?>" name="id">        
                        <div class="col-lg-12" style="color: white;">
                            Apakah anda yakin menghaspus kategori menu <b><?php echo $row['kategori_menu'] ?></b>                       
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="hapus_kategori_validate" value="123456">Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal Hapus ----->

            <?php
            }
            if (empty($result)) {
                echo "Kategori tidak ada";
            } else {


            ?>
            <!---- Awal Tabel Daftar Kategori Menu ----->
                <div class="table-responsive">
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Kategori Menu</th>
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
                                        <?php echo $row['jenis_menu'] ==1 ? "Makanan" : "Minuman"?>
                                    </td>
                                    <td>
                                        <?php echo $row['kategori_menu'] ?>
                                    </td>
                                   
                                    <td class="d-flex">
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id_kat_menu'] ?>"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id_kat_menu'] ?>"><i class="bi bi-trash-fill"></i></button>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <!---- Akhir Tabel Daftar Kategori Menu ----->
            <?php
            }
            ?>
        </div>
    </div>
</div>