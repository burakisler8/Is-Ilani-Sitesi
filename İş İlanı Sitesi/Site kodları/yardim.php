<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Kariyer Hedefi</title>
    <style>
        .yardim{
            background-color: #99CCFF ;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            width: 500px;
            font-size:12px;
        }
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
<br><br>
<section class="yardim">
    <h2>Cv Nasıl Yapılır?</h2>
    <p>CV oluşturmak için <a href="cv.php" target="_blank">CV örnekleri sayfasına</a> göz atabilirsiniz.</p>
    <h2> Bize ulaşın:</h2>
    <a href="tel:+905551234567">+90 (555) 123 45 67</a><br>
    <a href="mailto:örnek@gmail.com">örnek@gmail.com</a>
    <h2>İş verenler için bilgilendirme!</h2>
    <p> İşlemleriniz admin sayfadan yapılmaktadır.Hesabınıza giriş yaparak giriniz.
        Eğer üst menüde admin göremiyorsanız profile tıklayın!
    </p>
</section>
<br><br>
<iframe src="https://www.google.com/maps/embed?pb=!1m10!1m8!1m3!1d194915.6824611143!2d7.641444000000001!3d40.241139!3m2!1i1024!2i768!4f13.1!5e0!3m2!1str!2str!4v1716661295851!5m2!1str!2str" width="1600" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

<br><br>
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