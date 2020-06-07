<h2>Reiseverwaltung</h2>
<a href="?controller=reise&action=insert">Neue Reise anlegen</a>
 <table id="reiseTable" class="adminTable">
  <tr>
    <th>Titel</th>
    <th>Region</th>
    <th>Kategorie</th>
    <th>Preis</th>
    <th></th>
    <th></th>
  </tr>

  <?php foreach($reisen AS $reise):?>
  	 <tr>
	    <td><?= $reise->getTitel()?></td>
	    <td><?= $reise->getRegion()->getName(); ?></td>
	    <td><?= $reise->getKategorie()->getName()?></td>
	    <td><?= $reise->getPreis() ?> €</td>
	    <td><a class="icon pencil" href='?controller=reise&action=update&id=<?= $reise->getID()?>' title="Reise bearbeiten"></a></td>
	   	<td><a class="icon trash" href='?controller=reise&action=delete&id=<?= $reise->getID()?>' title="Reise l&ouml;schen"></a></td>
  	</tr>
 
  <?php endforeach; ?>
 
</table> 
