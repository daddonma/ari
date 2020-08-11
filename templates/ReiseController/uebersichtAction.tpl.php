

<nav id="navKategorie" class="filterKategorie" onclick="return true">
    <ul>

      <li class="<?php if(empty($kategorieID)): ?>active<?php endif; ?>">
         <a href="?controller=reise&action=uebersicht&kategorieID=0">Alle Kategorien</a>

      </li>
      <?php foreach($kategorien AS $kategorie): ?>
        <li class="<?php if($kategorie->getID() == $kategorieID) echo active ?>">
            <a href="?controller=reise&action=uebersicht&kategorieID=<?= $kategorie->getID()?>"><?= $kategorie->getName()?></a>
        </li>
      <?php endforeach?>
    
    </ul>
</nav>

<!-- Formular für mobile devices-->
<form id="formFilterKategorie" action="?controller=reise&action=uebersicht" method="POST" class="filterKategorie">
  <select name="kategorieID">
    <option value="" <?php if(empty($kategorie)): ?> selected <?php endif; ?>>Alle Kategorien</option>
    <?php foreach($kategorien AS $kategorie): ?>
        <option value="<?= $kategorie->getID()?>" <?php if($kategorie->getID() == $kategorieID):?> selected <?php endif; ?>>
          <?= $kategorie->getName()?>
        </option>
    <?php endforeach; ?>
  </select>
</form>

  <?php if(empty($reisen)): ?>
  <div class="flashMessage error">
    Es wurde keine Reise gefunden.
  </div>
<?php endif; ?>
<div class="reise-container clearfix">
  <?php foreach($reisen AS $reise): ?>
  <div class="reise-card">
      <div class="reise-card-content">
        <div class="header" style="background: url('<?= $reise->getVorschaubildPfad()?>') no-repeat left center;">
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
