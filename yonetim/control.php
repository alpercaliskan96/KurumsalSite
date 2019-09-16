<?php include_once("assets/fonksiyon.php"); $yonetim=new yonetim;
$yonetim->kontrolet("cot");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta charset="utf-8">
   
    <title>ADU COMPUTER VISION GRAPHICS SOCIETY</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">    
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">   
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js"></script>
</head>

<body>
  
<div id="preloader">
  <div class="loader"></div>
</div>

  <div class="page-container">
    <div class="sidebar-menu">
      <div class="sidebar-header">
        <div class="logo">
        <a href="control.php?sayfa=siteayar"><img src="assets/images/logo/logocvg.png" alt="logo"></a>
      </div>
    </div>

  <div class="main-menu">
    <div class="menu-inner">
      <nav>
        <ul class="metismenu" id="menu">
        
        <li><a href="control.php?sayfa=introayar"><i class="ti-image"></i><span>İntro Ayarları</span></a></li>
        <li><a href="control.php?sayfa=hakkimizda"><i class="ti-star"></i><span>Hakkımızda Ayarları</span></a></li>
        <li><a href="control.php?sayfa=ourworks"><i class="ti-clip"></i><span>Hedefler Ayarları</span></a></li>
        <li><a href="control.php?sayfa=yorumlar"><i class="ti-comment-alt"></i><span>Yorum Ayarları</span></a></li>
        <li><a href="control.php?sayfa=referans"><i class="fa fa-thumbs-up"></i><span>Referans Ayarları</span></a></li>
        <li><a href="control.php?sayfa=gelenmesaj"><i class="fa fa-envelope"></i><span>Gelen Mesaj Ayarları</span></a></li>
        

        <li><a href="javascript:void(0)" aria-expanded="true">
          <i class="fa fa-cog"></i><span>Genel Ayarlar</span></a>
        
          <ul class="collapse">
            <li><a href="control.php?sayfa=siteayar"><i class="ti-settings"></i><span>Site Ayarları</span></a></li>
            <li><a href="control.php?sayfa=mailayar"><i class="fa fa-envelope"></i><span>Mail Ayarları</span></a></li>
            <li><a href="control.php?sayfa=tasarimtercihayar"><i class="fa fa-edit"></i><span>Tasarım Ayarları</span></a></li>
          </ul>
        </li>


        </ul>
      </nav>
    </div>
  </div>


  </div>

  <div class="main-content2">
    <div class="header-area">
      <div class="row align-items-center">
        <div class="col-md-6 col-sm-8 clearfix">
          <div class="nav-btn pull-left">
            <span></span>
            <span></span>
            <span></span>
          </div>
        </div>

      <div class="col-sm-6 clearfix">
        <div class="user-profile pull-right" style="max-height:50px;">
          
          <h4 class="user-name dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user mr-2"></i><?php echo $yonetim->kullaniciadial($baglanti); ?><i class="fa fa-angle-down"></i></h4>
          <div class="dropdown-menu">

            <a class="dropdown-item" href="control.php?sayfa=kullaniciayarlar">Kullanıcı Ayarları</a>
            <a class="dropdown-item" href="control.php?sayfa=cikis">Çıkış</a>
            </div>
          </div>
        </div>    
      </div>
    </div>
  </div>
  
   
  
  <div class="main-content-inner">
      <div class="row">
        <div class="col-lg-12 mt-2 bg-white text-center">

        
        <?php 
          @$sayfa=$_GET["sayfa"];

          switch ($sayfa):
            
            case "siteayar":
            $yonetim->siteayar($baglanti);
            break;

            case "cikis":
            $yonetim->cikis($baglanti);
            break;

            //---------------------

            
            case "introayar":
            $yonetim->introayar($baglanti);
            break;

            case "introresimguncelle":
            $yonetim->introresimguncelle($baglanti);
            break;

            case "introresimsil":
            $yonetim->introresimsil($baglanti);
            break;

            case "introresimekle":
            $yonetim->introresimekle($baglanti);
            break;

            //-----------------------

            case "hakkimizda":
            $yonetim->hakkimizda($baglanti);
            break;

            //-----------------------
            
            case "ourworks":
            $yonetim->ourworks($baglanti);
            break;

            case "ourworksguncelle":
            $yonetim->ourworksguncelle($baglanti);
            break;

            case "ourworkssil":
            $yonetim->ourworkssil($baglanti);
            break;

            case "ourworksekle":
            $yonetim->ourworksekle($baglanti);
            break;

            //-----------------------
            case "referans":
            $yonetim->referans($baglanti);
            break;

            case "referansekle":
            $yonetim->referansekle($baglanti);
            break;

            case "referanssil":
            $yonetim->referanssil($baglanti);
            break;

            //-----------------------
            case "yorumlar":
            $yonetim->yorumlar($baglanti);
            break;

            case "yorumekle":
            $yonetim->yorumekle($baglanti);
            break;

            case "yorumguncelle":
            $yonetim->yorumguncelle($baglanti);
            break;

            case "yorumsil":
            $yonetim->yorumsil($baglanti);
            break;

            //-----------------------
            case "gelenmesaj":
            $yonetim->gelenmesaj($baglanti);
            break;

            case "mesajoku":
            $yonetim->mesajoku($baglanti,$_GET["id"]);
            break;

            case "mesajarsivle":
            $yonetim->mesajarsivle($baglanti,$_GET["id"]);
            break;

            case "mesajsil":
            $yonetim->mesajsil($baglanti,$_GET["id"]);
            break;


            //-----------------------

            case "mailayar":
            $yonetim->mailayar($baglanti);
            break;

            //-----------------------
            case "kullaniciayarlar":
            $yonetim->kullaniciayarlar($baglanti);
            break;

            case "kullanicisil":
            $yonetim->kullanicisil($baglanti,$_GET["id"]);
            break;

            case "kullaniciekle":
            $yonetim->kullaniciekle($baglanti);
            break;

            case "kullaniciguncelle":
            $yonetim->kullaniciguncelle($baglanti);
            break;

            //-----------------------

            default:
            $yonetim->istatistikbar($baglanti);

            //-----------------------
            case "tasarimtercihayar":
            $yonetim->tasarimtercihayar($baglanti);
            break;
            


            
          endswitch;

        ?>


        </div>
      </div>
    </div>
  </div>
</div>



    <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>    
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/metisMenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.min.js"></script>
    <script src="assets/js/jquery.slicknav.min.js"></script> 
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    

</body>

</html>
