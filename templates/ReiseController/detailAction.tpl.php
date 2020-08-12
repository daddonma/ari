
<main class="clearfix">
	

	<div id="reise-content">
			<h1 style="text-align: center"><?= $reise->getTitel();?></h1>

			<a href="<?= $reise->getDetailbildPfad() ?>" >
			 		<img src="<?= $reise->getDetailbildPfad() ?>"/>
			</a>
		<p>
			<?= $reise->getBeschreibung()?>
		</p>

	</div>

	<div id="reise-info">

		<div class="header">
			Informationen zur Reise
		</div>

		<div class="content">

			<ul>
				<li>
					Beginn: <?= $reise->getBeginn()->format('d.m.Y')?>
				</li>
				<li>
					Ende: <?= $reise->getEnde()->format('d.m.Y') ?> 
				</li>
				<li>
					Kategorie: <?= $reise->getKategorie()->getName()?>
				</li>
				<li>
					Region: <?= $reise->getRegion()->getName()?>
				</li>
				<li>
					Kosten: <?= $reise->getPreis() ?> €
				</li>
			</ul>

		</div>
	</div>
	

</main>

<div>
	<p>
		<a type="button" href="?controller=reise&action=buchen&id=<?= $reise->getID(); ?>">Jetzt buchen! </a>
	</p>

</div>


<style>

</style>
