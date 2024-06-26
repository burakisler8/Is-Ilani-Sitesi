<?php
error_reporting(E_ALL);
session_start(); // Oturumu başlat
// Oturum kontrolü yaparak kullanıcının giriş yapmış olup olmadığını kontrol edin
if (isset($_SESSION['uye_id'])) { // "uye_id" olarak değiştirildi
    // Kullanıcı giriş yapmışsa, kullanıcı bilgilerini veritabanından çekin

    // Veritabanı bağlantısını yapın (baglanti.php dosyası gibi)
    include('baglanti.php');

    // Kullanıcı bilgilerini sorgulayın
    $uye_id = $_SESSION['uye_id']; // Oturumda saklanan kullanıcı kimliği
    $query = "SELECT * FROM users WHERE uye_id = ?";
    $stmt = $baglanti->prepare($query);
    $stmt->bind_param("i", $uye_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Kullanıcı bilgilerini HTML formunda göstermek için döngü kullanın
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            ?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Sayfası ve Şirket Yorumları</title>
    <link rel="stylesheet" href="style.css">
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
        body {
            background-color: lightblue; /* Açık mavi arka plan rengi */
            font-size: 15px; /* Body fontunu 20px olarak ayarla */
        }
        h1, h2, .home-link a, .review h3, .profile-form input[type='submit'], .review-form input[type='submit'] {
            color: navy; /* Lacivert yazı rengi */
        }
        .center {
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .profile-section, .review-form {
            margin: 20px;
        }
        .profile-container, .review {
            background-color: white;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
        }
        .profile-container2, .review {
            background-color: #99CCFF;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        .profile-container3, .review {
            background-color: #99CCFF;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 1000px;
        }
        .profile-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <a href="index1.php?id=giris" class="button">GİRİŞ</a>
        </div>
    </nav>
</header>
<div class="center">
<section class="profile-section">
    <div class="profile-container">
        <div class="profile-photo">
            <img src="profile-photo.jpeg" alt="Profil Fotoğrafı">
        </div>
        <div class="profile-info">
            <h1>Berna Tektaş</h1>
            <p><strong>Pozisyon:</strong> Web Geliştirici</p>
            <p><strong>E-posta:</strong> ornek@example.com</p>
            <p><strong>Telefon:</strong> +90 555 555 5555</p>
            <h2>CV</h2>
            <p>‍“İstanbul Teknik Üniversitesi Bilgisayar Mühendisliği Bölümü'nden 2015 yılında mezun oldum. Ege Üniversitesi'nde ise Yazılım Mühendisliği Anabilim Dalı'ndaki yüksek lisans eğitimimi tamamladım. Javascript, React, CSS alanlarında tecrübeli bir software geliştiricisiyim. Daha önce içerisinde yer aldığım proje geliştirme süreçleri sayesinde küçük ve orta ölçekli işletmelerin karlılıklarının artmasına katkıda bulundum. Çeşitli sertifika programlarını tamamlayarak front end branşında uzmanlaştım. Ara yüzlerin geliştirilmesini sağlamak için kodlarda düzenlemeler yapıyorum. Kariyerimi bu doğrultuda sürdürmekteyim.”</p>
            <p>Web Geliştirme Uzmanı
                2019 Ocak - Günümüz
                H&M
                Cross Browser ve Responsive kodlama yetkinliklerinden sistem ara yüzünü iyileştirmek için yararlanma
                CSS Framework (Bootstrap, Foundation, Semantic UI, Flex) yapılarından projede faydalanmak
                Bir Javascript Framework’ü olan VueJS üzerinde online satış platformunda düzenleme yapmak için uygulama geliştirme‍
            </p>
            <br><br>
            <p>Web Geliştirme Uzmanı
                2017 Mayıs - 2019 Ocak
                Beymen
                HTML, CSS3 gibi Beymen’in Personel Giriş Paneli’nde kullanılan Javascript araçlarıyla panelde düzenleme yapma
                Bir Cross Platform Mobile Network örneği olan React Native’i kullanarak Beymen’in mobil uygulamasını geliştirme
                NPM ve Yarn gibi paket yöneticilerinden istifade etme böylece ortak kullanılan yazılımların her araçta güncel kalmasını sağlama
            </p>
            <br><br>
            <p>Web Geliştirme Uzmanı
                2015 Nisan - 2017 Mayıs
                Pırıl Yatırım Menkul Değerler
                Mobil uygulamaları ve web siteleri için kullanıcı dostu arayüzler geliştirme ve bunların işlerliğini test etme
                HTLM5 / CSS3, JavaScript, Bootstrap araçlarından faydalanarak ön uç tasarım formatına uyarlamak
                Projenin akışında kullanıcı deneyimini pozitif yönde etkileyecek pratik ve yaratıcı özellikler kazandırma
            </p>
            <br><br>
            <p>Web Geliştirme Uzmanı
                2014 Ocak - 2015 Nisan
                Beykent Üniversitesi
                Front-End geliştirilmesi üzerine olan web sitesi, öğrenci bilgi sistemi, mobil uygulama gibi mevcut projelerden sorumlu olma
                Grafik görselleri ile HTML, CSS ve Javascript bazlı etkileşim tasarımlarını yorumlama
                Teknik raporlama, projenin durumunu üst düzey yöneticilere ve müşterilere sözlü olarak bildirme
            </p>
            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        </div>
    </div>
</section>
<div class="profile-container2">
    <h2>Kullanıcı Bilgileri</h2>
    <p>ID: <?php echo $row["id"]; ?></p>
    <p>Ad: <?php echo $row["name"]; ?></p>
    <p>E-posta: <?php echo $row["email"]; ?></p>
    <p>İş: <?php echo $row["job"]; ?></p>
    <p>Deneyim: <?php echo $row["experience"]; ?></p>
    <p>Adres: <?php echo $row["address"]; ?></p>
    <p>İletişim: <?php echo $row["contact"]; ?></p>
    <a href="profilguncelsil.php"><input type="submit" name="ekle" value="Bilgilerim"></a>
</div>
<div class="review-form">
    <h1>Şirket Yorumları</h1>
    <h2>Yorum Yap</h2>
    <form id="reviewForm">
        Şirket Adı: <input type="text" name="company_name" required><br>
        Yorumunuz: <textarea name="review" required></textarea><br>
        <input type="submit" value="Yorum Gönder">
    </form>
    <h2>Yapılan Yorumlar</h2>
    <div id="reviewList">
    <?php
    $commentsFile = 'comments.json';
    if (file_exists($commentsFile)) {
        $comments = json_decode(file_get_contents($commentsFile), true);
        if ($comments) {
            foreach ($comments as $comment) {
                echo "<div class='review'>";
                echo "<h3>" . htmlspecialchars($comment['company_name']) . "</h3>";
                echo "<p>" . htmlspecialchars($comment['review']) . "</p>";
                echo "</div>";
            }
        } else {
            echo "<p>Henüz yorum yapılmamış.</p>";
        }
    } else {
        echo "<p>Henüz yorum yapılmamış.</p>";
    }
    ?>
    </div>
</div>
<script>
$(document).ready(function(){
    $('#reviewForm').on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'submit_review.php',
            data: $(this).serialize(),
            success: function(response){
                var review = JSON.parse(response);
                var newReview = '<div class="profile-container3"><h3>' + review.company_name + '</h3><p>' + review.review + '</p></div>';
                $('#reviewList').prepend(newReview);
                $('#reviewForm')[0].reset();
            }
        });
    });
});
</script>
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
<?php
        }
    } else {
        // HTML çıktısını göndermeden önce yönlendirme yapın
        header("Location: index3.php");
        exit();
    }

    // Veritabanı bağlantısını kapatın
    $baglanti->close();
} else {
    // Kullanıcı giriş yapmamışsa, giriş formunu göster
    header("Location: index1.php?id=giris"); // Kullanıcıyı giriş sayfasına yönlendirin
    exit();
}
?>
