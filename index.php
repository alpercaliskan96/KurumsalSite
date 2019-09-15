<?php

include_once("lib/fonksiyon.php");
include_once("lib/tasarim.php");
global $baglanti;
$sinif= new kurumsal;
$tasarim= new tasarim;


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
  <title><?php echo $sinif->normaltitle; ?></title>
  <meta name="title" content="<?php echo $sinif->metatitle; ?>" />
  <meta name="description" content="<?php echo $sinif->metadesc; ?>" />
  <meta name="keywords" content="<?php echo $sinif->metakey; ?>" />
  <meta name="author" content="<?php echo $sinif->metaauthor; ?>" />
  <meta name="owner" content="<?php echo $sinif->metaowner; ?>" />
  <meta name="copyright" content="<?php echo $sinif->metacopy; ?>" />

  <!-- Kütüphaneler -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="lib/sticky/sticky.js"></script>
  <script src="js/main.js"></script>



  <!-- Fontlar -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap style dosyası -->
  
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

  <!-- css dosyaları -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- style-->
  <link href="css/style.css" rel="stylesheet">

  <script>
  $(document).ready(function(e) {

    $("#gonderbtn").click(function() {

      $.ajax({
        type:"POST",
        url:'lib/mail/gonder.php',
        data:$('#mailform').serialize(),
        success: function(cevap) {
        $('#mailform').trigger("reset");
        $('#formtutucu').fadeOut(500);
        $('#mesajsonuc').html(cevap);

        },
      });

    });

  });
  </script>

</head>

<body id="body">

<!-- ÜST BAR YAPIMI -->
<section id="topbar" class="d-none d-lg-block">

<div class="container clarefix">
  
  <div class="contact-info float-left">
  <i class="fa fa-envelope-o"></i><a href="mailto:<?php echo $sinif->mail; ?>"><?php echo $sinif->mail; ?></a>
  <i class="fa fa-phone"></i><a href="tel:<?php echo $sinif->telefonno; ?>"><?php echo $sinif->telefonno; ?></a>
  </div>

  <div class="social-links float-right">
  <a href="<?php echo $sinif->facebook; ?>" class="facebook"><i class="fab fa-facebook"></i></a>
    <a href="<?php echo $sinif->twitter; ?>" class="twitter"><i class="fab fa-twitter"></i></a>
      <a href="<?php echo $sinif->instagram; ?>" class="instagram"><i class="fab fa-instagram"></i></a>
        <a href="<?php echo $sinif->linkedin; ?>" class="linkedin"><i class="fab fa-linkedin"></i></a>
    </div>
  </div>
</section>

  <!--HEADER YAPIMI -->
    <header id="header">
      
      <div class="container">
      <nav id="nav-menu-container">
          <ul class="nav-menu">

          <li class="menu-active"><a href="#body">Home Page</a></li>
          <li><a href="#hakkimizda">About Us</a></li>
          <?php $tasarim->linkKontrol(); ?>
          <?php $tasarim->linkKontrol2(); ?>
          <?php $tasarim->linkKontrol3(); ?>
          <li><a href="#iletisim">Contact</a></li>
          
          </ul>
        </nav>

        <div id="logo" class="pull-left">
        
            <img style="position: absolute;top: 19px;"
            src="http://localhost/kurumsalsite/yonetim/assets/images/logo/logocvg.png" alt="logo">

        </div>     
      </div>
    </header>

 <!--INTRO YAPIMI -->
    <section id="intro">
      <div class="intro-content">
        <h2><?php echo htmlspecialchars_decode($sinif->slogan); ?></h2>
      </div>

      <div id="intro-carousel" class="owl-carousel">

      <?php $sinif->introimg(); ?>

      </div>  

    </section>
    

 <!--ANAMENU YAPIMI -->
<main id="main">

  <section id="hakkimizda" class="wow fadeInUp">
    <div class="container">
      <?php $sinif->aboutus(); ?>
    </div>
  </section>



<!--HİZMETLER YAPIMI -->

  <?php $tasarim->ourworksTasarimDuzen($baglanti); ?>


<!-- Comment Yapımı -->

<?php $tasarim->commentTasarimDuzen($baglanti); ?>


<!-- REFERANSLAR Bölümü Yapımı -->

<?php $tasarim->referanslarTasarimDuzen($baglanti); ?>


 <!-- İLETİSİM BÖLÜMÜ YAPIMI -->

 <section id="iletisim" class="wow fadeInUp">
  <div class="container">

    <div class="section-header">
    <h2>CONTACT</h2>
    <p><?php echo $sinif->contact; ?></p>
    </div>

    <div class="row contact-info">
      <div class="col-md-4">
        <div class="contact-address">
          <i class="ion-ios-location-outline"></i>
          <h3>Address</h3>
          <address><?php echo $sinif->adres; ?></address>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-phone">
          <i class="ion-ios-telephone-outline"></i>
          <h3>Phone Number</h3>
          <p><a href="tel:<?php echo $sinif->telefonno; ?>"><?php echo $sinif->telefonno; ?></a></p>
        </div>
      </div>

      <div class="col-md-4">
        <div class="contact-email">
          <i class="ion-ios-email-outline"></i>
          <h3>Mail</h3>
          <p><a href="mailto:<?php echo $sinif->mail; ?>"><?php echo $sinif->mail; ?></a></p>
        </div>
      </div>

    </div>
  </div>
    
    <div class="container mb-4">
      <iframe src="<?php echo $sinif->haritabilgi; ?>" width="100%" height="380" frameborder="0" style="border:0" allowfullscreen>
      </iframe> 
    </div>

    <div class="container">
      <div class="form">
        <div id="mesajsonuc"></div>

        <div id="formtutucu">

        <form id="mailform">

        <div class="form-row">
          <div class="form-group col-md-6">
            <input type="text" name="isim" class="form-control" placeholder="Your Name" required="required" />
          </div>

          <div class="form-group col-md-6">
            <input type="text" name="mail" class="form-control" placeholder="Mail Address" required="required" />
          </div>
        
        </div>

        <div class="form-group">
        <input type="text" name="konu" class="form-control" placeholder="Message Subject" required="required" />
        </div>
        
        <div class="form-group">
        <textarea class="form-control" name="mesaj" placeholder="Message" rows="5"></textarea>
        </div>

        <div class="text-center"><input type="button" value="SEND" id="gonderbtn" class="btn btn-info" /></div>

        
        </form>
        </div>
      </div>
    </div>
</section>
</main>

<!-- Footer -->

<footer id="footer">
      <div class="container">
        <div class="copyright">
        <?php echo $sinif->footer; ?>
        </div>
        <div class="credits"><?php echo $sinif->metatitle; ?></div>
      </div>
</footer>
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  </body>
</html>
