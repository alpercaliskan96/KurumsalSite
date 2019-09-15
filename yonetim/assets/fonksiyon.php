<?php ob_start();
session_start();
 
    try {

      $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");
      $baglanti -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    }
    
    catch(PDOEXCEPTION $e){
      die($e->getMessage());
    }

    
  class yonetim {

      private $veriler=array();

      function data() {
        return $this->sorgula($baglanti,"select * from settings",1);
      }

      function sorgula($db,$sorgu,$tercih=0)  {
        $con=$db->prepare($sorgu);
        $con->execute();

        if ($tercih==1):
          return $con->fetch();

        elseif($tercih==2):
          return $con;
      endif;
      }

      //siteayarları burada yapılıyor...
      function siteayar($baglanti) {
        
        $result=$this->sorgula($baglanti,"select * from settings",1);

        if($_POST):
          //database işlemleri 

          $title=htmlspecialchars(@$_POST["title"]);
          $metatitle=htmlspecialchars(@$_POST["metatitle"]);
          $metadesc=htmlspecialchars(@$_POST["metadesc"]);
          $metakey=htmlspecialchars(@$_POST["metakey"]);
          $metaauthor=htmlspecialchars(@$_POST["metaauthor"]);
          $metaowner=htmlspecialchars(@$_POST["metaowner"]);
          $metacopy=htmlspecialchars(@$_POST["metacopy"]);
          $logoyazisi=htmlspecialchars(@$_POST["logoyazisi"]);
          $facebook=htmlspecialchars(@$_POST["facebook"]);
          $twitter=htmlspecialchars(@$_POST["twitter"]);
          $instagram=htmlspecialchars(@$_POST["instagram"]);
          $linkedin=htmlspecialchars(@$_POST["linkedin"]);
          $telefonno=htmlspecialchars(@$_POST["telefonno"]);
          $adres=htmlspecialchars(@$_POST["adres"]);
          $mail=htmlspecialchars(@$_POST["mail"]);
          $slogan=htmlspecialchars(@$_POST["slogan"]);
          $referanscontent=htmlspecialchars(@$_POST["referanscontent"]);
          $notice=htmlspecialchars(@$_POST["notice"]);
          $comment=htmlspecialchars(@$_POST["comment"]);
          $contact=htmlspecialchars(@$_POST["contact"]);
          $worktitle=htmlspecialchars(@$_POST["worktitle"]);
          $mesajtercih=htmlspecialchars(@$_POST["mesajtercih"]);
          $haritabilgi=htmlspecialchars(@$_POST["haritabilgi"]);
          $footer=htmlspecialchars(@$_POST["footer"]);
          
          

          $guncelle=$baglanti->prepare("update settings set 
          title=?,metatitle=?,metadesc=?,metakey=?,metaauthor=?,metaowner=?,metacopy=?,logoyazisi=?,facebook=?,
          twitter=?,instagram=?,linkedin=?,telefonno=?,adres=?,mail=?,slogan=?,referanscontent=?,notice=?,
          comment=?,contact=?,worktitle=?,mesajtercih=?,haritabilgi=?,footer=?");

          $guncelle->bindParam(1,$title,PDO::PARAM_STR);
          $guncelle->bindParam(2,$metatitle,PDO::PARAM_STR);
          $guncelle->bindParam(3,$metadesc,PDO::PARAM_STR);
          $guncelle->bindParam(4,$metakey,PDO::PARAM_STR);
          $guncelle->bindParam(5,$metaauthor,PDO::PARAM_STR);
          $guncelle->bindParam(6,$metaowner,PDO::PARAM_STR);
          $guncelle->bindParam(7,$metacopy,PDO::PARAM_STR);
          $guncelle->bindParam(8,$logoyazisi,PDO::PARAM_STR);
          $guncelle->bindParam(9,$facebook,PDO::PARAM_STR);
          $guncelle->bindParam(10,$twitter,PDO::PARAM_STR);
          $guncelle->bindParam(11,$instagram,PDO::PARAM_STR);
          $guncelle->bindParam(12,$linkedin,PDO::PARAM_STR);
          $guncelle->bindParam(13,$telefonno,PDO::PARAM_STR);
          $guncelle->bindParam(14,$adres,PDO::PARAM_STR);
          $guncelle->bindParam(15,$mail,PDO::PARAM_STR);
          $guncelle->bindParam(16,$slogan,PDO::PARAM_STR);
          $guncelle->bindParam(17,$referanscontent,PDO::PARAM_STR);
          $guncelle->bindParam(18,$notice,PDO::PARAM_STR);
          $guncelle->bindParam(19,$comment,PDO::PARAM_STR);
          $guncelle->bindParam(20,$contact,PDO::PARAM_STR);
          $guncelle->bindParam(21,$worktitle,PDO::PARAM_STR);
          $guncelle->bindParam(22,$mesajtercih,PDO::PARAM_INT);
          $guncelle->bindParam(23,$haritabilgi,PDO::PARAM_STR);
          $guncelle->bindParam(24,$footer,PDO::PARAM_STR);

          $guncelle->execute();

          echo '<div class="alert alert-success" role="alert">
          <strong>Site Ayarları</strong> Başarıyla Güncellendi
          </div>';

        header("refresh:2,url=control.php?sayfa=siteayar"); 


        else:
          //form işlemleri

          ?>
        <form action="control.php?sayfa=siteayar" method="post">

        <div class="row">
        <div class="col-lg-7 mx-auto mt-2 ">
        <h3 class="text-dark">Site Ayarları</h3>
        </div>

        <div class="col-lg-7 mx-auto mt-2 border">
          <div class="row">
            <div class="col-lg-3 border-right pt-3 text-left">
              <span id="siteayarfont">Title</span>
            </div>

              <div class="col-lg-9 p-1">
              <input type="text" name="title" class="form-control" value="<?php echo $result["title"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metatitle</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metatitle" class="form-control" value="<?php echo $result["metatitle"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metadesc</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metadesc" class="form-control" value="<?php echo $result["metadesc"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metakey</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metakey" class="form-control" value="<?php echo $result["metakey"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metaauthor</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metaauthor" class="form-control" value="<?php echo $result["metaauthor"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metaowner</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metaowner" class="form-control" value="<?php echo $result["metaowner"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Metacopy</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="metacopy" class="form-control" value="<?php echo $result["metacopy"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Logo Yazısı</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="logoyazisi" class="form-control" value="<?php echo $result["logoyazisi"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Facebook</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="facebook" class="form-control" value="<?php echo $result["facebook"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Twitter</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="twitter" class="form-control" value="<?php echo $result["twitter"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>İnstagram</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="instagram" class="form-control" value="<?php echo $result["instagram"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Linked-in</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="linkedin" class="form-control" value="<?php echo $result["linkedin"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Telefon numarası</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="telefonno" class="form-control" value="<?php echo $result["telefonno"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Adres</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="adres" class="form-control" value="<?php echo $result["adres"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Mail</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="mail" class="form-control" value="<?php echo $result["mail"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Slogan</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="slogan" class="form-control" value="<?php echo $result["slogan"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Referans-içerik</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="referanscontent" class="form-control" value="<?php echo $result["referanscontent"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Duyurular-içerik</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="notice" class="form-control" value="<?php echo $result["notice"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Yorumlar-içerik</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="comment" class="form-control" value="<?php echo $result["comment"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>İletişim-içerik</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="contact" class="form-control" value="<?php echo $result["contact"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Ourworks-başlık</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="worktitle" class="form-control" value="<?php echo $result["worktitle"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Harita-bilgisi</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="haritabilgi" class="form-control" value="<?php echo $result["haritabilgi"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Footer-bilgisi</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="footer" class="form-control" value="<?php echo $result["footer"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Mesaj-Tercih</span>
            </div>

            <div class="col-lg-9 p-1 border-right">
              <div class="row">
                
                <div class="col-lg-4 border-right">
                Sadece Mail
                <input type="radio" name="mesajtercih" value="1" class="mt-2 ml-2" <?php echo ($result["mesajtercih"]==1)
                ? "checked='checked'": ""; ?> />
                </div>

                <div class="col-lg-4 border-right">
                Mail ve Mesaj
                <input type="radio" name="mesajtercih" value="2" class="mt-2 ml-2" <?php echo ($result["mesajtercih"]==2)
                ? "checked='checked'": ""; ?> /> 
                </div>

                <div class="col-lg-4">
                Sadece Mesaj
                <input type="radio" name="mesajtercih" value="3" class="mt-2 ml-2" <?php echo ($result["mesajtercih"]==3)
                ? "checked='checked'": ""; ?> /> 
                </div>

             
              </div>
              </div>
            </div>
        </div>

        <div class="col-lg-7 mx-auto mt-2 border-bottom">
        <input type="submit" name="buton" class="btn btn-dark m-1" value="GÜNCELLE" />
        </div>


        </div>



        </form>



          <?php



        endif;


      }
      
      //verilen veriyi şifreler -- decode hali çözer -- encode şifreler
      function sifrele($veri) {
        return $veri;
      }

      //verilen veriyi çözer, tersten işlem yaptırman gerekiyor!!
      function coz($veri) {
        return $veri;
      }
      
      //kullanıcı adını alıyor
      function kullaniciadial($baglanti) {

        $sessionid=$_SESSION["kullanicibilgi"];

        $cozuldu=$this->coz($sessionid);
        if($sessionid):
        $sorgusonuc=$this->sorgula($baglanti,"select * from adminpanel where id=".$cozuldu,1);
        return $sorgusonuc["kullaniciadi"];

        endif;
      

      }

      //girişkontrolü yapılır, boşsa hata ver - doluysa kontrol et -yanlışsa hata ver vsvs
      function giriskontrol($kullanici,$sifrele,$db) {

        $sifrelihal=md5(sha1(md5($sifrele)));

        $sorgu=$db->prepare("select * from adminpanel where kullaniciadi=? and sifre=?");
        $sorgu->execute(array($kullanici,$sifrelihal));
        
        if($sorgu->rowCount()==0) :
          
        echo '<div class="alert alert-danger mt-5 col-md-5 mx-auto">Bilgiler Hatalı !</div>';
        header("refresh:2,url=index.php");

        else:
        $result=$sorgu->fetch();
        $sorgu=$db->prepare("update adminpanel set aktif=1 where kullaniciadi='$kullanici' and sifre='$sifrelihal'");
        $sorgu->execute();
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Giriş Yapılıyor..</div>';
        header("refresh:2,url=control.php?sayfa=siteayar");

        //session

        $id=$this->sifrele($result["id"]);
        $_SESSION["kullanicibilgi"] =$id;

        endif;

      }

      //çıkış işlemi yapıldı
      function cikis($db) {
 
        $sessionid=$_SESSION["kullanicibilgi"];

        $cozuldu=$this->coz($sessionid);

        $this->sorgula($db,"update adminpanel set aktif=0 where id=$cozuldu",0);
        
        $_SESSION["kullanicibilgi"] = null;
        echo '<div class="alert alert-info mt-5 col-md-5 mx-auto">Çıkış Yapılıyor..</div>';
        header("refresh:2,url=index.php");

      }
      
      //session kontrolü
      function kontrolet($sayfa) {
        if(@$_SESSION["kullanicibilgi"]!=null) :

          if($sayfa=="ind") : header("Location:control.php"); endif;
         
        else:

          if($sayfa=="cot") : header("Location:index.php"); endif;

        endif;

      }

      //-------------------İNTRO BÖLÜMÜ--------------------
      function introayar($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12"><a href="control.php?sayfa=introresimekle" class="btn btn-dark btn-sm m-2">Yeni Resim Ekle</a></div>
        ';
        $intro=$this->sorgula($db,"select * from intro",2);

        while($sonbilgi=$intro->fetch(PDO::FETCH_ASSOC)) :

        echo '
        <div class="col-lg-4">
                
        <div class="row border border-light p-1 m-1">
          <div class="col-lg-12">
            <img src="../'.$sonbilgi["imageadr"].'">
          </div>

          <div class="col-lg-6 text-right">
            <a href="control.php?sayfa=introresimguncelle&id='.$sonbilgi["id"].'" class="ti-reload m-2 text-success" style="font-size:25px;"></a>
          </div>

         <div class="col-lg-6 text-left">
           <a href="control.php?sayfa=introresimsil&id='.$sonbilgi["id"].'" class="ti-trash m-2 text-danger" style="font-size:25px;"></a>
         </div>

          </div>
          </div>
                ';
        
          
        endwhile;

        echo '</div>';

      }

      function introresimekle($db) {
        
        echo '<div class="row text-center">
        <div class="col-lg-12">
        ';

        if($_POST) :
          //dosya boş mu dolu mu diye bak
          //dosyanın boyutunu kontrol et
          //postla

          if($_FILES["dosya"]["name"]=="") :

            echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi.Boş Olamaz!</div>';
            header("refresh:2,url=control.php?sayfa=introresimekle");
          
          else:
            if($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
              echo '<div class="alert alert-danger mt-1">İzin verilen max boyut : 5 MB!</div>';
              header("refresh:2,url=control.php?sayfa=introresimekle");

            else:
              $izinverilen=array("image/png","image/jpeg");

              if(!in_array($_FILES["dosya"]["type"],$izinverilen)) :

                echo '<div class="alert alert-danger mt-1">İzin verilen formatlar : jpg-png!</div>';
                header("refresh:2,url=control.php?sayfa=introresimekle");

              else:
                $dosyayol='../img/intro/'.$_FILES["dosya"]["name"];
                
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol); 

                echo '<div class="alert alert-success mt-1">Dosya Başarıyla Yüklendi..</div>';
                header("refresh:2,url=control.php?sayfa=introayar");

                //db'ye kaydetmek için:
                $dosyayol2=str_replace('../','',$dosyayol);

                $kayitekle=$this->sorgula($db,"insert into intro (imageadr) VALUES ('$dosyayol2')",0);

              endif;
          
          endif;

        endif;

          
        else:
          ?>

          <div class="col-lg-4 mx-auto mt-2">
            <div class="card card-bordered">
              <div class="card-body">
              <h5 class="title border-bottom">İntro Resim Yükleme Formu</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <p class="card-text"><input type="file" name="dosya" /></p>
                <input type="submit" name="buton" value="Yükle" class="btn btn-dark mb-1" />
              </form>
              <p class="card-text text-left text-danger border-top">
                * İzin verilen formatlar : jpg-png <br />
                * İzin verilen max boyut : 5 MB
              </p>
              </div>
            </div>
          </div>
          
          <?php

        endif;
          echo '</div>
          </div>
          </div>';


      }

      function introresimsil($db) {
        
        $introid=$_GET["id"];

        $verial=$this->sorgula($db,"select * from intro where id=$introid",1);

        echo '<div class="row text-center">
        <div class="col-lg-12">
        ';

        //db'den veri silme
        $this->sorgula($db,"delete from intro where id=$introid",0);

        //dosyayı silme işlemi:
        unlink("../".$verial["imageadr"]);  
        echo '<div class="alert alert-success mt-1">Dosya Başarıyla Silindi..</div>';
        echo '</div></div>';

        header("refresh:2,url=control.php?sayfa=introayar");

      }

      function introresimguncelle($db) {

        $gelenintroid=$_GET["id"];

        echo '<div class="row text-center">
        <div class="col-lg-12">
        ';

        if($_POST) :
          //dosya boş mu dolu mu diye bak
          //dosyanın boyutunu kontrol et
          //postla

          $formdangelenid=$_POST["introid"];

          if($_FILES["dosya"]["name"]=="") :

            echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi.Boş Olamaz!</div>';
            header("refresh:2,url=control.php?sayfa=introayar");
          
          else:
            if($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
              echo '<div class="alert alert-danger mt-1">İzin verilen max boyut : 5 MB!</div>';
              header("refresh:2,url=control.php?sayfa=introayar");

            else:
              $izinverilen=array("image/png","image/jpeg");

              if(!in_array($_FILES["dosya"]["type"],$izinverilen)) :

                echo '<div class="alert alert-danger mt-1">İzin verilen formatlar : jpg-png!</div>';
                header("refresh:2,url=control.php?sayfa=introayar");

              else:
                //güncelleme işleminde mevcut dosya bulunur ve silinir -yeni dosyanın yolu kaydedilir
                $resimyolu=$this->sorgula($db,"select * from intro where id=$gelenintroid",1);

                $dbgelenyol='../'.$resimyolu["imageadr"];

                unlink($dbgelenyol);


                $dosyayol='../img/intro'.$_FILES["dosya"]["name"];
                
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol); 
                $dosyayol2=str_replace('../','',$dosyayol);

                $this->sorgula($db,"update intro set imageadr='$dosyayol2' where id=$gelenintroid ",0);

                echo '<div class="alert alert-success mt-1">Dosya Başarıyla Yüklendi..</div>';
                header("refresh:2,url=control.php?sayfa=introayar");
               

              endif;
          
          endif;

        endif;

          
        else:
          ?>

          <div class="col-lg-4 mx-auto mt-2">
            <div class="card card-bordered">
              <div class="card-body">
              <h5 class="title border-bottom">İntro Resim Güncelleme Formu</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <p class="card-text"><input type="file" name="dosya" /></p>
                <p class="card-text"><input type="hidden" name="introid" value="<?php echo $gelenintroid; ?>" /></p>
                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
              </form>
              <p class="card-text text-left text-danger border-top">
                * İzin verilen formatlar : jpg-png <br />
                * İzin verilen max boyut : 5 MB
              </p>
              </div>
            </div>
          </div>
          
          <?php

        endif;
          echo '</div>
          </div>
          </div>';


      }

      //----------------Hakkımızda Bölümü-----------------
      function hakkimizda($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-dark">Hakkımızda Ayarları</h3></div>';

        if(!$_POST):

        
        $sonbilgi=$this->sorgula($db,"select * from aboutus",1);

        echo '
        <div class="col-lg-6 mx-auto">
        
          <div class="row card-bordered p-1 m-1">

            <div class="col-lg-3 border-bottom bg-light" id="hakkimizdayazilar">
              Resim
            </div>

            <div class="col-lg-9 border-bottom">
              <img src="../'.$sonbilgi["image"].'"><br>
              <form action="" method="post" enctype="multipart/form-data">
              <input type="file" name="dosya">  
            </div>

            <div class="col-lg-3 border-bottom bg-light pt-3" id="hakkimizdayazilarn">
              Başlık
            </div>

            <div class="col-lg-9 border-bottom">
              <input type="text" name="title" class="form-control m-2" value="'.$sonbilgi["title"].'">
            </div>

            <div class="col-lg-3 bg-light" id="hakkimizdayazilar">
              İçerik
            </div>

            <div class="col-lg-9">
            <textarea name="content" class="form-control m-2" rows="6">'.$sonbilgi["content"].'</textarea>
              
            </div>

            <div class="col-lg-12 border-top">
              <input type="submit" name="guncel" value="Güncelle" class="btn btn-dark m-2">
              </form>
            </div>


        </div></div>';

          //form basıldıysa
        else:
          $title=htmlspecialchars($_POST["title"]);
          $content=htmlspecialchars($_POST["content"]);

          if(@$_FILES["dosya"]["name"]!="") :
          
            if($_FILES["dosya"]["size"] < (1024 * 1024 * 5)) :

            
              $izinverilen=array("image/png","image/jpeg");

              if(in_array($_FILES["dosya"]["type"],$izinverilen)) :

                $dosyayol='../img/hakkimizda/'.$_FILES["dosya"]["name"];
                
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol); 

                //db'ye kaydetmek için:
                $dosyayol2=str_replace('../','',$dosyayol);
                endif;
              endif;
              endif;



              if(@$_FILES["dosya"]["name"] != "") :
                $this->sorgula($db,"update aboutus set title='$title',content='$content',image='$dosyayol2'",0);

                echo '<div class="alert alert-success mt-5">Güncelleme Başarılı</div>';
                header("refresh:2,url=control.php?sayfa=hakkimizda");

              else:
                $this->sorgula($db,"update aboutus set title='$title',content='$content'",0);

                echo '<div class="alert alert-success mt-5">Güncelleme Başarılı</div>';
                header("refresh:2,url=control.php?sayfa=hakkimizda");
              endif;


        endif;



      }
      
      //----------------OurWorks Bölümü-----------------
      function ourworks($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-2">
        <a href="control.php?sayfa=ourworksekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
        Our Works</h4>
        </div>';

        $intro=$this->sorgula($db,"select * from ourworks",2);

        while($sonbilgi=$intro->fetch(PDO::FETCH_ASSOC)) :

        echo '
        <div class="col-lg-6">
                
        <div class="row card-bordered p-1 m-1 bg-light">
          <div class="col-lg-10 pt-1 pb-1">
          <h5>'.$sonbilgi["title"].'</h5>
          </div>

          <div class="col-lg-2 text-right">
            <a href="control.php?sayfa=ourworksguncelle&id='.$sonbilgi["id"].'" class="ti-reload text-success" style="font-size:20px;"></a>
           <a href="control.php?sayfa=ourworkssil&id='.$sonbilgi["id"].'" class="ti-trash text-danger pl-2" style="font-size:20px;"></a>
         </div>

          <div class="col-lg-12 border-top text-secondary text-left bg-white">
          '.$sonbilgi["content"].'
          </div>

          
          </div>
        </div>';
            
        endwhile;

        echo '</div>';

      }

      function ourworksekle($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-info">ADD A NEW WORK</h3></div>';

        if(!$_POST):
      
        echo '
        <div class="col-lg-6 mx-auto">
                
        <div class="row card-bordered p-1 m-1 bg-light">

          <div class="col-lg-2 pt-3">
            Title
          </div>
          
          <div class="col-lg-10 p-2">
            <form action="" method="post">
            <input type="text" name="title" class="form-control">
          </div>
          
          <div class="col-lg-12 border-top p-2">
            Content
          </div>
          <div class="col-lg-12 border-top p-2">
          <textarea name="content" rows="5" class="form-control"></textarea>
          </div>

          <div class="col-lg-12 border-top p-2">
          <input type="submit" name="buton" value="Add A New Work" class="btn btn-primary">
          </form>
          </div>


          </div>
        </div>';

        else:

          $title=htmlspecialchars($_POST["title"]);
          $content=htmlspecialchars($_POST["content"]);

          if($title=="" && $content=="") :

            echo '<div class="col-lg-6 mx-auto">
              <div class="alert alert-danger mt-5">Veriler Boş Olamaz!<div>
            <div>';

            header("refresh:2,url=control.php?sayfa=ourworks");

          else:

            $this->sorgula($db,"insert into ourworks (title,content) VALUES ('$title','$content')",0);

            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">Ekleme Başarılı<div>
          <div>';

          header("refresh:2,url=control.php?sayfa=ourworks");


          endif;

        endif;
            
   

        echo '</div>';

      }

      function ourworksguncelle($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-dark">UPDATE WORK</h3></div>';

        $kayitid=$_GET["id"];

        $kayitbilgi=$this->sorgula($db,"select * from ourworks where id=$kayitid",1);

        if(!$_POST):
      
        echo '
        <div class="col-lg-6 mx-auto">
                
        <div class="row card-bordered p-1 m-1 bg-light">

          <div class="col-lg-2 pt-3">
            Title
          </div>
          
          <div class="col-lg-10 p-2">
            <form action="" method="post">
            <input type="text" name="title" class="form-control" value="'.$kayitbilgi["title"].'">
          </div>
          
          <div class="col-lg-12 border-top p-2">
            Content
          </div>
          <div class="col-lg-12 border-top p-2">
          <textarea name="content" rows="5" class="form-control">'.$kayitbilgi["content"].'</textarea>
          </div>

          <div class="col-lg-12 border-top p-2">
          <input type="hidden" name="kayitidsi" value="'.$kayitid.'">
          <input type="submit" name="buton" value="Update Work" class="btn btn-dark">
          </form>
          </div>


          </div>
        </div>';

        else:

          $title=htmlspecialchars($_POST["title"]);
          $content=htmlspecialchars($_POST["content"]);
          $kayitidsi=htmlspecialchars($_POST["kayitidsi"]);

          if($title=="" && $content=="") :

            echo '<div class="col-lg-6 mx-auto">
              <div class="alert alert-danger mt-5">Veriler Boş Olamaz!<div>
            <div>';

            header("refresh:2,url=control.php?sayfa=ourworks");

          else:

            $this->sorgula($db,"update ourworks set title='$title',content='$content' where id=$kayitidsi",0);

            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">Güncelleme Başarılı<div>
          <div>';

          header("refresh:2,url=control.php?sayfa=ourworks");


          endif;

        endif;
            
   

        echo '</div>';



      }

      function ourworkssil($db) {

        $introid=$_GET["id"];

        echo '<div class="row text-center">
        <div class="col-lg-12">
        '; 

        //db'den veri silme
        $this->sorgula($db,"delete from ourworks where id=$introid",0);

        echo '<div class="alert alert-success mt-1">Dosya Başarıyla Silindi..</div>';
        echo '</div></div>';

        header("refresh:2,url=control.php?sayfa=ourworks");


      }

      //----------------Referanslar Bölümü-----------------

      function referans($db) {

        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-1">
        <a href="control.php?sayfa=referansekle" class="ti-plus bg-dark p-1 text-white m-2 mt-3"></a>
        Referanslar</h4>
        </div>';

        $intro=$this->sorgula($db,"select * from referanslar",2);

        while($sonbilgi=$intro->fetch(PDO::FETCH_ASSOC)) :

        echo '
        <div class="col-lg-2 bg-light">
                
        <div class="row card-bordered p-1 m-1">
          <div class="col-lg-12">
            <img src="../'.$sonbilgi["image"].'">
            <a href="control.php?sayfa=referanssil&id='.$sonbilgi["id"].'" class="fa fa-trash text-danger" style="font-size:25px;"></a>
          </div>
          
          </div>
        </div>';
            
        endwhile;

        echo '</div>';

      }

      function referansekle($db) {

        echo '<div class="row text-center">
        <div class="col-lg-12">';

        if($_POST) :
          //dosya boş mu dolu mu diye bak
          //dosyanın boyutunu kontrol et
          //postla

          if($_FILES["dosya"]["name"]=="") :

            echo '<div class="alert alert-danger mt-1">Dosya Yüklenmedi.Boş Olamaz!</div>';
            header("refresh:2,url=control.php?sayfa=referans");
          
          else:
            if($_FILES["dosya"]["size"] > (1024 * 1024 * 5)) :
              echo '<div class="alert alert-danger mt-1">İzin verilen max boyut : 5 MB!</div>';
              header("refresh:2,url=control.php?sayfa=referans");

            else:
              $izinverilen=array("image/png","image/jpeg");

              if(!in_array($_FILES["dosya"]["type"],$izinverilen)) :

                echo '<div class="alert alert-danger mt-1">İzin verilen formatlar : jpg-png!</div>';
                header("refresh:2,url=control.php?sayfa=referans");

              else:
                $dosyayol='../img/referanslar/'.$_FILES["dosya"]["name"];
                
                move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyayol); 

                echo '<div class="alert alert-success mt-1">Dosya Başarıyla Yüklendi..</div>';
                header("refresh:2,url=control.php?sayfa=referans");

                //db'ye kaydetmek için:
                $dosyayol2=str_replace('../','',$dosyayol);

                $kayitekle=$this->sorgula($db,"insert into referanslar (image) VALUES ('$dosyayol2')",0);

              endif;
          
          endif;

        endif;

          
        else:
          ?>

          <div class="col-lg-4 mx-auto mt-2">
            <div class="card card-bordered">
              <div class="card-body">
              <h5 class="title border-bottom">Referans Ekleme Formu</h5>
              <form action="" method="post" enctype="multipart/form-data">
                <p class="card-text"><input type="file" name="dosya" /></p>
                <input type="submit" name="buton" value="Yükle" class="btn btn-primary mb-1" />
              </form>
              <p class="card-text text-left text-danger border-top">
                * İzin verilen formatlar : jpg-png <br />
                * İzin verilen max boyut : 5 MB
              </p>
              </div>
            </div>
          </div>
          
          <?php

        endif;
          echo '</div>
          </div>
          </div>';




      }

      function referanssil($db) {
        
        $introid=$_GET["id"];

        $verial=$this->sorgula($db,"select * from referanslar where id=$introid",1);

        echo '<div class="row text-center">
        <div class="col-lg-12">';

        //dosyayı silme işlemi:
        unlink("../".$verial["image"]);  

        //db'den veri silme
        $this->sorgula($db,"delete from referanslar where id=$introid",0);

        echo '<div class="alert alert-success mt-1">Dosya Başarıyla Silindi..</div>';
        echo '</div></div>';

        header("refresh:2,url=control.php?sayfa=referans");


      }

      //----------------Yorumlar Bölümü-----------------

      function yorumlar($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h4 class="float-left mt-3 text-dark mb-1">
        <a href="control.php?sayfa=yorumekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>
        Yorumlar</h4>
        </div>';

        $intro=$this->sorgula($db,"select * from comment",2);

        while($sonbilgi=$intro->fetch(PDO::FETCH_ASSOC)) :

        echo '
        <div class="col-lg-4">
                
        <div class="row card-bordered p-1 m-1 bg-light" style="border-radius:10px;">
          <div class="col-lg-8 pt-1 text-left">
          <h5>İsim : '.$sonbilgi["name"].'</h5>
          </div>

          <div class="col-lg-4 text-right p-2">
            <a href="control.php?sayfa=yorumguncelle&id='.$sonbilgi["id"].'" class="ti-reload text-success" style="font-size:20px;"></a>
           <a href="control.php?sayfa=yorumsil&id='.$sonbilgi["id"].'" class="ti-trash text-danger pl-2" style="font-size:20px;"></a>
         </div>

          <div class="col-lg-12 border-top text-secondary text-left bg-white">
          '.$sonbilgi["content"].'
          </div>

          
          </div>
        </div>';
            
        endwhile;

        echo '</div>';

      }

      function yorumekle($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-dark">YORUM EKLE</h3></div>';

        if(!$_POST):
      
        echo '
        <div class="col-lg-6 mx-auto">
                
        <div class="row card-bordered p-1 m-1 bg-light">

          <div class="col-lg-2 pt-3">
            İsim
          </div>
          
          <div class="col-lg-10 p-2">
            <form action="" method="post">
            <input type="text" name="name" class="form-control">
          </div>
          
          <div class="col-lg-12 border-top p-2">
            Content
          </div>
          <div class="col-lg-12 border-top p-2">
          <textarea name="content" rows="5" class="form-control"></textarea>
          </div>

          <div class="col-lg-12 border-top p-2">
          <input type="submit" name="buton" value="Yorum Ekle" class="btn btn-dark">
          </form>
          </div>


          </div>
        </div>';

        else:

          $name=htmlspecialchars($_POST["name"]);
          $content=htmlspecialchars($_POST["content"]);

          if($title=="" && $content=="") :

            echo '<div class="col-lg-6 mx-auto">
              <div class="alert alert-danger mt-5">Veriler Boş Olamaz!<div>
            <div>';

            header("refresh:2,url=control.php?sayfa=ourworks");

          else:

            $this->sorgula($db,"insert into comment (content,name) VALUES ('$content','$name')",0);

            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">Yorum Ekleme Başarılı<div>
          <div>';

          header("refresh:2,url=control.php?sayfa=yorumlar");


          endif;

        endif;
            
   

        echo '</div>';

      }

      function yorumguncelle($db) {
        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-dark">Yorum Güncelle</h3></div>';

        $kayitid=$_GET["id"];

        $kayitbilgi=$this->sorgula($db,"select * from comment where id=$kayitid",1);

        if(!$_POST):
      
        echo '
        <div class="col-lg-6 mx-auto">
                
        <div class="row card-bordered p-1 m-1 bg-light">

          <div class="col-lg-2 pt-3">
            Name
          </div>
          
          <div class="col-lg-10 p-2">
            <form action="" method="post">
            <input type="text" name="name" class="form-control" value="'.$kayitbilgi["name"].'">
          </div>
          
          <div class="col-lg-12 border-top p-2">
            Content
          </div>
          <div class="col-lg-12 border-top p-2">
          <textarea name="content" rows="5" class="form-control">'.$kayitbilgi["content"].'</textarea>
          </div>

          <div class="col-lg-12 border-top p-2">
            <input type="hidden" name="kayitid" value="'.$kayitid.'">
            <input type="submit" name="buton" value="Update Work" class="btn btn-dark">
          </form>
          </div>


          </div>
        </div>';

        else:

          $name=htmlspecialchars($_POST["name"]);
          $content=htmlspecialchars($_POST["content"]);
          $kayitidsi=htmlspecialchars($_POST["kayitid"]);

          if($name=="" && $content=="") :

            echo '<div class="col-lg-6 mx-auto">
              <div class="alert alert-danger mt-5">Veriler Boş Olamaz!<div>
            <div>';

            header("refresh:2,url=control.php?sayfa=yorumguncelle");

          else:

            $this->sorgula($db,"update comment set content='$content',name='$name' where id=$kayitidsi",0);

            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">Güncelleme Başarılı<div>
          <div>';

          header("refresh:2,url=control.php?sayfa=yorumlar");


          endif;

        endif;
            
   

        echo '</div>';



      }

      function yorumsil($db) {

        $introid=$_GET["id"];

        echo '<div class="row text-center">
        <div class="col-lg-12">'; 

        //db'den veri silme
        $this->sorgula($db,"delete from comment where id=$introid",0);

        echo '<div class="alert alert-success mt-1">Dosya Başarıyla Silindi..</div>';
        echo '</div></div>';

        header("refresh:2,url=control.php?sayfa=yorumlar");


      }

      //----------------Mesajlar Bölümü-----------------

      private function mailgetir($db,$veriler) {
        $sor=$db->prepare("select * from $veriler[0] where status=$veriler[1]");
        $sor->execute();
        return $sor;
      }

      function gelenmesaj($db) {

        echo'
        <div class="row">
          <div class="col-lg-12 mt-2">
            <div class="card">
              <div class="card-body">
              <ul class="nav nav-tabs" id="myTab" role="tablist">
              
              <li class="nav-item">
              <a class="nav-link active" id="gelen-tab" data-toggle="tab" href="#gelen" 
              role="tab" aria-control="gelen" aria-selected="true"><kbd>'.$this->mailgetir($db,array("incomingmail",0))->rowCount().'
              </kbd> Gelen Mesajlar</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="okunmus-tab" data-toggle="tab" href="#okunmus" 
              role="tab" aria-control="okunmus" aria-selected="false"><kbd>'.$this->mailgetir($db,array("incomingmail",1))->rowCount().'
              </kbd> Okunmuş Mesajlar</a>
              </li>

              <li class="nav-item">
              <a class="nav-link" id="arsiv-tab" data-toggle="tab" href="#arsiv" 
              role="tab" aria-control="arsiv" aria-selected="false"><kbd>'.$this->mailgetir($db,array("incomingmail",2))->rowCount().'
              </kbd> Arşivlenen Mesajlar</a>
              </li>
               
              </ul>

            <div class="tab-content mt-3" id="benimTab">

              <div class="tab-pane fade show active" id="gelen"
              role="tabpanel" aria-labelledby="gelen-tab">';

              $result=$this->mailgetir($db,array("incomingmail",0));

              if($result->rowCount() != 0)  :
              
                    while($resultson=$result->fetch(PDO::FETCH_ASSOC))  :

                    echo'  
                      <div class="row">
                        <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee">
                          <div class="row border-bottom">

                            <div class="col-lg-1 p-1">Ad</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["name"].'</div>
                            <div class="col-lg-1 p-1">Mail Adresi</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["mailaddress"].'</div>
                            <div class="col-lg-1 p-1">Konu</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["subject"].'</div>
                            <div class="col-lg-1 p-1">Tarih</div>
                            <div class="col-lg-1 p-1 text-primary">'.$resultson["time"].'</div>
                            <div class="col-lg-1 p-1">
                            <a href="control.php?sayfa=mesajoku&id='.$resultson["id"].'">
                              <i class="fa fa-envelope border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                            <a href="control.php?sayfa=mesajarsivle&id='.$resultson["id"].'">
                              <i class="fa fa-star border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                            <a href="control.php?sayfa=mesajsil&id='.$resultson["id"].'">
                              <i class="fa fa-trash border-right pr-2 text-dark" style="font-size:20px;"></i></a>

                            </div>
                          </div>
                        </div>
                      </div>';

                    endwhile;

                else:
                    echo '<div class="alert alert-info">Gelen Mesaj Yok</div>';
              
                endif;
              
              echo '</div>

              <div class="tab-pane fade" id="okunmus"
              role="tabpanel" aria-labelledby="okunmus-tab">';

              $result=$this->mailgetir($db,array("incomingmail",1));

              if($result->rowCount() != 0)  :
              
                    while($resultson=$result->fetch(PDO::FETCH_ASSOC))  :

                    echo'  
                      <div class="row">
                        <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee">
                          <div class="row border-bottom">

                            <div class="col-lg-1 p-1">Ad</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["name"].'</div>
                            <div class="col-lg-1 p-1">Mail Adresi</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["mailaddress"].'</div>
                            <div class="col-lg-1 p-1">Konu</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["subject"].'</div>
                            <div class="col-lg-1 p-1">Tarih</div>
                            <div class="col-lg-1 p-1 text-primary">'.$resultson["time"].'</div>
                            <div class="col-lg-1 p-1">
                            <a href="control.php?sayfa=mesajoku&id='.$resultson["id"].'">
                              <i class="fa fa-envelope border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                            <a href="control.php?sayfa=mesajarsivle&id='.$resultson["id"].'">
                              <i class="fa fa-star border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                            <a href="control.php?sayfa=mesajsil&id='.$resultson["id"].'">
                              <i class="fa fa-trash border-right pr-2 text-dark" style="font-size:20px;"></i></a>

                            </div>
                          </div>
                        </div>
                      </div>';

                    endwhile;

                else:
                    echo '<div class="alert alert-info">Okunmuş Mesaj Yok</div>';
              
                endif;
              
              echo '</div>

              <div class="tab-pane fade" id="arsiv"
              role="tabpanel" aria-labelledby="arsiv-tab">';

              $result=$this->mailgetir($db,array("incomingmail",2));

              if($result->rowCount() != 0)  :
              
                    while($resultson=$result->fetch(PDO::FETCH_ASSOC))  :

                    echo'  
                      <div class="row">
                        <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee">
                          <div class="row border-bottom">

                            <div class="col-lg-1 p-1">Ad</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["name"].'</div>
                            <div class="col-lg-1 p-1">Mail Adresi</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["mailaddress"].'</div>
                            <div class="col-lg-1 p-1">Konu</div>
                            <div class="col-lg-2 p-1 text-primary">'.$resultson["subject"].'</div>
                            <div class="col-lg-1 p-1">Tarih</div>
                            <div class="col-lg-1 p-1 text-primary">'.$resultson["time"].'</div>
                            <div class="col-lg-1 p-1">
                            <a href="control.php?sayfa=mesajoku&id='.$resultson["id"].'">
                              <i class="fa fa-envelope border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                                <a href="control.php?sayfa=mesajarsivle&id='.$resultson["id"].'">
                            <i class="fa fa-star border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                              <a href="control.php?sayfa=mesajsil&id='.$resultson["id"].'">
                            <i class="fa fa-close border-right pr-2 text-dark" style="font-size:20px;"></i></a>

                            </div>
                          </div>
                        </div>
                      </div>';

                    endwhile;

                else:
                    echo '<div class="alert alert-info">Arşivlenen Mesaj Yok</div>';
              
                endif;
              
              echo '</div>

              </div>

              </div>
            </div>
          </div>
        </div>';

      }

      function mesajoku($db,$id) {  

        $mesajbilgi=$this->sorgula($db,"select * from incomingmail where id=$id",1);

        echo'  
            <div class="row m-2">
              <div class="col-lg-12 bg-light mt-2 font-weight-bold" style="border-radius:5px; border:1px solid #eeeeee">
                <div class="row border-bottom">

                  <div class="col-lg-1 p-1">Ad</div>
                  <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["name"].'</div>
                  <div class="col-lg-1 p-1">Mail Adresi</div>
                  <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["mailaddress"].'</div>
                  <div class="col-lg-1 p-1">Konu</div>
                  <div class="col-lg-1 p-1 text-primary">'.$mesajbilgi["subject"].'</div>
                  <div class="col-lg-1 p-1">Tarih</div>
                  <div class="col-lg-2 p-1 text-primary">'.$mesajbilgi["time"].'</div>
                  
                  <div class="col-lg-1 p-1">
                      <a href="control.php?sayfa=mesajarsivle&id='.$mesajbilgi["id"].'">
                        <i class="fa fa-star border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                      <a href="control.php?sayfa=mesajsil&id='.$mesajbilgi["id"].'">
                        <i class="fa fa-trash border-right pr-2 text-dark" style="font-size:20px;"></i></a>
                      <a href="control.php?sayfa=gelenmesaj#gelen ">
                        <i class="fa fa-undo border-right pr-2 text-dark" style="font-size:20px;"></i></a>

                    </div>
                  </div>
                    
                  <div class="row text-left p-2">
                      <div class="col-lg-12">
                      '.$mesajbilgi["content"].'
                      </div>

              </div>     
            </div>';

            //okunan mesajı okunmuş mesajlar kısmına yolluyor
            if($result=$this->mailgetir($db,array("incomingmail",0))):
            $this->sorgula($db,"update incomingmail set status=1 where id=$id",0);
            endif;
                     
      }

      function mesajarsivle($db,$id) {

        echo '
        <div class="row m-2">
          <div class="col-lg-12 mt-2" style="border-radius:5px; border:1px; solid #eeeeee;">
            <div class="alert alert-info mt-2 mb-2">Mesaj Arşivlendi</div>
          </div>
        </div>';

        
        header("refresh:2,url=control.php?sayfa=gelenmesaj");
        $this->sorgula($db,"update incomingmail set status=2 where id=$id",0);
        

      }

      function mesajsil($db,$id) {
        
        echo '
        <div class="row m-2">
          <div class="col-lg-12 mt-2" style="border-radius:5px; border:1px; solid #eeeeee;">
            <div class="alert alert-info mt-2 mb-2">Mesaj Silindi</div>
          </div>
        </div>';

        
        header("refresh:2,url=control.php?sayfa=gelenmesaj");
        $this->sorgula($db,"delete from incomingmail where id=$id",0);

      }

      //----------------Mesaj Ayarları Bölümü-----------------

      function mailayar($baglanti) {
        
        $result=$this->sorgula($baglanti,"select * from incomingmailsetting",1);

        if($_POST):
          //database işlemleri 

          $host=htmlspecialchars(@$_POST["host"]);
          $mailaddress=htmlspecialchars(@$_POST["mailaddress"]);
          $password=htmlspecialchars(@$_POST["password"]);
          $port=htmlspecialchars(@$_POST["port"]);
          $receiverAddress=htmlspecialchars(@$_POST["receiverAddress"]);
      
          $guncelle=$baglanti->prepare("update incomingmailsetting set 
          host=?,mailaddress=?,password=?,port=?,receiverAddress=?");

          $guncelle->bindParam(1,$host,PDO::PARAM_STR);
          $guncelle->bindParam(2,$mailaddress,PDO::PARAM_STR);
          $guncelle->bindParam(3,$password,PDO::PARAM_STR);
          $guncelle->bindParam(4,$port,PDO::PARAM_STR);
          $guncelle->bindParam(5,$receiverAddress,PDO::PARAM_STR);
       

          $guncelle->execute();

          echo '<div class="alert alert-success mt-5">
          <strong>Mail Ayarları</strong> Başarıyla Güncellendi
          </div>';

        header("refresh:2,url=control.php?sayfa=mailayar"); 


        else:
          //form işlemleri

          ?>
        <form action="control.php?sayfa=mailayar" method="post">

        <div class="row text-center">
        <div class="col-lg-6 mx-auto">
       
        <div class="col-lg-12 mx-auto mt-2 ">
        <h3 class="text-dark">Mail Ayarları</h3>
        </div>

        <div class="col-lg-12 mx-auto mt-2 border">
          <div class="row">
            <div class="col-lg-3 border-right pt-3 text-left">
              <span id="siteayarfont">Host</span>
            </div>

              <div class="col-lg-9 p-1">
              <input type="text" name="host" class="form-control" value="<?php echo $result["host"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Mail Address</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="mailaddress" class="form-control" value="<?php echo $result["mailaddress"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Host Password</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="password" class="form-control" value="<?php echo $result["password"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Port</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="port" class="form-control" value="<?php echo $result["port"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Alıcı Mail Adresi</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="text" name="receiverAddress" class="form-control" value="<?php echo $result["receiverAddress"]; ?>" />
              </div>
            </div>
        </div>

        
        <div class="col-lg-12 mx-auto mt-2">
          <input type="submit" name="buton" class="btn btn-dark m-1" value="GÜNCELLE" />
        </div>

          </div>
        </div>



        </form>



          <?php



        endif;


      }

      //----------------Kullanıcı Ayarları Bölümü-----------------
      function kullaniciayarlar($db) {

        $al=$this->sorgula($db,"select * from adminpanel",2);

        echo '  
        <div class="row text-center">
          <div class="col-lg-6 mt-5 mx-auto">
            <div class="card">
              <div class="card-body">
              <h4 class="header-title text-dark">
              <a href="control.php?sayfa=kullaniciekle" class="ti-plus bg-dark p-1 text-white mr-2 mt-3"></a>

                Kullanıcılar</h4>
                <div class="single-table">
                  <div class="table-responsive">
                    <table class="table text-center border table-striped">
                      <thead class="text-uppercase">
                        <tr>
                          <th scope="col">Kullanıcı Adı</th>
                          <th scope="col">İslem</th>
                        </tr>
                      </thead>';


                    while ($result=$al->fetch(PDO::FETCH_ASSOC)) :

                      echo '
                      <tr>
                        <th scope="row" class="border-right">'.$result["kullaniciadi"].'</th>
                        <th scope="row"><a href="control.php?sayfa=kullaniciguncelle&id='.$result["id"].'">
                        <i class="ti-settings text-danger" style="font-size:20px;"></i></a></th>
                        <th scope="row"><a href="control.php?sayfa=kullanicisil&id='.$result["id"].'">
                        <i class="ti-trash text-danger" style="font-size:20px;"></i></a></th>
                      </tr>';

                    endwhile;

                    echo ' </tbody>

                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div> ';

        

      }

      function kullanicisil($db,$id) {

        echo '
        <div class="row m-2">
          <div class="col-lg-12 mt-2" style="border-radius:5px; border:1px; solid #eeeeee;">
            <div class="alert alert-info mt-2 mb-2">Yönetici Silindi</div>
          </div>
        </div>';

        
        header("refresh:2,url=control.php?sayfa=kullaniciayarlar");
        $this->sorgula($db,"delete from adminpanel where id=$id",0);


      }

      function kullaniciekle($db) {

        if($_POST):
          //database işlemleri 

          $kullaniciadi=htmlspecialchars(@$_POST["kullaniciadi"]);
          $sifre=htmlspecialchars(@$_POST["sifre"]);
          $sifre2=htmlspecialchars(@$_POST["sifre2"]);
          
          if(empty($kullaniciadi) || empty($sifre) || empty($sifre2)) :

            echo '<div class="alert alert-danger mt-5">Boş Alan Bırakmayınız</div>';

            header("refresh:2,url=control.php?sayfa=kullaniciekle");

          else:

            if($sifre!=$sifre2) :
            echo '<div class="alert alert-danger mt-5">Şifreler Uyuşmuyor</div>';
            
            header("refresh:2,url=control.php?sayfa=kullaniciekle");

            else:

              $sifreson=md5(sha1(md5($sifre)));
      
              //$ekle=$baglanti->prepare("insert into adminpanel (kullaniciadi,sifre) VALUES($kullaniciadi,$sifre)");
              $this->sorgula($db,"insert into adminpanel (kullaniciadi,sifre) VALUES ('$kullaniciadi','$sifreson')",0);
              

              //$ekle->bindParam(1,$kullaniciadi,PDO::PARAM_STR);
              //$ekle->bindParam(2,$sifreson,PDO::PARAM_STR);
              //$ekle->execute();

              echo '<div class="alert alert-success mt-5">
              <strong>Kullanıcı Ayarları</strong> Başarıyla Güncellendi
              </div>';

              header("refresh:2,url=control.php?sayfa=kullaniciayarlar"); 

            endif;

          endif;


        else:
          //form işlemleri

          ?>
        <form action="control.php?sayfa=kullaniciekle" method="post">

        <div class="row text-center">
        <div class="col-lg-6 mx-auto">
       
        <div class="col-lg-12 mx-auto mt-2 ">
        <h3 class="text-dark">Kullanıcı Ekle</h3>
        </div>

        <div class="col-lg-12 mx-auto mt-2 border">
          <div class="row">
            <div class="col-lg-3 border-right pt-3 text-left">
              <span id="siteayarfont">Kullanıcı Adı</span>
            </div>

              <div class="col-lg-9 p-1">
              <input type="text" name="kullaniciadi" class="form-control"/>
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
            <span id="siteayarfont">Şifre</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="password" name="sifre" class="form-control"/>
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
            <span id="siteayarfont">Şifre Tekrarı</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="password" name="sifre2" class="form-control"/>
              </div>
            </div>
        </div>

                
        <div class="col-lg-12 mx-auto mt-2">
          <input type="submit" name="buton" class="btn btn-dark m-1" value="Kullanıcı Ekle" />
        </div>

          </div>
        </div>



        </form>



          <?php



        endif;



      }

      function kullaniciguncelle($db) {

        //$id=$this->coz($_SESSION["kullanicibilgi"]);
        $id = @$_GET["id"];
        $result=$this->sorgula($db,"select * from adminpanel where id=".$id,1);
        

        if($_POST):
          //database işlemleri 

          @$kullaniciadi=htmlspecialchars(@$_POST["kullaniciadi"]);
          @$eskisifre=htmlspecialchars(@$_POST["eskisifre"]);
          @$yenisifre=htmlspecialchars(@$_POST["yenisifre"]);
          @$yenisifre2=htmlspecialchars(@$_POST["yenisifre2"]);

          if (empty($kullaniciadi) || empty($eskisifre) || empty($yenisifre) || empty($yenisifre2) ) :

            echo '<div class="alert alert-danger mt-5">Bilgiler Boş Bırakılmamalı!</div>';

            header("refresh:2,url=control.php?sayfa=kullaniciayarlar");

          else: 

          $sifrelihal=md5(sha1(md5($eskisifre)));

          if ($result["sifre"]!=$sifrelihal) :

            echo '<div class="alert alert-danger mt-5">Eski Şifre Hatalı Olarak Girildi</div>';

            header("refresh:2,url=control.php?sayfa=kullaniciayarlar");


          else:

            if ($yenisifre!=$yenisifre2) :
              
            echo '<div class="alert alert-danger mt-5">Yeni Şifreler Birbiriyle Uyuşmuyor</div>';

            header("refresh:2,url=control.php?sayfa=kullaniciayarlar");

            else:

            $yenisifreson=md5(sha1(md5($yenisifre)));  
           
            $this->sorgula($db,"update adminpanel set kullaniciadi='$kullaniciadi',sifre='$yenisifreson' where id=$id",0);
           /* $guncelle=$baglanti->prepare("update adminpanel set kullaniciadi=?,sifre=? where id=$id");

            $guncelle->bindParam(1,$kullaniciadi,PDO::PARAM_STR);
            $guncelle->bindParam(2,$yenisifreson,PDO::PARAM_STR);
         
            $guncelle->execute();*/

            echo '<div class="alert alert-success mt-5">
            <strong>Kullanıcı Ayarları</strong> Başarıyla Güncellendi
            </div>';

            header("refresh:2,url=control.php?sayfa=kullaniciayarlar"); 

            endif;

          endif;

          
        endif;  

        else:
          //form işlemleri

          ?>
        <form action="control.php?sayfa=kullaniciguncelle&id=<?php echo $id; ?>"  method="post">

        <div class="row text-center">
        <div class="col-lg-6 mx-auto">
       
        <div class="col-lg-12 mx-auto mt-2 ">
        <h3 class="text-info">Kullanıcı Ayarları</h3>
        </div>

        <div class="col-lg-12 mx-auto mt-2 border">
          <div class="row">
            <div class="col-lg-3 border-right pt-3 text-left">
              <span id="siteayarfont">Kullanıcı Adı</span>
            </div>

              <div class="col-lg-9 p-1">
              <input type="text" name="kullaniciadi" class="form-control" value="<?php echo $result["kullaniciadi"]; ?>" />
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Eski Şifre</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="password" name="eskisifre" class="form-control"/>
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Yeni Şifre</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="password" name="yenisifre" class="form-control"/>
              </div>
            </div>
        </div>

        <div class="col-lg-12 mx-auto border">
          <div class="row">
          <div class="col-lg-3 border-right pt-3 text-left">
              <span>Yeni Şifre Tekrarı</span>
            </div>

            <div class="col-lg-9 p-1">
              <input type="password" name="yenisifre2" class="form-control"/>
              </div>
            </div>
        </div>

        
        <div class="col-lg-12 mx-auto mt-2">
          <input type="submit" name="buton" class="btn btn-dark m-1" value="GÜNCELLE" />
        </div>

          </div>
        </div>

        </form>

        <?php



        endif;



      }

      //----------------Tasarım Tercih Ayarları Bölümü-----------------

      function tasarimtercihayar($db) {

        echo '<div class="row text-center">
        <div class="col-lg-12 border-bottom"><h3 class="mt-3 text-dark">Tasarım Tercih Ayarları</h3></div>';

        $kayitbilgi=$this->sorgula($db,"select * from tasarim",1);

        if(!$_POST):
      
        echo '
        <div class="col-lg-6 mx-auto">
                
        <div class="row card-bordered p-1 m-1 bg-light">

          <div class="col-lg-6 pt-3 border-right border-bottom">
            Hizmetler Tercih
          </div>
          
          <div class="col-lg-6 p-2 border-bottom">
            <form action="" method="post">';

          if($kayitbilgi["ourworkster"]==0) :

            @$ourworkster='checked="checked"';

          else:

            @$ourworkster2='checked="checked"';


          endif;
          
          echo '<label class="mr-4">Açık <input type="radio" name="ourworkster" value="0" '.@$ourworkster.'"></label>
                <label>Kapalı <input type="radio" name="ourworkster" value="1" '.@$ourworkster2.'"></label>
            
          </div>
          

        <div class="col-lg-6 pt-3 border-right border-bottom">
            Referans Tercih
          </div>
          
          <div class="col-lg-6 p-2 border-bottom">
            <form action="" method="post">';

          if($kayitbilgi["referanslarter"]==0) :

            @$referanslarter='checked="checked"';

          else:

            @$referanslarter2='checked="checked"';


          endif;
          
          echo '<label class="mr-4">Açık <input type="radio" name="referanslarter" value="0" '.@$referanslarter.'"></label>
                <label>Kapalı <input type="radio" name="referanslarter" value="1" '.@$referanslarter2.'"></label>
            
          </div>

        <div class="col-lg-6 pt-3 border-right">
            Yorumlar Tercih
          </div>
          
          <div class="col-lg-6 p-2">
            <form action="" method="post">';

          if($kayitbilgi["commentter"]==0) :

            @$commentter='checked="checked"';

          else:

            @$commentter2='checked="checked"';


          endif;
          
          echo '<label class="mr-4">Açık <input type="radio" name="commentter" value="0" '.@$commentter.'"></label>
                <label>Kapalı <input type="radio" name="commentter" value="1" '.@$commentter2.'"></label>
            
          </div>
          
         

          <div class="col-lg-12 border-top p-2">
              <input type="hidden" name="kayitidsi" value="'.$kayitbilgi["id"].'">
              <input type="submit" name="buton" value="Update Work" class="btn btn-dark">
            </form>
          </div>


          </div>
        </div>';


        else:

          $ourworkster=$_POST["ourworkster"];
          $referanslarter=$_POST["referanslarter"];
          $commentter=$_POST["commentter"];

          $kayitidsi=$_POST["kayitidsi"];

          $this->sorgula($db,"update tasarim set ourworkster=$ourworkster,
          referanslarter=$referanslarter,commentter=$commentter where id=$kayitidsi",0);

            echo '<div class="col-lg-6 mx-auto">
            <div class="alert alert-success mt-5">Tasarım Tercihi Ayarları Güncelleme Başarılı<div>
            <div>';

          header("refresh:2,url=control.php?sayfa=tasarimtercihayar");


        endif;
            
   

        echo '</div>';


      }


  }
?>

