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

<div class="clearfix">
	<div id="welcome" class="blocksatz">
		<h2>Herzlich Willkommen</h2> 

		<p>
			Wir freuen uns, Sie bei <strong>ARI</strong> begrüßen zu dürfen.<br>
			<strong>ARI</strong> steht für <b>A</b>benteuer<b>R</b>eisen <b>I</b>nternational
		</p>

		<p>
			Wir sind Ihr spezialist für Internationale Abenteuerreisen
		</p>

		<p>
			Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. 
		</p>
	</div>

	<div id="teaserbox">
		
		<div id="teaser-container">
			<?php foreach($reisen AS $reise): ?><div  class="teaser <?= 'ID' . $reise->getId()?>" style="background: url('<?= $reise->getVorschaubildPfad()?>') no-repeat left center;
	    background-size: cover; border: 2px solid black">	
				<h1><?= $reise->getTitel()?></h1>
				<a href="?controller=reise&action=detail&id=<?= $reise->getId()?>"> mehr Infos </a> 
			</div><?php endforeach; ?>
		</div>
	
		<a class="slideshow prev">&#10094;</a>
    	<a class="slideshow next">&#10095;</a> 

	</div>
</div>
