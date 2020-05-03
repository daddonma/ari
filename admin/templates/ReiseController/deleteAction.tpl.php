<form action="<?= $currentUrl ?>" method="POST">

<p>
<ul>
	<li>Titel: <?= $reise->getTitel()?></li>
	<li>Preis: <?= $reise->getPreis() ?> €</li>
</ul>
</p>

<br><br>
<input type="submit" name="confirm" value="Löschen bestätigen">
</form>


