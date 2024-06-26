<?php
// Hata raporlamayı etkinleştir
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("baglanti.php");

// POST ile gelen veriler
$gmail = $_POST["eposta"] ?? null;
$gsifre = $_POST["parola"] ?? null;

// Kullanıcının email'ini kullanarak uygun kategoriyi al
$query = "SELECT * FROM uyeler WHERE email = ?";
$stmt = $baglanti->prepare($query);
$stmt->bind_param("s", $gmail);
$stmt->execute();
$result = $stmt->get_result();
$num_row = $result->num_rows;
$row = $result->fetch_assoc();

if ($num_row >= 1) {
    if ($gsifre == $row['sifre']) {
        session_start();
        $_SESSION["ad"] = $row['ad'];
        $_SESSION["soyad"] = $row['soyad'];
        $_SESSION["mail"] = $gmail;
        $_SESSION["uye_id"] = $row['id'];

        // Kid'e göre yönlendirme yap
        if ($row['kid'] == 1) { // İş arayan
            header("Location: index.php");
        } elseif ($row['kid'] == 6) { // İş veren
            header("Location: index2.php");
        }
        exit(); // Yönlendirme sonrası scripti sonlandır
    } else {
        echo '<br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
        echo "Yanlış şifre girişi. Kullanıcı girişine yönlendiriliyorsunuz";
        header("Refresh:5;url=index1.php?id=giris");
        exit();
    }
} else {
    echo '<br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
    echo "Mailiniz hatalı. Kullanıcı girişine yönlendiriliyorsunuz";
    header("Refresh:5;url=index1.php?id=giris");
    exit();
}
?>
