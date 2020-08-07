<nav id="navKategorie" onclick="return true">
    <ul>

      <?php foreach($kategorien AS $kategorie): ?>
        <li class="<?php if($kategorie->getID() == $kategorieID) echo active ?>">
            <a href="?controller=reise&action=uebersicht&kategorieID=<?= $kategorie->getID()?>"><?= $kategorie->getName()?></a>
        </li>
      <?php endforeach?>
    
    </ul>
</nav>

<div class="reise-container clearfix">
  <?php foreach($reisen AS $reise): ?>
  <div class="reise-card">
      <div class="reise-card-content">
        <div class="header" style="background: url('<?= $reise->getVorschaubildPfad()?>') no-repeat left center;
      background-size: cover;">
          <div class="zeitraum">
             <?= $reise->getBeginn()->format('d.m.Y') ?> - <?= $reise->getEnde()->format('d.m.Y') ?>
          </div>
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
