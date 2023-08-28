<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu
LEFT JOIN tb_kategori_menu ON tb_kategori_menu.id_kat_menu = tb_daftar_menu.kategori");
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}

$select_kat_menu = mysqli_query($conn, "SELECT id_kat_menu,kategori_menu FROM tb_kategori_menu");
?>

<div class="col-lg-9 mt-2" style="background-color:#f3ddd7">
    <div class="card" style="background-color:#a4826e">
        <div class="card-header" style="color: #fef2e7;">
            <h3>Halaman Daftar Menu</h3> 
        </div>
        <div class="card-body" style="background-color:#a4826e">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: #664b4a; color:#fef2e7">Tambah Menu</button>
                </div>
            </div>
            <!-- Modal Tambah Menu Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Tambah Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="color: #664b4a;">
                            <form class="needs-validation" novalidate action="proses/proses_input_menu.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto" style="color: #664b4a;">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan File Foto Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required>
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select class="form-select" aria-label="Default select example" name="kat_menu" required style="color: #664b4a;">
                                                <option selected hidden value="" style="color: #664b4a;">Pilih Kategori Menu</option>
                                                <?php
                                                    foreach ($select_kat_menu as $value){
                                                        echo "<option value=".$value['id_kat_menu'].">$value[kategori_menu]</option>";
                                                    }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan atau Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="harga" name="harga" required>
                                    <label for="floatingInput">Harga</label>
                                    <div class="invalid-feedback">
                                                Masukan Harga.
                                            </div>
                                </div>
                                </div>
                                <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required>
                                    <label for="floatingInput">Stok</label>
                                    <div class="invalid-feedback">
                                                Masukan Stok.
                                            </div>
                                </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_menu_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Tambah Menu</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal Tambah Menu Baru ----->

            <?php
            if (empty($result)) {
                echo "Data menu makanan atau minuman tidak ada";
            } else {
            foreach ($result as $row) {

            ?>
            <!-- Modal View Menu-->
            <div class="modal fade" id="ModalView<?php echo $row['no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">View Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="color: #664b4a;">
                            <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" disabled type="text" class="form-control" id="floatingInput"  value="<?php echo $row['nama_menu'] ?>">
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-floating">
                                            <input style="color: #664b4a;" disabled type="text" class="form-control" id="floatingInput" value="<?php echo $row['keterangan'] ?>">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select disabled class="form-select" aria-label="Default select example" style="color: #664b4a;">
                                                <option selected hidden value="">Pilih Kategori Menu</option>
                                                <?php
                                                    foreach ($select_kat_menu as $value){
                                                        if($row['kategori'] == $value['id_kat_menu']){
                                                            echo "<option selected value=" .$value['id_kat_menu']. ">$value[kategori_menu]</option>";
                                                        }else{
                                                            echo "<option value=".$value['id_kat_menu'].">$value[kategori_menu]</option>";
                                                        }
                                                        
                                                    }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan atau Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input style="color: #664b4a;" disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['harga'] ?>">
                                    <label for="floatingInput">Harga</label>
                                    <div class="invalid-feedback">
                                                Masukan Harga.
                                            </div>
                                </div>
                                </div>
                                <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input style="color: #664b4a;" disabled type="number" class="form-control" id="floatingInput" value="<?php echo $row['stok'] ?>">
                                    <label for="floatingInput">Stok</label>
                                    <div class="invalid-feedback">
                                                Masukan Stok.
                                            </div>
                                </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button hidden type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button hidden type="submit" class="btn btn-primary" name="input_menu_validate" value="12345">Save changes</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal View Menu ----->

            <!-- Modal Edit Menu-->
            <div class="modal fade" id="ModalEdit<?php echo $row['no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Edit Menu Makanan dan Minuman</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body" style="color: #664b4a;">
                            <form class="needs-validation" novalidate action="proses/proses_edit_menu.php" method="POST" enctype="multipart/form-data">
                            <input style="color: #664b4a;" type="hidden" value="<?php echo $row['no'] ?>" name="no">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="input-group mb-3">
                                            <input type="file" class="form-control py-3" id="uploadFoto" placeholder="Your Name" name="foto" required>
                                            <label class="input-group-text" for="uploadFoto" style="color: #664b4a;">Upload Foto Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan File Foto Menu
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Nama Menu" name="nama_menu" required value="<?php echo $row['nama_menu'] ?>" style="color: #664b4a;">
                                            <label for="floatingInput">Nama Menu</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama Menu.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="floatingInput" placeholder="Keterangan" name="keterangan" value="<?php echo $row['keterangan'] ?>" style="color: #664b4a;">
                                            <label for="floatingPassword">Keterangan</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select class="form-select" aria-label="Default select example" name="kat_menu" style="color: #664b4a;">
                                                <option selected hidden value="">Pilih Kategori Menu</option>
                                                <?php
                                                    foreach ($select_kat_menu as $value){
                                                        if($row['kategori'] == $value['id_kat_menu']){
                                                            echo "<option selected value=" .$value['id_kat_menu']. ">$value[kategori_menu]</option>";
                                                        }else{
                                                            echo "<option value=".$value['id_kat_menu'].">$value[kategori_menu]</option>";
                                                        }
                                                        
                                                    }
                                                ?>
                                            </select>
                                            <label for="floatingInput">Kategori Makanan atau Minuman</label>
                                            <div class="invalid-feedback">
                                                Pilih Kategori Makanan atau Minuman.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="harga" name="harga" required value="<?php echo $row['harga'] ?>" style="color: #664b4a;">
                                    <label for="floatingInput">Harga</label>
                                    <div class="invalid-feedback">
                                                Masukan Harga.
                                            </div>
                                </div>
                                </div>
                                <div class="col-4">
                                        <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingInput" placeholder="Stok" name="stok" required value="<?php echo $row['stok'] ?>" style="color: #664b4a;">
                                    <label for="floatingInput">Stok</label>
                                    <div class="invalid-feedback">
                                                Masukan Stok.
                                            </div>
                                </div>
                                </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_menu_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Edit Menu</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal Edit Menu --- -->

             <!-- Modal Hapus-->
             <div class="modal fade" id="ModalDelete<?php echo $row['no'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Hapus Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_menu.php" method="POST">
                        <input type="hidden" value="<?php echo $row['no']?>" name="no">  
                        <input type="hidden" value="<?php echo $row['foto']?>" name="foto">      
                        <div class="col-lg-12" style="color: #fef2e7;"> 
                                    Apakah anda ingin menghapus <b><?php echo $row['nama_menu'] ?></b>            
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345">Delete</button>
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
                                <th scope="col">Foto Menu</th>
                                <th scope="col">Nama Menu</th>
                                <th scope="col">Keterangan</th>
                                <th scope="col">Jenis Menu</th>
                                <th scope="col">Kategori</th>
                                <th scope="col">Harga</th>
                                <th scope="col">Stok</th>
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
                                        <div style="width: 100px;">
                                        <img src="asset/img/<?php echo $row['foto'] ?>" class="img-thumbnail" alt="...">
                                        </div>
                                    </td>
                                    <td>
                                        <?php echo $row['nama_menu'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['keterangan'] ?>
                                    </td>
                                    <td>
                                        <?php echo ($row['jenis_menu'] == 1) ? "Makanan" : "Minuman" ?>
                                    </td>
                                    <td>
                                    <?php echo $row['kategori_menu'] ?>
                                    </td>
                                    <td>
                                    <?php echo $row['harga'] ?>
                                    </td>
                                    <td>
                                    <?php echo $row['stok'] ?>
                                    </td>
                                    <td>
                                        <div class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['no'] ?>"><i class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['no'] ?>"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['no'] ?>"><i class="bi bi-trash-fill"></i></button>
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