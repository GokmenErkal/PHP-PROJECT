<?php
  require 'baglan.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <title>Otopark Otomasyonu</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="admin.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
      
      body{
        background-image: url("image/bg.jpg");
        background-repeat: no-repeat;
        background-position: center center;
        background-attachment: fixed;
        background-size: cover;
      }

      #container{
        width: 500px;
        height: 200px;
        margin-top: 100px;
        opacity: 0.9;
      }

      .container{
        width: 30%;
        margin-top:2rem;
      }

      #baslik{
        padding: 15px 0;
        margin-bottom: 25px;
        border: 1px solid #000;
        background: #211572;
        text-align: center;
        color: #fff;
        border-radius: 15px;
      }
      .text-center h1{
        padding: 1rem;
      }
      .text-center h2{
        margin-bottom: 15px;
      }
      .btn{
        color: #fff;
      }
      
      
    </style>
  </head>
  <body>
      <header>
          <div id="container" class="container p-4">
            <div id="baslik" class="text-center"><h2>OTOPARK OTOMASYONU</h2></div>
            <div class="card p-5">
                <div class="from">
                    <?php
                      if(isset($_POST['giris'])){
                        $mail = $_POST['mail'];
                        $sifre = $_POST['sifre'];
                        
                        $sorgu = $db -> prepare('SELECT * FROM kullanici_giris WHERE mail=:mail and sifre=:sifre');
                        $sorgu -> execute([
                          'mail' => $mail,
                          'sifre' => $sifre
                        ]);
                        $say = $sorgu -> rowCount();
                        if($say == 1){
                          $_SESSION['mail'] = $mail;
                          echo '<div class="alert alert-primary text-center" role="alert">
                          <strong> Giriş Başarılı </strong></div>';
                          header('Refresh:2; anasayfa.php');
                        }
                        else{
                          echo '<div class="alert alert-danger text-center" role="alert">
                          <strong> Giriş Bilgileri Hatalı </strong></div>';
                          header('Refresh:2; index.php');
                        }
                      }
                    ?>
                    <div class="text-center"><h2>Giriş Yapınız</h2></div>
                    <form action="index.php" method="post">
                        <div class="mb-3">
                            <input type="email" name="mail" class="form-control" placeholder="Mail Giriniz"><br>
                            <input type="password" name="sifre" class="form-control" placeholder="Şifre Giriniz"><br>
                            <div class="text-center">
                              <input type="submit" class="btn bg-primary" name="giris">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
          </div>
      </header>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>