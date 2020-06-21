<header id="header">
 <?php require 'navi.tpl.php'; ?>
 <?php //require 'teaserbox.tpl.php'; ?>

 	 <h1>A.R.I.</h1><br>
 	 <h2>Abenteuerreisen International</h2>

	<!-- Suchfeld -->
	<form action="index.php" id="search" method="GET">
	 	<input type="hidden" name="controller" value="reise" />
	 	<input type="hidden" name="action" value="uebersicht" />
	    <input type="search" name="searchStr" value="<?= $searchStr?>" placeholder="Reise suchen" autocomplete="off"/>
	    <ul id="autocomplete"> </ul>
 	</form>

</header>
