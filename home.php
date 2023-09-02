<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu");
while ($row = mysqli_fetch_array($query)) {
    $result[] = $row;
}
?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<div class="col-lg-9 mt-2" style="background-color:#f3ddd7;">
    <!---- Carousel ----->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $slide = 0;
            $firstSlideButton = true;
            foreach ($result as $dataTombol) {
                ($firstSlideButton) ? $aktif = "active" : $aktif = "";
                $firstSlideButton = false;
            ?>
                <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide + 1 ?>"></button>
            <?php
                $slide++;
            }
            ?>
        </div>
        <div class="carousel-inner rounded">
            <?php
            $firstSlide = true;
            foreach ($result as $data) {
                ($firstSlide) ? $aktif = "active" : $aktif = "";
                $firstSlide = false;

            ?>
                <div class="carousel-item <?php echo $aktif ?>">
                    <img src="asset/img/<?php echo $data['foto'] ?>" class="img-fluid w-100" alt="..." style="height: 250px; width: 1000px; object-fit:cover">
                    <div class="carousel-caption d-none d-md-block">
                        <h5><?php echo $data['nama_menu'] ?></h5>
                        <p><?php echo $data['keterangan'] ?></p>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!---- Akhir Carousel ----->



    <!----- Judul ----->
    <div class="card mt-4 border-0" style="background-color:#a4826e">
        <div class="card-header text-center">
            Home
        </div>
        <div class="card-body text-center">
            <h5 class="card-title">Sistem Informasi Kuliner</h5>
            <p class="card-text">Rumah makan adalah istilah umum untuk menyebut usaha gastronomi yang menyajikan hidangankepada masyarakat dan menyediakan tempat untuk menikmati hidangan tersebut serta menetapkan tarif tertentu untuk makanan dan pelayanannya. Sistem Informasi Restoran merupakan serangkaian sistem yang digunakan untuk menunjang atau mendukung kelancaran penyimpanan data-data penjualan menu makanan. Tujuan perancangan sistem ini yaitu memberikan kemudahan bagi instansi khususnya di bidang restoran dalam pengimpanan nota-nota struk penjualan menu makanan.
</p>
            <a href="order" class="btn" style="background-color: #664b4a; color:#fef2e7">Buat Order</a>
        </div>
    </div>
    <!------ Akhir Judul ------->


    <!----- Grafik ----->
    <!-- <div class="card mt-4 border-0 bg-light">
        <div class="card-header text-center">
            Home
        </div>
        <div class="card-body text-center">
            <div>
                <canvas id="myChart"></canvas>
            </div>
            <script>
                const ctx = document.getElementById('myChart');

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                        datasets: [{
                            label: 'Jumlah Porsi Terjual',
                            data: [12, 19, 3, 5, 2, 3],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });
            </script>
        </div>
    </div> -->
    <!------ Akhir Grafik ------->
</div>