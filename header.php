<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_user WHERE username='$_SESSION[username_kuliner]'");
$records = mysqli_fetch_array($query);
?>

<nav class="navbar navbar-expand navbar-dark sticky-top" style="background-color: #664b4a;">
    <div class="container-lg" >
        <a class="navbar-brand" href="."><img src="asset/img/logo_sim_kuliner.png" width="55" height="55" class="float-start rounded-circle" alt="..."></a>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="color: white;">
                       <b> <?php echo $hasil['nama']; ?> </b>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end mt-2" style="background-color: #a4826e;">
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahProfile" style="color: #fefbfe;"><i class="bi bi-person-circle"></i> Profile</a></li>
                        <li><a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#ModalUbahPassword" style="color: #fefbfe;"><i class="bi bi-key-fill"></i> Ubah Password</a></li>
                        <li><a class="dropdown-item" href="logout" style="color: #fefbfe;"><i class="bi bi-box-arrow-in-right"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Modal Ubah Password-->
<div class="modal fade" id="ModalUbahPassword" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content" style="background-color:#a4826e">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Ubah Password</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_password.php" method="POST">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" disabled required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $_SESSION['username_kuliner'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Masukan Email.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" required type="password" class="form-control" id="floatingPassword" name="passwordlama">
                                <label for="floatingInput">Password Lama</label>
                                <div class="invalid-feedback">
                                    Masukan Password Lama.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" required type="password" class="form-control" id="floatingInput" name="passwordbaru">
                                <label for="floatingInput">Password Baru</label>
                                <div class="invalid-feedback">
                                    Masukan Password Baru.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" required type="password" class="form-control" id="floatingPassword" name="repasswordbaru">
                                <label for="floatingInput">Ulangi Password Baru</label>
                                <div class="invalid-feedback">
                                    Ulangi Password Baru.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" name="ubah_password_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Ubah Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----- Akhir Modal Ubah Password --- -->


<!-- Modal Ubah Profil-->
<div class="modal fade" id="ModalUbahProfile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-fullscreen-md-down">
        <div class="modal-content" style="background-color:#a4826e">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel" style="color: #664b4a;">Profile</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="needs-validation" novalidate action="proses/proses_ubah_profile.php" method="POST">

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" disabled required type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="username" value="<?php echo $_SESSION['username_kuliner'] ?>">
                                <label for="floatingInput">Username</label>
                                <div class="invalid-feedback">
                                    Masukan Email.
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" required type="text" class="form-control" id="floatingNama" name="nama" value="<?php echo $records['nama'] ?>">
                                <label for="floatingInput">Nama</label>
                                <div class="invalid-feedback">
                                    Masukan Nama Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-floating mb-3">
                                <input style="color: #664b4a;" required type="number" class="form-control" id="floatingInput" name="nomor_telepon" value="<?php echo $records['nomor_telepon'] ?>">
                                <label for="floatingInput">Nomor HP</label>
                                <div class="invalid-feedback">
                                    Masukan Nomor HP Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn" name="ubah_profile_validate" value="12345" style="background-color: #664b4a; color:#fef2e7">Ubah Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!----- Akhir Modal Ubah Profile --- -->