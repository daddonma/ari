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

<style>

#autocomplete {
	position: absolute;
	width: 100%;
}

#autocomplete li {


	background-color: white;
	border-right: 2px solid rgba(255, 255, 255, 0.6);
	 border-bottom: 2px solid rgba(255, 255, 255, 0.6);

	list-style: none;
    display: table;
margin-left: -40px;
width: 100%;
border: 1px solid #ccc;
border-radius: 5px;
margin-top: 1px;
 background-color: rgba(255, 255, 255, 0.85);
    /*
    padding: 0;
    margin:0;
    
   */

   cursor: pointer;
    

}
#autocomplete li:hover {
  background: yellow;
}


</style>