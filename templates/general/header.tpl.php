<header id="header">
 <?php require 'navi.tpl.php'; ?>
 <?php require 'teaserbox.tpl.php'; ?>


<!-- Suchfeld -->
 <form action="index.php" id="search" method="GET">
 	<input type="hidden" name="controller" value="reise" />
 	<input type="hidden" name="action" value="uebersicht" />
    <input type="search" name="searchStr" value="<?= $searchStr?>" placeholder="Reise suchen" />
 </form>

</header>