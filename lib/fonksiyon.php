<?php

class kurumsal{

  public $normaltitle,$metatitle,$metadesc,$metakey,$metaauthor
  ,$metaowner,$metacopy,$logoyazisi,$facebook,$twitter,$instagram
  ,$linkedin,$telefonno,$adres,$mail,$slogan,$referans,$notice,$comment,$contact,$worktitle,$haritabilgi,$footer;

  private $baglanti;

  function __construct() { 

    try {

      $this->baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");
      $this->baglanti -> setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    
    }
    
    catch(PDOEXCEPTION $e){
      die($e->getMessage());
    }


    $pulldata=$this->baglanti->prepare("select * from settings");
    $pulldata->execute();
    $queryend=$pulldata->fetch();

    $this->normaltitle=$queryend["title"];
    $this->metatitle=$queryend["metatitle"];
    $this->metadesc=$queryend["metadesc"];
    $this->metakey=$queryend["metakey"];
    $this->metaauthor=$queryend["metaauthor"];
    $this->metaowner=$queryend["metaowner"];
    $this->metacopy=$queryend["metacopy"];
    $this->logoyazisi=$queryend["logoyazisi"];
    $this->facebook=$queryend["facebook"];
    $this->twitter=$queryend["twitter"];
    $this->instagram=$queryend["instagram"];
    $this->linkedin=$queryend["linkedin"];
    $this->telefonno=$queryend["telefonno"];
    $this->adres=$queryend["adres"];
    $this->mail=$queryend["mail"];
    $this->slogan=$queryend["slogan"];
    $this->referanscontent=$queryend["referanscontent"];
    $this->notice=$queryend["notice"];
    $this->comment=$queryend["comment"];
    $this->contact=$queryend["contact"];
    $this->worktitle=$queryend["worktitle"];
    $this->haritabilgi=$queryend["haritabilgi"];
    $this->footer=$queryend["footer"];
    

 
  }


  //Sayfadaki ana resmin çıkması-slogan basımı
    function introimg()  { 
   
    $introcon=$this->baglanti->prepare("select * from intro");
    $introcon->execute();

    while ($result=$introcon->fetch(PDO::FETCH_ASSOC)) :

      echo '<div class="item" style="background-image:url('.$result["imageadr"].');"></div>';

    endwhile;

  }
  
  //about-us sayfası database data çekimi
  function aboutus() {
    $aboutuscon=$this->baglanti->prepare("select * from aboutus");
    $aboutuscon->execute();

    $result=$aboutuscon->fetch();

          echo ' <div class="row">
          <div class="col-lg-6 hakkimizda-img">
          <img src="'.$result["image"].'" alt="" />
          </div>
        
          <div class="col-lg-6 content">
            <h2>'.$result["title"].'</h2>
            <h3>'.$result["content"].'</h3>
          </div>

        </div>';
  }

  //hedefler sayfası veri çekimi
  function ourworks($baglanti,$title=false) { 

    $ourworks=$this->baglanti->prepare("select * from ourworks");
    $ourworks->execute();

  
    echo '<div class="section-header">
        
    <h2>OUR WORKS</h2>
    <p>'.$title.'</p>
    </div>

    <div class="row">';

    while($result=$ourworks->fetch(PDO::FETCH_ASSOC)) :

      echo '
      <div class="col-lg-6">
      <div class="box wow fadeInLeft">
        <div class="icon"><i class="fas fa-desktop"></i>
          <h4 class="title"><a href="#">'.$result["title"].'</a></h4>
            <p class="description">'.$result["content"].'</p>
        </div>
      </div>
    </div>';
    
    endwhile;


    echo '</div>';

  }

  //referanslar veri çekimi
  function referanslar($baglanti,$title=false) {
    $referans=$this->baglanti->prepare("select * from referanslar");
    $referans->execute();
  
    echo '<div class="section-header">
    <h2>REFERENCES</h2>
    <p>'.$title.'</p>
    </div>
    
    <div class="owl-carousel clients-carousel">';
  
    while ($result=$referans->fetch(PDO::FETCH_ASSOC)) :
  
    echo '<img src="'.$result["image"].'" alt="" />';
  
    endwhile;
  
    echo '</div>';
  }

  //yorumlar veri çekimi
  function comment($baglanti,$title=false){
   
    $comment=$this->baglanti->prepare("select * from comment");
    $comment->execute();

    echo '<div class="section-header">
    <h2>COMMENTS ABOUT COMMUNITY</h2>
    <p>'.$title.'</p>
    </div>

    <div class="owl-carousel testimonials-carousel">';

    while ($result=$comment->fetch(PDO::FETCH_ASSOC)) :
      
     echo '<div class="testimonial-item">
        <p>
          <img src="img/yorum/sol.png" class="quote-sign-left" />
          '.$result["content"].'
          <img src="img/yorum/sag.png" class="quote-sign-right" /> 
        </p>
        <img src="img/yorum/yorum.jpg" class="testimonial-img" alt="" />
        <h3>'.$result["name"].'</h3>
      </div>';

    endwhile;

    echo '</div>'; 
  }


}

?>

