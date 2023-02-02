<?php
  require 'baglan.php';
  
  $kullanicicek = $db -> prepare('SELECT * FROM kullanici_giris WHERE mail=:mail');
  $kullanicicek -> execute([
    'mail' => $_SESSION['mail']
  ]);

  $say = $kullanicicek -> rowCount();
  $kaydet = $kullanicicek -> fetch(PDO::FETCH_ASSOC);

  if($say == 0){
    header('location:index.php?izinsizgiris');
  }
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Otopark Otomasyonu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body{
          background-image: url("image/pic-3.png");
          background-repeat: no-repeat;
          background-position: center center;
          background-attachment: fixed;
          background-size: cover;
        }
        .container{
            margin-top: 4rem;
            width: 45%;
        }
        .text-center button{
            color: #fff;
        }
        .navbar{
            background: #503BFF;
        }
        .container-duzenle{
            width:32%
        }

        .container-duzen{
          margin-top: 10px;
          margin-bottom: 15px;
          opacity: .9;
        }

        .table{
          margin:auto;
          width: 80%;
          opacity: .9;
        }

        .container-cikis{
          width: 40%;
          opacity: .9;
        }

        #container{
          opacity: .9;
          margin-top: auto;
        }
     
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="anasayfa.php">Anasayfa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="parkedenarac.php">Park Durumu</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0" method="post" action="parkedenarac.php">
      <input class="form-control mr-sm-2" type="search" placeholder="Arama yap" name="bul" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit" style="margin:10px">Arama</button>
      <button type="submit" name="cikis" class="btn bg-danger" style="color: #fff;">Çıkış Yap</button>
    </form>
  </div>
</nav>
<br>

<?php
  if (isset($_POST['bul'])) {
    $bul = $_POST['bul'];
    if (!$bul) {
      echo '<div class="alert alert-success text-center" role="alert">
      <strong> Arama Yapmak İçin Birşeyler Yazınız </strong></div>';
      header('Refresh:2; parkedenarac.php');
    }
    else {
      $plakabul = $db -> prepare('SELECT * FROM arac_kayit WHERE arac_plaka LIKE :arac_plaka');
      $plakabul -> execute(array(':arac_plaka' => '%'.$bul.'%'));
      if ($plakabul -> rowCount()) {
        foreach ($plakabul as $plaka) {
          echo '<div class="alert alert-success text-center" role="alert">'.
          $plaka['arac_plaka'].'
          <strong>Araç Daha Çıkış Yapmadı</strong></div>';
          header('Refresh:9; parkedenarac.php');
        }
      } 
      else {
        echo '<div class="alert alert-primary text-center" role="alert">
        <strong> Girilen Plaka Otoparkta Yoktur </strong></div>';
        header('Refresh:9; parkedenarac.php');
      }
    }
  }

  if (isset($_POST['cikis'])) {
    header('location:exit.php');
  }
?>
