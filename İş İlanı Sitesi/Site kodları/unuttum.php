

<div id="Form">

    <form action="" method="POST">
        <h3>Kullanıcı Giriş Formu</h3>
        <input type="email" name="eposta" placeholder="Eposta giriniz" required />
        <input class="btn" type="submit" value="GÖNDER" />
    </form>
    <p class="mesaj">Üye Değil Misiniz ? <a href="index1.php?id=kayit">Hesap Oluşturun</a></p>
</div>
</body>
</html>
<?php
include("baglanti.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gemail = $_POST['eposta'];

    $query = "SELECT * FROM uyeler WHERE email=?";
    $stmt = $baglanti->prepare($query);
    $stmt->bind_param("s", $gemail);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $num_row = $result->num_rows;

    if ($num_row >= 1) {
        $gideceksifre = $row['sifre'];

        require 'PHPMailer/src/Exception.php'; // sorun var 
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';
        
        $mail = new PHPMailer();
        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = "tls";
        $mail->Port = 587;
        $mail->Host = "smtp.gmail.com";
        $mail->Username = "cerenoztrk2003@gmail.com"; 
        $mail->Password = "lqqu xqci pjyx wwre"; // Mail adres şifresi
        $mail->addAddress($gemail);
        $mail->Subject = "Hatirlatma Maili";
        $mail->Body = "Şifreniz: " . $gideceksifre;
        if ($mail->send()) {
            echo "Şifre hatırlatma maili gönderildi.";
        } else {
            echo "Mail gönderilemedi. Hata: " . $mail->ErrorInfo;
        }
    } else {
        echo "Bu eposta adresine kayıtlı bir kullanıcı bulunamadı.";
    }
}
?>

