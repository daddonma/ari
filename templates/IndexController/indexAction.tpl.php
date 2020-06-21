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
	<div style="float: left; width: 50%">
		<h2>Herzlich Willkommen</h2> 
		<p>
			Wir freuen uns bei ARI begrüßen zu dürfen.
		</p>
		<p>
			Ihrem spezialisten für Internationale Abenteuerreisen
		</p>
		<p>
			Bei jeglichen Fragen stehe wir Ihnen über unsere Kontaktseite gerne zur Verfügung.
		</p>
	</div>

	<div id="teaserbox" style="float: right; width: 50%; box-sizing: border-box; position: relative">
		
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
