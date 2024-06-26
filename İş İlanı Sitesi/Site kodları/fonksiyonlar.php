<?php
include("baglanti.php");
Function guncelleformu(){
    echo 
    '<div id="kayitFormu" align="center">
        <form action="index.php?id=guncellenecek&gid='.$_SESSION["id"].'" method="POST">
            <h3 >Güncelleme Formu</h3>
            <input type="text" name="ad" placeholder="'.$_SESSION["ad"].'"  maxlength="6"  /> 
            <br><input type="text" name="soyad" placeholder="'.$_SESSION["soyad"].'"  maxlength="25"  />                 
            <br><input type="email" name="eposta" placeholder="'.$_SESSION["mail"].'" />                 
            <br><input class="btn" type="submit" value="GÜNCELLE" />
        </form>            
     </div>'; 
}
Function guncelle(){
    if(empty($_POST["ad"]))  $ad=$_SESSION['ad'];  else  $ad=$_POST["ad"];
    if(empty($_POST["soyad"])) $soyad=$_SESSION['soyad'];  else  $soyad=$_POST["soyad"];
    if(empty($_POST["eposta"]))  $mail=$_SESSION['mail'];  else $mail=$_POST["eposta"];
    $id=$_GET["gid"];
    include("baglanti.php");	
    $insert_row = $baglanti->query("UPDATE kullanici SET ad ='".$ad."', soyad='".$soyad."', email='".$mail."' WHERE id='".$id."'");
                if ($insert_row) {
                    $_SESSION['id'] = $id;
                    $_SESSION['ad'] = $ad;
                    $_SESSION['mail'] = $mail;
                    $soyad=$_SESSION['soyad']=$soyad;
                   // header("Refresh:2;url=index.php");
                }
                else {

                echo 'güncelleme başarısız';
                header("Refresh:3;index.php?id=guncelle");

                }
}
?>