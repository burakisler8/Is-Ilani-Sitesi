<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #F0F8FF;
        }

        .navbar {
            background-color: #25373D;
            border-radius: 50px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.3);


        }

        h1, h2 {
            margin: 0;
            padding: 0;
        }

        .logo {
            color: #fff;
        }

        .logo h1 {
            font-size: 3rem;
            letter-spacing: .4rem;
        }

        .logo img{
            
            width: 300px;
            height: 200px;
            border-radius: 50%;
        
        }

        .ust .logo h2 {
            font-size: 2.4rem;
        }

        .container {
            display: flex;
        }

        .sidebar {
            width: 200px;
            background-color: lightblue;
            padding: 20px;
            height: 100vh;
            border-radius: 50px;
            box-shadow: 5px 0 10px rgba(0, 0, 0, 0.3);


        }

        .content {
            flex: 1;
            padding: 20px;
            height: 100vh;
        }

        .menu-item {
            margin-bottom: 10px;
        }

        .menu-item a {
            color: #25373D;
            text-decoration: none;
            display: block;
            padding: 5px;
            transition: background-color 0.3s;
        }

        .menu-item a:hover {
            background-color: #25373D;
            color: #F0F8FF;
        }
    </style>
</head>
<body>
<div class="navbar">
    <div class="logo">
    <a href="index2.php" class="logo">
        <img src="logo.png" alt="logo" />
    </a>
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <div class="menu-item">
            <a href="index3.php?id=isekle">İş Ekle</a> 
        </div>

        <div class="menu-item">
            <a href="index3.php?id=isler">İş Listele</a> 
        </div>
        <div class="menu-item">
            <a href="index3.php?id=isguncelle">İş Güncelle</a> 
        </div>
        <div class="menu-item">
            <a href="index3.php?id=issil">İş Sil</a> 
        </div>
        <div class="menu-item">
            <a href="index3.php?id=profil">Profil Sahipleri</a>
        </div>
    </div>

    <div class="content">
    <?php
    include("baglanti.php");

include("kategoriFonksiyon.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    switch ($id) {
        case "isekle":
            isForm();
            break;
        
        
        case "isler":
            isListele(); 
            break;
        
            case "isguncelle":
                isGuncelle();
                break;
            
        
        case "issil":
            isSil(); 
            break;

            
            case "isduzenle":
            isGuncelle();
                break;
            
            case"profil":
                profil();
                break;

        
        default:
            anasayfa(); 
    }
} else {
    anasayfa(); 
}
?>

    </div>
</div>
</body>
</html>