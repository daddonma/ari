<p>
<h3>Hallo <?= $buchung->getPerson()->getVorname() . " " . $buchung->getPerson()->getNachname()?></h3>
</p>

<br>

<p>
Wir bestätigen hiermit den Eingang Ihrer Buchung der folgenden Reise: <br>
<?= $buchung->getReise()->getTitel()?>
</p>
<br><br>

<p>
Alle weiteren Informationen erhalten Sie per Mail an folgende E-Mail Adresse: <br>
<?= $buchung->getPerson()->getEmail()?>
</p>
<br><br>

<p>
Für alle weiteren Fragen Steht Ihnen unser Serviceteam jederzeit gerne zur Verfügung.
</p>
<br><br>

<p>
Vielen Dank für Ihr Vertrauen und Viel Vernügen auf der Reise.
</p>
