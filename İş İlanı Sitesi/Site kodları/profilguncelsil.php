<?php
session_start();
include('baglanti.php');

if(isset($_POST['ekle'])) {
    // Yeni kullanıcı eklemek için
    $name = $_POST['name'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $equery = "INSERT INTO users (name, email, job, experience, address, contact) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $baglanti->prepare($equery);

    if ($stmt) { 
        $stmt->bind_param("ssssss", $name, $email, $job, $experience, $address, $contact);
        $stmt->execute();
    } else {
        echo "Sorgu hatası: " . $baglanti->error; 
    }
}

if (isset($_POST['update'])) {
    // Kullanıcı bilgilerini güncellemek için
    $user_id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $job = $_POST['job'];
    $experience = $_POST['experience'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];

    $query = "UPDATE users SET name=?, email=?, job=?, experience=?, address=?, contact=? WHERE id=?";
    $stmt = $baglanti->prepare($query);

    if ($stmt) { 
        $stmt->bind_param("ssssssi", $name, $email, $job, $experience, $address, $contact, $user_id);
        $stmt->execute();
    } else {
        echo "Sorgu hatası: " . $baglanti->error; 
    }
}

if (isset($_POST['delete'])) {
    // Kullanıcıyı silmek için
    $user_id = $_POST['id'];
    $query = "DELETE FROM users WHERE id=?";
    $stmt = $baglanti->prepare($query);

    if ($stmt) { 
        $stmt->bind_param("i", $user_id);
        $stmt->execute();
        session_destroy();
        header("Location: index.php");
    } else {
        echo "Sorgu hatası: " . $baglanti->error; 
    }
}
?>

<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Üye Profili Güncelleme ve Silme</title>
    <link rel='stylesheet' href='style.css'>
    <style>
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
            background-color: #c0cfff;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        .profile-container2, .review {
            background-color: #8aa3ff;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 400px;
        }
        .profile-container3, .review {
            background-color: #4d73ff;
            padding: 50px;
            border-radius: 50px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.3);
            width: 1000px;
            width: 400px;

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
    </nav>
</header>
<br><br>
    <div class="center">
    <div class=profile-container>
<form method="post"> 
    <center><h2>Profil Ekle </h2></center><br>
    -> Bilgileriniz mi yok?<br><br>

    Adı: <input type="text" name="name" required><br>
    E-posta: <input type="email" name="email" required><br>
    Meslek: <textarea name="job" required></textarea><br>
    İş Deneyimleri: <textarea name="experience" required></textarea><br>
    Adres: <textarea name="address" required></textarea><br>
    İletişim Yolları: <input type="text" name="contact" required><br>
    <input type="submit" name="ekle" value="Bilgileri Ekle">
</form>
    </div>
    </div>
   <br><br>
    <div class="center">
    <div class="profile-container2">

<form method="post"> <!-- Güncelleme Formu -->
<center><h2> Profil Güncelle </h2></center>
<br>
ID: <input type="text" name="id" required><br>
    Adı: <input type="text" name="name" required><br>
    E-posta: <input type="email" name="email" required><br>
    Meslek: <textarea name="job" required></textarea><br>
    İş Deneyimleri: <textarea name="experience" required></textarea><br>
    Adres: <textarea name="address" required></textarea><br>
    İletişim Yolları: <input type="text" name="contact" required><br>
    <input type="submit" name="update" value="Bilgileri Güncelle">
</form>
    </div>
    </div>
    <br><br>

    <div class="center">
<div class="profile-container3">

<form method="post"> <!-- Silme Formu -->
 <center><h2>Profil sil</h2> </center><br>

    ID: <input type="text" name="id" required><br>
    <input type="submit" name="delete" value="Üyeliği Sil" onclick="return confirm('Üyeliğinizi silmek istediğinizden emin misiniz?');">
</form>
    </div>
    </div>
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
    </div>
    <div class="credit">
        created by <span>Tuğçe Yaşar | Ayşenur Ceren Öztürk| Süleyman Demir| Batuhan Sevin| Burak İşler</span> | all rights reserved
    </div>
</section>

</body>
</html>
