<?php

include_once("lib/fonksiyon.php");

class tasarim extends kurumsal {


  public $ourworkster,$referanslarter,$commentter;

  function __construct() {

    $baglanti = new PDO("mysql:host=localhost;dbname=kurumsal;charset=utf8","root","");

    $introcon=$baglanti->prepare("select * from tasarim");
    $introcon->execute();

    $gelen=$introcon->fetch();

    $this->ourworkster=$gelen["ourworkster"];
    $this->referanslarter=$gelen["referanslarter"];
    $this->commentter=$gelen["commentter"];

    parent::__construct();

  

  }

  function  linkKontrol() {

    if ($this->ourworkster==0):

      echo '<li><a href="#hizmetler">Our Works</a></li>';

     
    endif;

    
  }

  function linkKontrol2() {

    if($this->referanslarter==0):
      echo '<li><a href="#referanslar">References</a></li>';

    endif;
  }

  function linkKontrol3() {
    if($this->commentter==0):
  
      echo '<li><a href="#yorumlar">Comments</a></li>';

    endif;
  }


  function ourworksTasarimDuzen($baglanti) {

    if($this->ourworkster==0) : 

      echo '  <section id="hizmetler" class="wow fadeInUp">
      <div class="container">';
      
      parent::ourworks($baglanti,$this->worktitle);

      echo '</div></section>';

    endif;

  }

  function referanslarTasarimDuzen($baglanti) {

    if($this->referanslarter==0) : 

      echo '<section id="referanslar" class="wow fadeInUp">
      <div class="container">';

      parent::referanslar($baglanti,$this->referanscontent);

      echo '</div></section>';

    endif;

    
  } 

  function commentTasarimDuzen($baglanti) {

    if($this->commentter==0) : 

      echo '<section id="yorumlar" class="wow fadeInUp">
      <div class="container">';

       parent::comment($baglanti,$this->comment);


      echo '</div></section>';

    endif;
  } 

}

?>

