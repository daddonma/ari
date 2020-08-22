
<form caction="<?= $currentUrl ?>" method="post" enctype="multipart/form-data">

    <fieldset>
        <legend>Neue Reise </legend>
        <label for="inputName" class="form-label">Titel:</label>
        <input id="inputName" type="text" name="titel" placeholder="Titel" value="<?= $reise->getTitel()?>"/>
        
        <label for="selectRegion" class="form-label">Region: <sup>*</sup></label>
        <select id="selectRegion" name="regionID">
            <?= $regionenOptionList ?>
        </select>

        <label for="selectKategorie" class="form-label">Kategorie: <sup>*</sup></label>
        <select id="selectKategorie" name="kategorieID">
            <?= $kategorienOptionList ?>
        </select>

        <label for="inputPreis" class="form-label">Preis: <sup>*</sup></label>
        <input id="inputPreis" type="number" name="preis" step="0.1" placeholder="in €" value="<?= $reise->getPreis()?>"/>


        <label for="inputBeginn" class="form-label">Beginn: <sup>*</sup></label>
        <input id="inputBeginn" type="date" name="beginn" value="<?= $reise->getBeginn()->format('Y-m-d')?>"/>

        <label for="inputEnde" class="form-label">Ende: <sup>*</sup></label>
        <input id="inputEnde" type="date" name="ende" value="<?= $reise->getEnde()->format('Y-m-d')?>"/>

        <label for="kurzbeschreibung" class="form-label">Kurzbeschreibung:<sup>*</sup></label>
        <input id="kurzbeschreibung" type="text" name="kurzbeschreibung" max=255 placeholder="kurzbeschreibung" value="<?= $reise->getKurzbeschreibung()?>"/>


        <label for="beschreibung" class="form-label">Beschreibung:<sup>*</sup></label>
        <div id="beschreibung" style="height: 200px; background-color:white">
            <?= $reise->getBeschreibung()?>  
        </div>
            
        <input type="hidden" name="beschreibung">

    </fieldset>

    <fieldset>
        <legend>Bilder</legend>

        <label for="inputVorschaubild" class="form-label" class="form-label">Vorschaubild: <sup>*</sup></label>
        <input id="inputVorschaubild" type="file" name="vorschaubild"/>
    
        <label for="inputDetailbild" class="form-label">Detailbild: <sup>*</sup></label>
        <input id="inputDetailbild" type="file" name="detailbild" />

    </fieldset>

    <div>
         <button class="submit" type="submit">Reise speichern</button>
    </div>
</form>
<?php /*
<form class="contact_form" action="<?= $currentUrl ?>" method="post" name="contact_form" enctype="multipart/form-data">
	<ul>
	    <li>
	        <label for="inputName" class="form-label">Titel:</label>
	        <input id="inputName" type="text" name="titel" placeholder="Titel" value="<?= $reise->getTitel()?>"/>
            <span class="form_hint">Pflichtfeld. Max. 100 Zeichen</span>
	    </li>
	    <li>
		    <label for="selectRegion" class="form-label">Region: <sup>*</sup></label>
		    <select id="selectRegion" name="regionID">
		    	<?= $regionenOptionList ?>
		    </select>
		</li>
        <li>
            <label for="selectKategorie" class="form-label">Kategorie: <sup>*</sup></label>
            <select id="selectKategorie" name="kategorieID">
                <?= $kategorienOptionList ?>
            </select>
        </li>
        <li>
            <label for="inputPreis" class="form-label">Preis: <sup>*</sup></label>
            <input id="inputPreis" type="number" name="preis" step="0.1" placeholder="in €" value="<?= $reise->getPreis()?>"/>
        </li>
        <li>
            <label for="inputBeginn" class="form-label">Beginn: <sup>*</sup></label>
            <input id="inputBeginn" type="date" name="beginn" value="<?= $reise->getBeginn()->format('Y-m-d')?>"/>
            <span class="form_hint">Pflichtfeld. Format: tt.mm.yyyy</span>
        </li>
        <li>
            <label for="inputEnde" class="form-label">Ende: <sup>*</sup></label>
            <input id="inputEnde" type="date" name="ende" value="<?= $reise->getEnde()->format('Y-m-d')?>"/>
            <span class="form_hint">Pflichtfeld. Format: tt.mm.yyyy</span>
        </li>

        <li>
            <label for="inputVorschaubild" class="form-label" class="form-label">Vorschaubild: <sup>*</sup></label>
            <input id="inputVorschaubild" type="file" name="vorschaubild"/>
        </li>

        <li>
            <label for="inputDetailbild" class="form-label">Detailbild: <sup>*</sup></label>
            <input id="inputDetailbild" type="file" name="detailbild" />
        </li>

        <li>
            <label for="kurzbeschreibung" class="form-label">Kurzbeschreibung:<sup>*</sup></label>
            <input id="kurzbeschreibung" type="text" name="kurzbeschreibung" max=255 placeholder="kurzbeschreibung" value="<?= $reise->getKurzbeschreibung()?>"/>
             <span class="form_hint">Pflichtfeld. Max. 255 Zeichen</span>
          
        </li>


        <li>

            <label for="beschreibung" class="form-label">Beschreibung:<sup>*</sup></label>
            <div id="beschreibung" style="height: 250px; background-color:white">
               <?= $reise->getBeschreibung()?>  
            </div>
            
            <input type="hidden" name="beschreibung">
        </li>
        
		
        
		<li>
		    <button class="submit" type="submit">Reise speichern</button>
		</li>
	</ul>
</form>

*/?>

<style>

/*
.contact_form li{
    padding:12px; 
    border-bottom:1px solid #eee;
    position:relative;
}


.contact_form h2 {
    margin:0;
    display: inline;
}
.required_notification {
    color:#d45252; 
    margin:5px 0 0 0; 
    display:inline;
    float:right;
}

.contact_form label {
    width:150px;
    margin-top: 3px;
    display:inline-block;
    float:left;
    padding:3px;
}
.contact_form input {
    height:20px; 
    width:25%; 
    padding:5px 8px;
}

.contact_form select {
	 width:26.5%; 
    padding:5px 8px;
}

*/

.contact_form button[type="submit"] {margin-left:156px;}



.contact_form input:focus + .form_hint {display: inline;}
.contact_form input:required:valid + .form_hint {background: #28921f;} /* change form hint color when valid */
.contact_form input:required:valid + .form_hint::before {color:#28921f;} /* change form hint arrow color when valid */

</style>