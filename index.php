<?php
  $imgset = $_GET['id'] ?? 1;
  $imgset_count = [1 => 10, 2 => 10, 3 => 8, 4 => 10, 5 => 9];

  $catset = ['Cъёмка в студии', 'Групповая прогулочная съемка', 'Прогулочная фотосессия', 'LOVE STORY', 'Индивидуальная съемка в студии'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gallery</title>
  <link rel="icon" type="image/png" href="fav.png" />
  <!-- <link rel="shortcut icon" href="#" /> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/underline.css">
  <link rel="stylesheet" href="css/modal.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
  <link rel="stylesheet" href="css/slider.css">

</head>

<body>
<div id="openModal" class="modal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Заголовок</h3>
        <a href="#close" title="Close" class="close">×</a>
      </div>
      <div class="modal-body">    
        <ul>
      <li>Содержание</li>
      <li>Содержание</li>
      <li>Содержание</li>
      <li>Содержание</li>
    </ul>
      </div>
    </div>
  </div>
</div>
<div class="logo">
  <a class="underline" href="#openModal">Запись на съёмку</a>
</div>

<h2 class="title">Gallery of photographer Andriana Kuznetsova</h2> 
<nav>
  <ul>
    <?php
      foreach ($catset as $key => $value) {
        $k = $key+1;
        echo "
        <li>
          <a class='underline " . ($k == $imgset ? "highlighted" : "")  . "' href='?id=$k'>$value</a>
        </li>
        ";
    }
    ?>
  </ul>
</nav>

<section class="gallery">
  <a class="close-slider underline">Закрыть</a>
  <div class="gallery-list">
  <?php
    for ($i = 1; $i <= $imgset_count[$imgset]; $i++) { 
      echo("
      <a href='img$imgset/$i.jpg' target='black' class='gallery-item'>
        <div class='gallery-item-hover' alt='$i'>Посмотреть</div>
        <img src='img$imgset/$i.jpg'>
      </a>
      ");
    }
  ?>
  </div>
  <div class="swiper-button-next"></div>
  <div class="swiper-button-prev"></div>
  <!-- <div class="swiper-pagination"></div> -->
</section>

<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script> 
<script src="js/main.js"></script>
</body>
</html>