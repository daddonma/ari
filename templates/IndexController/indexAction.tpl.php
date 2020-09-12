<noscript>

	<p class="flashMessage error">
		JavaScript ist in Ihrem Browser deaktiviert. Um diese Seite uneingeschränkt nutzen zu können, aktivieren Sie JavaScript bitte wieder.
	</p>

	<style type="text/css">

		#teaserbox .teaser:first-child {
		   display: block;
		}	


		#teaserbox .prev, #teaserbox .next {
		  display: none;
		}
				
	</style>

</noscript>

<section id="welcome" class="blocksatz">
	<h2>Herzlich Willkommen</h2> 

	<p>
		Wir freuen uns, Sie bei <strong>ARI</strong> begrüßen zu dürfen.<br>
		<strong>ARI</strong> steht für <b>A</b>benteuer<b>R</b>eisen <b>I</b>nternational
	</p>

	<p>
		Wir sind Ihr spezialist für Internationale Abenteuerreisen
	</p>

	<p>
		Auf unserer <a href="?controller=reise">Reiseübersicht</a> können Sie unsere Angebotenen Reisen ansehen und diese nach Kategorie filtern. 
	</p>
	
	<p>
		Sie möchten uns erst besser kennen lernen? Dann stöbern Sie doch <a href="?controller=index&action=aboutUs">hier</a>.
	</p>

	<p>
		<h2>Dia-Abende</h2>
		Einmal im Monat finden unsere Dia-Abende statt, in denen unsere Kunden Ihre Reiseerlebnisse mit vielen weiteren Reiseinteressierten teilen können.
		Sie möchten auch daran teilnehmen? Dann sprechen Sie uns gerne darauf an.
	</p>

</section>

<section id="teaserbox">
	
	<div id="teaser-container">
		<?php foreach($reisen AS $reise): ?><div  class="teaser <?= 'ID' . $reise->getId()?>" style="background: url('<?= $reise->getVorschaubildPfad()?>') no-repeat left center;
    background-size: cover; border: 2px solid black">	
			<h1><?= $reise->getTitel()?></h1>
			<a href="?controller=reise&action=detail&id=<?= $reise->getId()?>"> mehr Infos </a> 
		</div><?php endforeach; ?>
	</div>

	<a class="slideshow prev">&#10094;</a>
	<a class="slideshow next">&#10095;</a> 

</setion>

