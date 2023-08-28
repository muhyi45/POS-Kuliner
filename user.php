<?php
include "proses/connect.php";
$query = mysqli_query($conn, 'SELECT * FROM tb_user');
while ($record = mysqli_fetch_array($query)) {
    $result[] = $record;
}
?>

<div class="col-lg-9 mt-2" style="background-color:#f3ddd7">
    <div class="card" style="background-color:#a4826e">
        <div class="card-header" style="color: #fef2e7;">
            <h3> Halaman User</h3>
        </div>
        <div class="card-body" style="background-color:#a4826e">
            <div class="row">
                <div class="col d-flex justify-content-end">
                    <button class="btn mb-2" data-bs-toggle="modal" data-bs-target="#ModalTambahUser" style="background-color: #664b4a; color:#fef2e7">Tambah User</button>
                </div>
            </div>
            <!-- Modal Tambah User Baru-->
            <div class="modal fade" id="ModalTambahUser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;" >Tambah User Baru</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" required>
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" required>
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukan Email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating">
                                            <input style="color: #664b4a;" type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">
                                                Masukan Password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                            <select style="color: #664b4a;" class="form-select" aria-label="Default select example" name="level" required>
                                                <option selected hidden value="">Pilih Level</option>
                                                <option value="1">Admin</option>
                                                <option value="2">Kasir</option>
                                                <option value="3">Pelayan</option>
                                                <option value="4">Dapur</option>
                                            </select>
                                            <label for="floatingInput">Level User</label>
                                            <div class="invalid-feedback">
                                                Pilih Level User.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input style="color: #664b4a;" type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="nomor_telepon">
                                    <label for="floatingInput">Nomor Telepon</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="input_user_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Tambah User</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            <!----- Akhir Modal Tambah User Baru ----->

            <?php
            foreach ($result as $row) {

            ?>
            <!-- Modal View-->
            <div class="modal fade" id="ModalView<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;" >Detail Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_input_user.php" method="POST">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" disabled type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama']?>">
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" disabled type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username']?>">
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukan Email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating">
                                            <input style="color: #664b4a;" type="password" class="form-control" id="floatingPassword" placeholder="Password" disabled value="12345" name="password" value="<?php echo $row['password']?>">
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">
                                                Masukan Password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select style="color: #664b4a;" disabled class="form-select" aria-label="Default select example" name="level" id="" required>
                                        <?php
                                        $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                        foreach($data as $key => $value){
                                            if($row['level'] == $key+1){
                                                echo "<option selected value='$key' $value>$value</option>";
                                            }else{
                                                echo "<option value='$key' $value>$value</option>";
                                            }

                                        }
                                        ?>
                                        </select>
                                            <label for="floatingInput">Level User</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input style="color: #664b4a;" disabled type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="nomor_telepon" value="<?php echo $row['nomor_telepon']?>">
                                    <label for="floatingInput">Nomor Telepon</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal View ----->

            <!-- Modal Edit-->
            <div class="modal fade" id="ModalEdit<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Edit Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_edit_user.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">        
                        <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" required type="text" class="form-control" id="floatingInput" placeholder="Your Name" name="nama" value="<?php echo $row['nama']?>">
                                            <label for="floatingInput">Nama</label>
                                            <div class="invalid-feedback">
                                                Masukan Nama.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-floating mb-3">
                                            <input style="color: #664b4a;" <?php echo(($row['username'] == $_SESSION['username_kuliner'])) ? 'disabled' : '' ; ?> required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $row['username']?>">
                                            <label for="floatingInput">Username</label>
                                            <div class="invalid-feedback">
                                                Masukan Email.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-8">
                                        <div class="form-floating">
                                            <input style="color: #664b4a;" required type="password" class="form-control" id="floatingPassword" placeholder="Password" value="12345" name="password" value="<?php echo $row['password']?>">
                                            <label for="floatingPassword">Password</label>
                                            <div class="invalid-feedback">
                                                Masukan Password.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-floating mb-3">
                                        <select style="color: #664b4a;" class="form-select" aria-label="Default select example" name="level" id="" required>
                                        <?php
                                        $data = array("Owner/Admin", "Kasir", "Pelayan", "Dapur");
                                        foreach($data as $key => $value){
                                            if($row['level'] == $key+1){
                                                echo "<option selected value= ".($key+1)." $value>$value</option>";
                                            }else{
                                                echo "<option value= ".($key+1)." $value>$value</option>";
                                            }

                                        }
                                        ?>
                                        </select>
                                            <label for="floatingInput">Level User</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-floating mb-3">
                                    <input style="color: #664b4a;" type="text" class="form-control" id="floatingInput" placeholder="08xxxx" name="nomor_telepon" value="<?php echo $row['nomor_telepon']?>">
                                    <label for="floatingInput">Nomor Telepon</label>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn" name="update_user_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Edit User</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal Edit --- -->

             <!-- Modal Hapus-->
             <div class="modal fade" id="ModalDelete<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Hapus Data User</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_delete_user.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">        
                        <div class="col-lg-12" style="color: white;">
                            <?php
                            if($row['username'] == $_SESSION['username_kuliner']){
                                echo "<div class='alert alert-danger'>Anda tidak dapat menghapus akun sendiri</div>";
                            }else{
                                echo "Apakah anda yakin ingin menghapus user <b>$row[username]</b>";
                            }
                            ?>                              
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger" name="input_user_validate" value="12345" <?php echo(($row['username'] == $_SESSION['username_kuliner'])) ? 'disabled' : '' ; ?>>Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal Hapus ----->

                         <!-- Modal Reset Password-->
                         <div class="modal fade" id="ModalResetPassword<?php echo $row['id'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-md modal-fullscreen-md-down">
                    <div class="modal-content" style="background-color:#a4826e">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Reset Password</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <form class="needs-validation" novalidate action="proses/proses_reset_password.php" method="POST">
                        <input type="hidden" value="<?php echo $row['id']?>" name="id">        
                        <div class="col-lg-12">
                            <?php
                            if($row['username'] == $_SESSION['username_kuliner']){
                                echo "<div class='alert alert-danger'>Anda tidak dapat mereset password sendiri</div>";
                            }else{
                                echo "Apakah anda yakin ingin mereset password user <b>$row[username]</b> menjadi password bawaan sistem yaitu <b>password </b>";
                            }
                            ?>                              
                        </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success" name="input_user_validate" value="12345" <?php echo(($row['username'] == $_SESSION['username_kuliner'])) ? 'disabled' : '' ; ?>>Reset Password</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!----- Akhir Modal Reset Password ----->

                <?php 
                }
                ?>

            

           


            <?php
            if (empty($result)) {
                echo "Data user tidak ada";
            } else {


            ?>
                <div class="table-responsive">
                    <table class="table table-danger">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">Nomor Telepon</th>
                                <th scope="col">Level</th>
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
                                        <?php echo $row['nama'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['username'] ?>
                                    </td>
                                    <td>
                                        <?php echo $row['nomor_telepon'] ?>
                                    </td>
                                    <td>
                                    <?php
                                        if ($row['level']==1){
                                            echo "Admin";
                                        }elseif ($row['level']==2){
                                            echo "Kasir";
                                        }elseif ($row['level']==3){
                                            echo "Pelayan";
                                        }elseif ($row['level']==4){
                                            echo "Dapur";
                                        } 
                                        ?>
                                    </td>
                                    <td class="d-flex">
                                        <button class="btn btn-info btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalView<?php echo $row['id'] ?>"><i class="bi bi-eye-fill"></i></button>
                                        <button class="btn btn-warning btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalEdit<?php echo $row['id'] ?>"><i class="bi bi-pencil-fill"></i></button>
                                        <button class="btn btn-danger btn-sm me-1" data-bs-toggle="modal" data-bs-target="#ModalDelete<?php echo $row['id'] ?>"><i class="bi bi-trash-fill"></i></button>
                                        <button class="btn btn-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalResetPassword<?php echo $row['id'] ?>"><i class="bi bi-key-fill"></i></button>
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