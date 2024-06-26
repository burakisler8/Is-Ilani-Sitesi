<?php
// Hata raporlamayı etkinleştir
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include("baglanti.php");

// Diğer giriş alanlarını al
$gad = $_POST["ad"] ?? null;
$gsoyad = $_POST["soyad"] ?? null;
$gmail = $_POST["eposta"] ?? null;
$gsifre = $_POST["parola"] ?? null;
$kullanici_tipi = $_POST['kullanici_tipi'] ?? null;

// Kullanıcı tipine göre uygun kategori ID'sini belirle
if ($kullanici_tipi === "is_veren") {
    $kategori_id = 6; // İşveren kategorisinin ID'si
} elseif ($kullanici_tipi === "is_arayan") {
    $kategori_id = 1; // İş arayan kategorisinin ID'si
} else {
    die("Geçersiz kullanıcı tipi.");
}

// SQL enjeksiyonunu önlemek için prepare ve bind_param kullanın
$stmt = $baglanti->prepare("INSERT INTO uyeler (ad, soyad, email, sifre, kid) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("ssssi", $gad, $gsoyad, $gmail, $gsifre, $kategori_id);

// Kayıt başarılı ise devam edin, değilse hata mesajı gösterin
if ($stmt->execute()) {
    // Başarılı kayıt durumunda yönlendirme veya mesaj gösterme
    $uye_id = $stmt->insert_id; // Eklenen kaydın ID'sini al
    $stmt->close();

    // Kid değeri 1 ise users tablosuna da kayıt yap
    if ($kategori_id == 1) {
        $stmt_user = $baglanti->prepare("INSERT INTO users (name, email, job, experience, address, contact, uye_id) 
                                         VALUES (?, ?, '', '', '', '', ?)");
        $fullname = $gad . " " . $gsoyad;
        $stmt_user->bind_param("ssi", $fullname, $gmail, $uye_id);

        // Kullanıcı kaydı başarılıysa devam edin, değilse hata mesajı gösterin
        if (!$stmt_user->execute()) {
            echo "Kullanıcı kaydı oluşturulamadı: " . $stmt_user->error;
        }
        $stmt_user->close();
    }
    header("Location: index1.php"); // Kullanıcıyı yönlendir
    exit(); // Yönlendirme sonrası scripti sonlandır
} else {
    echo "Kayıt gerçekleştirilemedi: " . $stmt->error;
}
$baglanti->close();
?>
