<?php
    try {
        $db = New PDO('mysql:host=localhost; dbname=otopark_otomasyonu', 'root', '');
    } 
    catch (Exception $e) {
        $e -> getMessage();
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
          background: gray;
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

        .con-duzen{
          margin-top: 10px;
          margin-bottom: 15px;
        }

        .table{
          margin:auto;
          width: 80%;
        }
     
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="admin/index.php">Giriş Yapmka İçin Tıklayınız</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
</nav>

<table class="table table-dark text-center">
  <thead>
    <tr>
      <th scope="col">Sıra</th>
      <th scope="col">Plaka</th>
      <th scope="col">Kat</th>
      <th scope="col">Blok</th>
      <th scope="col">Giriş Tarihi</th>
      <th scope="col">Çıkış Tarihi</th>
    </tr>
  </thead>

  <?php
    $kaydet = $db -> query('SELECT * FROM arac_kayit');
    $sira = 0;
    foreach ($kaydet as $kayit) {
      $sira = ++ $sira;
      $id = $kayit['arac_id'];
      $plaka = $kayit['arac_plaka'];
      $kat = $kayit['arac_kat'];
      $blok = $kayit['arac_blok'];
      $giris_tarihi = $kayit['arac_giris_tarih'];
      $cikis_tarih = $kayit['arac_cikis_tarih'];  
  ?>

  <tbody class="text-center">
    <tr>
      <th style="background-color: white; color: black;"><?php echo $sira?></th>
      <td><?php echo $plaka?></td>
      <td><?php echo $kat?></td>
      <td><?php echo $blok?></td>
      <td><?php echo $giris_tarihi?></td>
      <td><?php echo $cikis_tarih?></td>
    </tr>
  </tbody>
  <?php
  }
  ?>
</table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>