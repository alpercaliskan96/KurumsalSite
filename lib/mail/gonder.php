<?php

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'src/Exception.php';
  require 'src/PHPMailer.php';
  require 'src/SMTP.php';

  $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");
  

  $ayarlar=$baglanti->prepare("select * from incomingmailsetting");
  $ayarlar->execute();
  $ayarson=$ayarlar->fetch();

  //------------------Tercih Alınıyor--------------------
  $ayarlar2=$baglanti->prepare("select mesajtercih from settings");
  $ayarlar2->execute();
  $tercihgeldi=$ayarlar2->fetch();




  $mail=new PHPMailer(true);
  $mail->SMTPDebug=0; // 1 olursa tarayıcı bilgisi vs de alıyor
  $mail->isSMTP(); //protokol başlatılıyor
  $mail->Charset = 'UTF-8';
  $mail->Host=$ayarson["host"];
  $mail->SMTPAuth=true; // protokolü tetikliyor
  $mail->Username=$ayarson["mailaddress"];
  $mail->Password=$ayarson["password"];
  $mail->SMTPSecure="tls"; //güvenlik
  $mail->Port=$ayarson["port"];
  $mail->isHTML(true);
  $mail->addAddress($ayarson["receiverAddress"]);

  if (@$_POST) : 

    $isim=htmlspecialchars(strip_tags($_POST["isim"]));
    $mail=htmlspecialchars(strip_tags($_POST["mail"]));
    $konu=htmlspecialchars(strip_tags($_POST["konu"]));
    $mesaj=htmlspecialchars(strip_tags($_POST["mesaj"]));

    switch($tercihgeldi["mesajtercih"]) :

      case 1:
      
      $mail->setFrom($mail,$isim);
      $mail->addReplyTo($mail,"Yanıt");
      $mail->Subject=$konu;
      $mail->Body=$mesaj;

        if($mail->send()) :

          echo '<div class="alert alert-success text-center mx-auto">Mailiniz Başarıyla Gönderilmiştir.<br>Teşekkür Ederiz</div>';


        else:

          $zaman=date("d.m.Y")."/".date("H:i");

          $kaydet=$baglanti->prepare("insert into incomingmail (name,mailaddress,subject,content,time) VALUES (?,?,?,?,?)");

          $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
          $kaydet->bindParam(2,$mail,PDO::PARAM_STR);
          $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
          $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
          $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
          $kaydet->execute();

          echo '<div class="alert alert-success text-center mx-auto">Mesajınız Başarıyla Gönderilmiştir.<br>Teşekkür Ederiz</div>';

        endif;
        
      break;

      case 2:

      $mail->setFrom($mail,$isim);
      $mail->addReplyTo($mail,"Yanıt");
      $mail->Subject=$konu;
      $mail->Body=$mesaj;
      
      $mail->send();

      $zaman=date("d.m.Y")."/".date("H:i");

      $kaydet=$baglanti->prepare("insert into incomingmail (name,mailaddress,subject,content,time) VALUES (?,?,?,?,?)");

      $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
      $kaydet->bindParam(2,$mail,PDO::PARAM_STR);
      $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
      $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
      $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
      $kaydet->execute();

      echo '<div class="alert alert-success text-center mx-auto">Mailiniz-Mesajınız Başarıyla Gönderilmiştir.<br>Teşekkür Ederiz</div>';

      break;

      case 3:
      
      $zaman=date("d.m.Y")."/".date("H:i");

      $kaydet=$baglanti->prepare("insert into incomingmail (name,mailaddress,subject,content,time) VALUES (?,?,?,?,?)");

      $kaydet->bindParam(1,$isim,PDO::PARAM_STR);
      $kaydet->bindParam(2,$mail,PDO::PARAM_STR);
      $kaydet->bindParam(3,$konu,PDO::PARAM_STR);
      $kaydet->bindParam(4,$mesaj,PDO::PARAM_STR);
      $kaydet->bindParam(5,$zaman,PDO::PARAM_STR);
      $kaydet->execute();  

      echo '<div class="alert alert-success text-center mx-auto">Mesajınız Başarıyla Gönderilmiştir.<br>Teşekkür Ederiz</div>';

      break;

    endswitch;


  endif;



    ?>