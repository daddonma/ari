
<main class="clearfix">
	

	<div style="float: left; width: 65%;">
			<h1 style="text-align: center"><?= $reise->getTitel();?></h1>

			<a href="<?= $reise->getDetailbildPfad() ?>" >
			 		<img src="<?= $reise->getDetailbildPfad() ?>"/>
			</a>
		<p>
			<?= $reise->getBeschreibung()?>

			<p>
				<a type="button" href="?controller=reise&action=buchen&id=<?= $reise->getID(); ?>">Jetzt buchen! </a>
			</p>
		</p>

	</div>
	<div class="reise-info" style="float: right; width: 33%; padding-top: 10px;">

		<div class="header" style="min-height: 1.5rem; border: 1px solid grey; text-align: center; padding: .5rem; color: black; background-color: var(--nav_bg_color_2);">
			Informationen zur Reise
		</div>

		<div class="content" style="min-height: 5rem; border: 1px solid grey; ">

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

<style>
img {
  border: 1px solid #ddd; /* Gray border */
  border-radius: 4px;  /* Rounded border */
  padding: 5px; /* Some padding */
  width: 250px; /* Set a small width */
  margin: auto;
}

/* Add a hover effect (blue shadow) */
img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}
</style>
