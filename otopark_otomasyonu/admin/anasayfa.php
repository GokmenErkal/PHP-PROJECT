<?php require 'header.php'; ?>

<div id="container" class="container p-5">
    <div class="card p-5">
        <div class="form">
        <?php
            if (isset($_POST['kaydet'])) {
                $arac_plaka = $_POST['arac_plaka'];
                $arac_kat = $_POST['arac_kat'];
                $arac_blok = $_POST['arac_blok'];

                if (! $arac_plaka || ! $arac_kat || ! $arac_blok) {
                    echo '<div class="alert alert-danger text-center" role="alert">
                    <strong> Boş Alan Bırakmayınız </strong></div>';
                    header('Refresh:2; anasayfa.php');
                }
                else {
                    $kaydet = $db -> prepare('INSERT INTO arac_kayit SET
                    
                    arac_plaka = ?,    
                    arac_kat = ?,
                    arac_blok = ?
                    ');

                    $kaydet -> execute([$arac_plaka, $arac_kat, $arac_blok]);
                    
                    if ($kaydet) {
                        echo '<div class="alert alert-primary text-center" role="alert">
                        <strong> Kayıt Başarılı </strong></div>';
                        header('Refresh:2; parkedenarac.php');
                    }
                }
            }
        ?>
            <h1 class="text-center mb-5">Araç Kayıt</h1>
            <form action="anasayfa.php" method="post">
                <input type="text" name="arac_plaka" class="form-control" placeholder="Plaka Giriniz"><br>
                
                <select name="arac_kat" class="form-control"><br>
                    <option value="">Kat Seçiniz</option>
                    <option value="Kat 1">Kat 1</option>
                    <option value="Kat 2">Kat 2</option>
                    <option value="Kat 3">Kat 3</option>
                </select><br>
                
                <select name="arac_blok" class="form-control"><br>
                    <option value="">Blok Seçiniz</option>
                    <option value="A Blok">A Blok</option>
                    <option value="B Blok">B Blok</option>
                    <option value="C Blok">C Blok</option>
                    <option value="D Blok">D Blok</option>
                    <option value="E Blok">E Blok</option>
                </select><br>
                <div class="text-center">
                    <button type="reset" class="btn bg-danger">Sıfırla</button>
                    <button type="submit" name="kaydet" class="btn bg-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
