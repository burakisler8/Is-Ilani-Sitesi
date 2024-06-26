<?php
include("baglanti.php");

function anasayfa()
{
    echo "<h1>Hoşgeldin Admin!</h1>";
}

// İş Ekleme Formu
function isForm()
{
    echo '<form action="index3.php?id=iskaydet" method="post" enctype="multipart/form-data">
    <div align="center">
        <table>
            <tr>
                <td colspan="2"><h1 style="color:#25373D;">İş Ekleme</h1></td>
            </tr>
            <tr>
                <td>İş Başlığı</td>
                <td>:</td>
                <td><input type="text" name="baslik" id="baslik"></td>
            </tr>
            <tr>
                <td>İş Açıklaması</td>
                <td>:</td>
                <td><textarea name="aciklama" id="aciklama" cols="20" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>İş Ekleme Tarihi</td>
                <td>:</td>
                <td><input type="date" name="tarih" id="tarih"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Kaydet"></td>
            </tr>
        </table>
    </div>
    <hr>
    </form>';
}

// İş Listeleme Fonksiyonu
function isListele()
{
    global $baglanti;
    $query = "SELECT * FROM isler";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));

    echo '<table border="1" align="center" style="width:100%;">
    <tr>
        <td colspan="6">
            <h1 style="color:#25373D;">İşler</h1>
        </td>
    </tr>';
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $baslik = $row['baslik'];
        $aciklama = $row['aciklama'];
        $tarih = $row['tarih'];

        echo '<tr>
        <td>'.$id.'</td>
        <td>'.$baslik.'</td>
        <td>'.$aciklama.'</td>
        <td>'.$tarih.'</td>
        <td><a href="index3.php?id=isduzenle&isid='.$id.'">Düzenle</a></td>
        <td><a href="index3.php?id=issil&isid='.$id.'">Sil</a></td>
        </tr>';
    }
    echo '</table>';
}

// İş Güncelleme Fonksiyonu
function isGuncelle()
{
    global $baglanti;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id']) && $_GET['id'] == 'isguncelle') {
        if (isset($_POST['id'], $_POST['baslik'], $_POST['aciklama'], $_POST['tarih'])) {
            $id = mysqli_real_escape_string($baglanti, $_POST['id']);
            $baslik = mysqli_real_escape_string($baglanti, $_POST['baslik']);
            $aciklama = mysqli_real_escape_string($baglanti, $_POST['aciklama']);
            $tarih = mysqli_real_escape_string($baglanti, $_POST['tarih']);

            $query = "UPDATE isler SET baslik='$baslik', aciklama='$aciklama', tarih='$tarih' WHERE id='$id'";
            $result = mysqli_query($baglanti, $query);

            if ($result) {
                echo "<p align='center'>Güncelleme başarılı</p>";
                echo '<meta http-equiv="refresh" content="3;url=index3.php?id=isler">';
            } else {
                echo "Güncelleme başarısız: " . mysqli_error($baglanti);
            }
        } else {
            echo "Lütfen tüm alanları doldurun.";
        }
    }

    echo '<form action="index3.php?id=isguncelle" method="post" enctype="multipart/form-data">
    <div align="center">
        <table>
            <tr>
                <td colspan="2"><h1 style="color:#25373D;">İş Güncelleme</h1></td>
            </tr>
            <tr>
                <td>İD</td>
                <td>:</td>
                <td><input type="text" name ="id" id= "id"> </td>
            </tr>
            <tr>
                <td>İş Başlığı</td>
                <td>:</td>
                <td><input type="text" name="baslik" id="baslik"></td>
            </tr>
            <tr>
                <td>İş Açıklaması</td>
                <td>:</td>
                <td><textarea name="aciklama" id="aciklama" cols="20" rows="10"></textarea></td>
            </tr>
            <tr>
                <td>İş Ekleme Tarihi</td>
                <td>:</td>
                <td><input type="date" name="tarih" id="tarih"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="Güncelle"></td>
            </tr>
        </table>
    </div>
    <hr>
    </form>';
}

// İş Silme Fonksiyonu
function isSil()
{
    global $baglanti;

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
        $id = mysqli_real_escape_string($baglanti, $_POST['id']);
        $query = "DELETE FROM isler WHERE id='$id'";
        $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));

        if ($result) {
            echo "<p align='center'>Silme başarılı</p>";
            echo '<meta http-equiv="refresh" content="3;url=index3.php?id=isler">';
        } else {
            echo "Silme başarısız: " . mysqli_error($baglanti);
        }
    }

    echo '<form action="index3.php?id=issil" method="post" enctype="multipart/form-data">
    <div align="center">
        <table>
            <tr>
                <td colspan="2"><h1 style="color:#25373D;">İş Silme</h1></td>
            </tr>
            <tr>
                <td>İD</td>
                <td>:</td>
                <td><input type="text" name="id" id="id"></td>
            </tr>
            <tr>
                <td colspan="3"><input type="submit" value="SİL"></td>
            </tr>
        </table>
    </div>
    <hr>
    </form>';
}
//profili olan herkesin bilgileri burada kalıcak
function profil()
{
    global $baglanti;
    $query = "SELECT * FROM users";
    $result = mysqli_query($baglanti, $query) or die(mysqli_error($baglanti));

    echo '<table border="1" align="center" style="width:100%;">
    <tr>
        <td colspan="8">
            <h1 style="color:#25373D;">Kullanıcı Profil Listesi</h1>
        </td>
    </tr>
    <tr>
        <th>ID</th>
        <th>Ad</th>
        <th>Email</th>
        <th>Meslek</th>
        <th>Deneyim</th>
        <th>Adres</th>
        <th>İletişim</th>
        <th>Üye Id numarası</th>
    </tr>';
    while ($row = mysqli_fetch_array($result)) {
        $id = $row['id'];
        $name = $row['name'];
        $email = $row['email'];
        $job = $row['job'];
        $experience = $row['experience'];
        $address = $row['address'];
        $contact = $row['contact'];
        $uye_id = $row['uye_id'];

        echo '<tr>
        <td>'.$id.'</td>
        <td>'.$name.'</td>
        <td>'.$email.'</td>
        <td>'.$job.'</td>
        <td>'.$experience.'</td>
        <td>'.$address.'</td>
        <td>'.$contact.'</td>
        <td>'.$uye_id.'</td>
        </tr>';
    }
    echo '</table>';
}

// İş Kaydetme İşlemi
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id']) && $_GET['id'] == 'iskaydet') {
    if (isset($_POST['baslik'], $_POST['aciklama'], $_POST['tarih'])) {
        global $baglanti;
        $baslik = mysqli_real_escape_string($baglanti, $_POST['baslik']);
        $aciklama = mysqli_real_escape_string($baglanti, $_POST['aciklama']);
        $tarih = mysqli_real_escape_string($baglanti, $_POST['tarih']);

        // İş ekleme sorgusu
        $query = "INSERT INTO isler (baslik, aciklama, tarih) VALUES ('$baslik', '$aciklama', '$tarih')";
        $result = mysqli_query($baglanti, $query);

        if ($result) {
            echo "İş başarıyla eklendi.";
        } else {
            echo "İş eklenirken bir hata oluştu: " . mysqli_error($baglanti);
        }
    } else {
        echo "Lütfen tüm alanları doldurun.";
    }
}
?>
