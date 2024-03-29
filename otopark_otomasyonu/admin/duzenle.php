<?php require 'header.php'; ?>

    <div class="container container-duzen">
        <?php 
            $duzenle = $db -> query("SELECT * FROM arac_kayit WHERE arac_id=".(int)$_GET['id']);
            $sonuc = $duzenle -> fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="card p-5">
            <form action="" method="post">
                <?php
                    if ($_POST) {
                        $plaka = $_POST['arac_plaka'];
                        $kat = $_POST['arac_kat'];
                        $blok = $_POST['arac_blok'];

                        if (isset($_POST['gerigel'])) {
                            echo '<div class="alert alert-danger text-center" role="alert">
                            <strong> İşlem Yapılmadı </strong></div>';
                            header('Refresh:2; parkedenarac.php');
                        }

                        elseif ($plaka<>"" && $kat<>"" && $blok<>"") {
                            if ($db -> query("UPDATE arac_kayit SET arac_plaka = '$plaka', arac_kat = '$kat', arac_blok = '$blok' WHERE arac_id=".$_GET['id']));{
                                echo '<div class="alert alert-success text-center" role="alert">
                                <strong> İşlem Başarılı </strong></div>';
                                header('Refresh:2; parkedenarac.php');
                            }
                        }
                    }
                ?>
                <table class="table">
                    <tr>
                        <h1 class="text-center">Araç Düzenle</h1>
                        <td><b style="color:#3498DB; font-weight: 600;">Araç Plaka</b><br><b><?php echo $sonuc['arac_plaka'] ?></b> <input type="text" name="arac_plaka" class="form-control" value="<?php echo $sonuc['arac_plaka'] ?>"></td>
                    </tr>
                    <tr>
                        <td>
                            <b><b style="color:#3498DB; font-weight: 600;">Bulunduğu Kat</b><br><?php echo $sonuc['arac_kat'] ?></b>
                            <div class="mb-3">
                            <select name="arac_kat" class="form-control mb-3" style="font-weight:bold; font-size:16px;"><br>
                                <option value="<?php echo $sonuc['arac_kat']?>">Değiştirmek İçin Tıklayın</option>
                                <option value="Kat 1">Kat 1</option>
                                <option value="Kat 2">Kat 2</option>
                                <option value="Kat 3">Kat 3</option>
                            </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <b><b style="color:#3498DB; font-weight: 600;">Bulunduğu Blok</b><br> <?php echo $sonuc['arac_blok'] ?></b>
                            <div class="mb-3">
                            <select name="arac_blok" class="form-control mb-3" style="font-weight:bold; font-size:16px;"><br>
                                <option value="<?php echo $sonuc['arac_blok']?>">Değiştirmek İçin Tıklayın</option>
                                <option value="A Blok">A Blok</option>
                                <option value="B Blok">B Blok</option>
                                <option value="C Blok">C Blok</option>
                                <option value="D Blok">D Blok</option>
                                <option value="E Blok">E Blok</option>
                            </select>
                            </div>
                        </td>
                    </tr>
                </table>
                <button type="submit" name="gerigel" class="btn bg-danger" style="color: #fff; font-size:20px;"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-bar-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M12.5 15a.5.5 0 0 1-.5-.5v-13a.5.5 0 0 1 1 0v13a.5.5 0 0 1-.5.5ZM10 8a.5.5 0 0 1-.5.5H3.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L3.707 7.5H9.5a.5.5 0 0 1 .5.5Z"/>
                </svg>Geri Gel</button>
                <button type="submit" class="btn bg-primary" style="color: #fff; float: right; font-size:20px;" name="kaydet">Kaydet</button>
            </form>
        </div>
    </div>

<?php require 'footer.php'; ?>