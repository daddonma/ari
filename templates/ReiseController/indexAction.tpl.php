  <img src="2.jpg"/>
<div class="reise-container">
<?php foreach($reisen AS $reise): ?>
<div class="reise-card">
    <div class="reise-card-content">
      <div class="header">
        <div class="zeitraum">
           <?= $reise->getBeginn()->format('d.m.Y') ?> - <?= $reise->getEnde()->format('d.m.Y') ?>
        </div>
       <!--<img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>-->
       <img src="2.jpg"/>
      </div>
      <!-- Post Content-->
      <div class="body">
        <div class="kategorie"><?= $reise->getKategorie()->getName()?></div>
        <h1 class="title"><?= $reise->getTitel() ?></h1>
      
        <p class="kurzbeschreibung"><?= $reise->getKurzbeschreibung()?></p>
        <div class="content-footer">
           <hr>
          <a href="#">Mehr Infos</a>
         
          <a href="#">Jetzt buchen </a>

        </div>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>


<div class="reise-container">
  <div class="reise-card">
    <div class="reise-card-content">
      <div class="header">
        <div class="zeitraum">
            01.01.2020 - 31.12.2020
        </div>
       <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>
      </div>
      <!-- Post Content-->
      <div class="body">
        <div class="kategorie">Photos</div>
        <h1 class="title">City Lights in New York</h1>
      
        <p class="kurzbeschreibung">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
        <div class="content-footer">
           <hr>
          <a href="#">Mehr Infos</a>
         
          <a href="#">Jetzt buchen </a>

        </div>
      </div>
    </div>
  </div>

  <div class="reise-card">
    <div class="reise-card-content">
      <div class="header">
        <div class="zeitraum">
            01.01.2020 - 31.12.2020
        </div>
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/169963/photo-1429043794791-eb8f26f44081.jpeg"/>
      </div>
      <!-- Post Content-->
      <div class="body">
        <div class="kategorie">Photos</div>
        <h1 class="title">City Lights in New York</h1>

        <p class="kurzbeschreibung">New York, the largest city in the U.S., is an architectural marvel with plenty of historic monuments, magnificent buildings and countless dazzling skyscrapers.</p>
        <div class="content-footer">
          <hr>
          <a href="#">Mehr Infos</a>
         
          <a href="#">Jetzt buchen </a>

        </div>
      </div>
    </div>
  </div>
</div>


<style>
.reise-card-content {
  position: relative;
  z-index: 1;
  display: block;
  min-width: 270px;
  height: 470px;
  box-shadow: 0px 1px 2px 0px rgba(0, 0, 0, 0.15);
  -webkit-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  -moz-box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);
  box-shadow: 0px 1px 35px 0px rgba(0, 0, 0, 0.3);

}


.reise-card-content .header {
  background: #000000;
  height: 400px;
  overflow: hidden; 

}

.reise-card-content .header .zeitraum {
  position: absolute;
  top: 20px;
  right: 0;
  background: #e74c3c;
  color: white;
  padding: 2px;
}
.reise-card-content .header img {
  display: block;
  width: 120%;
  -webkit-transition: all 0.3s linear 0s;
  -moz-transition: all 0.3s linear 0s;
  -ms-transition: all 0.3s linear 0s;
  -o-transition: all 0.3s linear 0s;
  transition: all 0.3s linear 0s;
}
.reise-card-content .body {
  position: absolute;
  bottom: 0;
  background: #FFFFFF;
  width: 100%;
  padding: 30px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  min-height: 250px;
}
.reise-card-content .body .kategorie {
  position: absolute;
  top: -34px;
  left: 0;
  background: #e74c3c;
  padding: 10px 15px;
  color: #FFFFFF;
  font-size: 14px;
  font-weight: 600;
  text-transform: uppercase;
}
.reise-card-content .body .title {
  margin: 0;
  padding: 0 0 10px;
  color: #333333;
  font-size: 26px;
  font-weight: 700;
}

.reise-card-content .body .kurzbeschreibung {
  display: block; 
  height: auto; 
  opacity: 1;
  color: #666666;
  font-size: 14px;
  line-height: 1.8em;
}

.reise-container {
  max-width: 800px;
  min-width: 640px;
  margin: 0 auto;
}
.reise-container:before,
.reise-container:after {
  content: '';
  display: block;
  clear: both;
}
.reise-container .reise-card {
  width: 50%;
  padding: 0 25px;
  -webkti-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
  float: left;
  margin: .75rem 0 .75rem 0;
}


@media (max-width: 750px) {
    .reise-container .reise-card {
      width: 85%;
    }
}


.body .content-footer {
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  padding: 5px;
}

.body .content-footer hr{
  /*margin: 5px; */
}
</style>

<script type="text/javascript">
	
</script>