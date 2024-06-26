<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kariyer Hedefi</title>
    <style>
        body {
            background: url('isarkaplan.jpeg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            font-family: Arial, sans-serif;
        }

        #registration-container {
            max-width: 450px;
            padding: 30px;
            border-radius: 5px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            background-color: rgba(255, 255, 255, 0.9);
        }

        #registration-container h1 {
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
        }

        #registration-container label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        #registration-container input {
            width: calc(100% - 20px);
            padding: 12px;
            margin: 10px 0;
            box-sizing: border-box;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        #registration-container button {
            background-color: #4caf50;
            color: white;
            padding: 12px 15px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            width: calc(100% - 20px);
            margin-top: 20px;
            font-size: 16px;
            font-weight: bold;
        }

        #registration-container .login-link {
            text-align: center;
            margin-top: 20px;
            display: block;
            font-size: 14px;
        }

        #registration-container .login-link a {
            color: #4caf50;
            text-decoration: none;
            font-weight: bold;
        }

        #logo-container {
            text-align: center;
            margin-bottom: 40px;
        }

        #logo-container img {
            max-width: 600px;
        }
    </style>
</head>

<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $gmail = $_POST["email"];
        $gsifre = $_POST["sifre"];
        include("baglanti.php");

        $query = "SELECT * FROM uyeler WHERE email='$gmail'";
        $result = mysqli_query($baglanti, $query) or die("Sorgu hatası");
        $num_row = mysqli_num_rows($result);
        $row = mysqli_fetch_array($result);

        if ($num_row >= 1) {
            if ($gsifre == $row['sifre']) {
                session_start();
                $_SESSION["ad"] = $row['ad'];
                $_SESSION["soyad"] = $row['soyad'];
                $_SESSION["mail"] = $gmail;
                $_SESSION["id"] = $row['id'];
                header("Location: index1.php");
                exit();
            } else {
                echo '<br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
                echo "Yanlış şifre girişi. Kullanıcı girişine yönlendiriliyorsunuz";
                header("Refresh: 5; url=index.php?id=giris");
                exit();
            }
        } else {
            echo '<br><br><br><br>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp';
            echo "Mailiniz hatalı. Kullanıcı girişine yönlendiriliyorsunuz";
            header("Refresh: 5; url=index.php?id=giris");
            exit();
        }
    }
    ?>
    
    <div id="logo-container">
        <img src="logo.png" alt="Logo">
    </div>

    <div id="registration-container">
        <h1>Kayıt Ol</h1>

        <form id="registration-form" action="" method="post">
            <label for="full-name">Ad Soyad:</label>
            <input type="text" id="full-name" name="ad_soyad" required>

            <label for="email">E-posta:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Şifre:</label>
            <input type="password" id="password" name="sifre" required>

            <button type="submit">Kayıt Ol</button>
        </form>

        <div class="login-link">
            Zaten var olan bir hesabım var? <a href="giris.php">Giriş Yap</a>
        </div>
    </div>
</body>

</html>