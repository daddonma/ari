<h2>Vielen Dank, dass Sie die Reise <?= $reise->getTitel() ?> buchen möchten!</h2>

<p> Sie haben es fast geschafft!</p>

<p>
	Der Gesamtpreis in Höhe von <b><?= $buchung->getGesamtpreis() ?> €</b> setzt sich wie folgt zusammen: <br>
	<?= $reise->getPreis() ?> € à <?= $buchung->getPersonenanzahl() ?> Personen = <?= $buchung->getGesamtpreis() ?> €
</b>

<p>

Wir haben folgende Daten von Ihnen aufgenommen. Bitte prüfen Sie diese genau.<br>
Durch klicken des Buttons "Buchung abschließen" bestätigen Sie, dass diese Daten stimmen und gehen einen rechtspflichtigen Kaufvertrag ein.
</p>

<p>
	<table class="buchungUebersichtTable">
		<tr>
			<th>Reise</th>
			<th>Zeitraum</th>
			<th>Personen</th>
			<th>Kosten</th>
		</tr>
		<tr>
			<td><?= $reise->getTitel()?></td>
			<td> <?= $reise->getBeginn()->format('d.m.Y') ?> - <?= $reise->getEnde()->format('d.m.Y') ?></td>
			<td> <?= $buchung->getPersonenanzahl() ?></td>
			<td><?= $buchung->getGesamtpreis() ?> €</td>
		</tr>

		<tr>
			<th>Ihr Name</th>
			<th>Geburtsdatum</th>
			<th>Anschrift</th>
			<th>Kontakt</th>
		</tr>

		<tr>
			<td>
				<?= $person->getAnrede()->getBezeichnung() . ' ' . $person->getTitel() . ' ' . $person->getVorname() . ' ' . $person->getNachname()?>
			</td>

			<td>
				<?= $person->getGeburtsdatum()->format('d.m.Y')?>
			</td>
			<td> 
				<?= $person->getStrasse() . " " . $person->getHausnummer()?> <br>
				<?= $person->getPlz() . " " . $person->getOrt()?>
			</td>
			<td> 
				<?= $person->getEmail() ?> <br>
				<?= $person->getTelefonnummer() ?>
			</td>
		</tr>
	</table>
</p>

 <form action="index.php" id="search" method="GET">
 	<input type="hidden" name="controller" value="buchung" />
 	<input type="hidden" name="action" value="insert" />
 	<input type="hidden" name="reise" value="<?= $reise->getId() ?>" />
    <input type="submit" value="Buchung abschliessen" />
 </form>

