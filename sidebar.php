<div class="col-lg-3">
                <nav class="navbar navbar-expand-lg bg-light rounded border mt-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel" style="width:250px">
                            <div class="offcanvas-header">
                                <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Offcanvas</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                            </div>
                            <div class="offcanvas-body">
                                <ul class="navbar-nav nav-pills flex-column justify-content-end flex-grow-1">
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo ((isset ($_GET['x']) && $_GET['x']=='home') || !isset($_GET['x'])) ? 'active link-light' : 'link-dark' ; ?>" aria-current="page" href="home"><i class="bi bi-house-door-fill"></i> Dashboard</a>
                                    </li>

                                    <?php if($hasil['level']==1 || $hasil['level']==3){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='menu') ? 'active link-light' : 'link-dark' ; ?>" href="menu"><i class="bi bi-book-fill"></i> Daftar Menu</a>
                                    </li>
                                    <?php } ?>

                                    <?php if($hasil['level']==1){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='katmenu') ? 'active link-light' : 'link-dark' ; ?>" href="katmenu"><i class="bi bi-tags-fill"></i> Kategori Menu</a>
                                    </li>
                                    <?php } ?>

                                    <?php if($hasil['level']==1 || $hasil['level']==2 || $hasil['level']==3){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='order') ? 'active link-light' : 'link-dark' ; ?>" href="order"><i class="bi bi-cart-fill"></i> Order</a>
                                    </li>
                                    <?php } ?>

                                    <?php if($hasil['level']==1 || $hasil['level']==4){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='dapur') ? 'active link-light' : 'link-dark' ; ?>" href="dapur"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-fire" viewBox="0 0 16 16">
  <path d="M8 16c3.314 0 6-2 6-5.5 0-1.5-.5-4-2.5-6 .25 1.5-1.25 2-1.25 2C11 4 9 .5 6 0c.357 2 .5 4-2 6-1.25 1-2 2.729-2 4.5C2 14 4.686 16 8 16Zm0-1c-1.657 0-3-1-3-2.75 0-.75.25-2 1.25-3C6.125 10 7 10.5 7 10.5c-.375-1.25.5-3.25 2-3.5-.179 1-.25 2 1 3 .625.5 1 1.364 1 2.25C11 14 9.657 15 8 15Z"/>
</svg> Dapur</a>
                                    </li>
                                    <?php } ?>

                                    <?php if($hasil['level']==1){?>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='user') ? 'active link-light' : 'link-dark' ; ?>" href="user"><i class="bi bi-people-fill"></i>User</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link ps-2 <?php echo (isset ($_GET['x']) && $_GET['x']=='report') ? 'active link-light' : 'link-dark' ; ?>" href="report"><i class="bi bi-file-bar-graph-fill"></i> Report</a>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>