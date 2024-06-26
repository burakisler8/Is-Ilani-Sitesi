

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kariyer Hedefi</title>
    <style>
        /* Kayıt ve Giriş Butonları */
.header .auth-buttons {
    display: flex;
    gap: 1rem;
}

.header .auth-buttons a {
    padding: 0.8rem 1.5rem;
    font-size: 1.6rem;
    border: none;
    background-color: var(--main-color);
    color: white;
    border-radius: 2rem;
    cursor: pointer;
}

.header .auth-buttons a:hover {
    background-color: #2980b9;
}
        </style>
</head>
<body>

<header class="header">  
    <a href="index.php" class="logo">
        <img src="logo.png" alt="logo" />
    </a>
    <nav class="navbar">
        <a href="index.php" class="active">ANASAYFA</a>
        <a href="profil.php">PROFİL</a>
        <a href="cv.php">CV ÖRNEĞİ</a>
        <a href="yardim.php">YARDIM</a>
        <div class="auth-buttons">
            <a href="index1.php?id=kayit" class="button">KAYIT OL</a>
            <a href="index1.php" class="button">GİRİŞ</a>
        </div>
    </nav>
</header>

<section class="ANASAYFA">
    <div class="content">
        <br><br><br><br><br><br>
        <br><br><br><br><br><br>
        <h3>İş İlanları</h3>
        <br><br><br><br><br><br>
        <p>Burada son eklenen iş ilanlarını bulabilirsiniz. İlginizi çekenleri inceleyerek başvuruda bulunabilirsiniz.</p>
        <br><br><br><br><br><br>
        <div class="ilanlar">
            <!-- İş ilanlarını listeleyen PHP kodu -->
            <?php
include("baglanti.php");

            // İş ilanlarını veritabanından çek
            $sql = "SELECT * FROM isler";
            $result = $baglanti->query($sql);

            if ($result->num_rows > 0) {
                // Veritabanından gelen her bir iş ilanı için HTML oluştur
                while ($row = $result->fetch_assoc()) {
                    echo '<div class="ilan">';
                    echo '<h4>' . $row["baslik"] . '</h4>';
                    echo '<p>Açıklama: ' . $row["aciklama"] . '</p>';
                    echo '<p>Yayın Tarihi: ' . $row["tarih"] . '</p>';
                    // İlgili resmi eklemek için:
                    // echo '<img src="' . $row["resim_url"] . '" alt="' . $row["baslik"] . '">';
                    echo '</div>';
                }
            } else {
                echo "İş ilanı bulunamadı.";
            }

            // Veritabanı bağlantısını kapat
            $baglanti->close();
            ?>
        </div>
    </div>
</section>
<section class="footer">

    <div class="share">
        <a href="#" class="fab fa-facebook"> </a>
        <a href="#" class="fab fa-twitter"> </a>
        <a href="#" class="fab fa-instagram"> </a>
        <a href="#" class="fab fa-linkedin"> </a>
        <a href="#" class="fab fa-github"> </a>
    </div>

    <div class="links">
        <a href="index.php" class="active">ANASAYFA</a>
        <a href="profil.php">PROFİL</a>
        <a href="cv.php">CV ÖRNEĞİ</a>
        <a href="yardim.php">YARDIM</a>
    </div>
    <div class="credit">
        created by <span>Tuğçe Yaşar | Ayşenur Ceren Öztürk| Süleyman Demir| Batuhan Sevin| Burak İşler</span> | all rights reserved
    </div>
</section>
</body>
</html>

