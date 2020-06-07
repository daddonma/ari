<h2>Übersicht aller Buchungen</h2>
 <table id="buchungTable" class="adminTable">
  <tr>
    <th>Reise</th>
    <th>Ansprechpartner</th>
    <th>Einzelpreis</th>
    <th>Zeitraum</th>
  </tr>

  <?php foreach($buchungen AS $buchung):?>
  	 <tr>
	    <td><?= $buchung->getReise()->getTitel()?></td>
	    <td>
        <?= $buchung->getPerson()->getVorname() . " " . $buchung->getPerson()->getNachname()  ?> <br>
        <?= $buchung->getPerson()->getStrasse() . " " . $buchung->getPerson()->getHausnummer() ?> <br> 
        <?= $buchung->getPerson()->getOrt() ?><br> 
      </td>
	    <td>
        <?= $buchung->getReise()->getPreis() ?> € <br>
        <?= $buchung->getPersonenanzahl() ?> Personen <br>
        = <?= $buchung->getGesamtpreis() ?>
      </td>
	    <td><?= $buchung->getReise()->getBeginn()->format('d.m.Y') . " - " .  $buchung->getReise()->getEnde()->format('d.m.Y') ?></td>
    </tr>
 
  <?php endforeach; ?>
 
</table> 
