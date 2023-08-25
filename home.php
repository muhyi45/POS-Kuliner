<?php
include "proses/connect.php";
$query = mysqli_query($conn, "SELECT * FROM tb_daftar_menu");
while ($row = mysqli_fetch_array($query)){
    $result[] = $row;
}
?>


<div class="col-lg-9 mt-2">
    <!---- Carousel ----->
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel"> 
  <div class="carousel-indicators">
    <?php
    $slide = 0 ;
    $firstSlideButton = true;
    foreach ($result as $dataTombol){
        ($firstSlideButton) ? $aktif = "active" : $aktif = "";
        $firstSlideButton = false;
    ?>
    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $slide ?>" class="<?php echo $aktif ?>" aria-current="true" aria-label="Slide <?php echo $slide+1 ?>"></button>
    <?php 
    $slide ++;
    }
    ?>
  </div>
  <div class="carousel-inner rounded">
    <?php
        $firstSlide = true;
        foreach ($result as $data){
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
                <div class="card mt-4 border-0 bg-light">
                    <div class="card-header text-center">
                        Home
                    </div>
                    <div class="card-body text-center">
                        <h5 class="card-title">Ini adalah Bagian Home</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content. Lorem ipsum dolor sit amet consectetur adipisicing elit. Impedit ipsam possimus harum molestiae, amet odio minima hic laboriosam ad delectus? Voluptatem amet ea illo ullam ut repudiandae, explicabo modi eum fugiat! Dolores, voluptates. Placeat, fugit iure saepe nostrum asperiores obcaecati vel odit, aspernatur nam debitis sed, ex provident corrupti sint.</p>
                        <a href="order" class="btn btn-primary">Buat Order</a>
                    </div>
                </div>
            </div>