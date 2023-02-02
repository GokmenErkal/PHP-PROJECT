<?php require 'header.php';?><br>
<?php 
$saatbasiucret = 5;
?>
<table class="table table-dark text-center"> 
  <thead>
    <tr>
      <th scope="col">Sıra</th>
      <th scope="col">Plaka</th>
      <th scope="col">Kat</th>
      <th scope="col">Blok</th>
      <th scope="col">Giriş Tarihi</th>
      <th scope="col">Çıkış Tarihi</th>
      <th scope="col">Ücret</th>
      <th scope="col">Düzenle</th>
      <th scope="col">Araç Çıkış</th>
      <th scope="col">Kayıt Sil</th>
    </tr>
  </thead>

  <?php
    if (isset($bul)) {
      
      $kaydet = $db -> prepare('SELECT * FROM arac_kayit WHERE arac_plaka LIKE :arac_plaka');
      $kaydet -> execute(array(':arac_plaka' => '%'.$bul.'%'));
    } else {
      $kaydet = $db -> query('SELECT * FROM arac_kayit');
    }
    
    $sira = 0;
    foreach ($kaydet as $kayit) {
      $sira = ++ $sira;
      $id = $kayit['arac_id'];
      $plaka = $kayit['arac_plaka'];
      $kat = $kayit['arac_kat'];
      $blok = $kayit['arac_blok'];
      $giris_tarihi = $kayit['arac_giris_tarih'];
      $cikis_tarihi = $kayit['arac_cikis_tarih']; 
      $timestamp1 = strtotime($giris_tarihi);
      $timestamp2 = strtotime($cikis_tarihi);
  ?>
  <tbody class="text-center">
    <tr>
      <th style="background-color: white; color: black;"><?php echo $sira?></th>
      <td><?php echo $plaka?></td>
      <td><?php echo $kat?></td>
      <td><?php echo $blok?></td>
      <td><?php echo $giris_tarihi?></td>
      <td><?php echo $cikis_tarihi?></td>
      <td><?php echo ( abs($timestamp2 - $timestamp1)/(60*60) ) * $saatbasiucret;?></td>
      <td><a href="duzenle.php?id=<?php echo $id?>"><button type="submit" class="btn bg-primary" style="color: #fff;">Düzenle</button></a></td>
      <td><a href="araccikis.php?id=<?php echo $id?>"><button type="submit" class="btn bg-success" style="color: #fff;">Araç Çıkış</button></a></td>
      <td><a href="sil.php?id=<?php echo $id?>"><button type="submit" class="btn bg-danger" style="color: #fff;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
  <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
</svg></button></a></td>
    </tr>
  </tbody>
  <?php
  }
  ?>
</table>

<?php require 'footer.php'; ?>
