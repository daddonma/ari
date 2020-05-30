<div id="filterBox">
  <p>
<h3>Filter</h3>
  <form id="filter" action="?controller=reise&action=uebersicht" method="post">
    <select name="kategorieID">
      <?= $kategorieOptionList ?>
    </select>

    <select name="regionID">
      <?= $regionenOptionList ?>
    </select>

    <input type="submit" name="reset" value="Filter löschen">
  </form>
  </p>
  

</div>
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
      <div class="body">
        <div class="kategorie"><?= $reise->getKategorie()->getName()?></div>
        <h1 class="title"><?= $reise->getTitel() ?></h1>
      
        <p class="kurzbeschreibung"><?= $reise->getKurzbeschreibung()?></p>
        <div class="content-footer">
           <hr>
          <a href="?controller=reise&action=detail&id=<?= $reise->getID(); ?>">Mehr Infos</a>
         
          <a href="?controller=reise&action=buchen&id=<?= $reise->getID(); ?>">Jetzt buchen </a>

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

<script type="text/javascript">
	
</script>