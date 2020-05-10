
<form class="contact_form" action="<?= $currentUrl ?>" method="post" name="contact_form" enctype="multipart/form-data">
	<ul>
	    <li>
	        <label for="inputName">Titel:</label>
	        <input id="inputName" type="text" name="titel" placeholder="Titel" value="<?= $reise->getTitel()?>"/>
            <span class="form_hint">Pflichtfeld. Max. 100 Zeichen</span>
	    </li>
	    <li>
		    <label for="selectRegion">Region: <sup>*</sup></label>
		    <select id="selectRegion" name="regionID">
		    	<?= $regionenOptionList ?>
		    </select>
		</li>
        <li>
            <label for="selectKategorie">Kategorie: <sup>*</sup></label>
            <select id="selectKategorie" name="kategorieID">
                <?= $kategorienOptionList ?>
            </select>
        </li>
        <li>
            <label for="inputPreis">Preis: <sup>*</sup></label>
            <input id="inputPreis" type="number" name="preis" step="0.1" placeholder="in €" value="<?= $reise->getPreis()?>"/>
        </li>
        <li>
            <label for="inputBeginn">Beginn: <sup>*</sup></label>
            <input id="inputBeginn" type="date" name="beginn" value="<?= $reise->getBeginn()->format('Y-m-d')?>"/>
            <span class="form_hint">Pflichtfeld. Format: tt.mm.yyyy</span>
        </li>
        <li>
            <label for="inputEnde">Ende: <sup>*</sup></label>
            <input id="inputEnde" type="date" name="ende" value="<?= $reise->getEnde()->format('Y-m-d')?>"/>
            <span class="form_hint">Pflichtfeld. Format: tt.mm.yyyy</span>
        </li>

        <li>
            <label for="inputVorschaubild">Vorschaubild: <sup>*</sup></label>
            <input id="inputVorschaubild" type="file" name="vorschaubild"/>
        </li>

        <li>
            <label for="inputDetailbild">Detailbild: <sup>*</sup></label>
            <input id="inputDetailbild" type="file" name="detailbild" />
        </li>

		<li>
		    <label for="message">Kurzbeschreibung:<sup>*</sup></label>
		    <textarea name="kurzbeschreibung" cols="100" rows="6" placeholder="Kurzbeschreibung" max=255><?= $reise->getKurzbeschreibung()?></textarea>
		</li>
        
		<li>
		    <button class="submit" type="submit">Reise speichern</button>
		</li>
	</ul>
</form>

<style>
.contact_form ul {
    width:70%;
    list-style-type:none;
    list-style-position:outside;
    margin:0px;
    padding:0px;
}
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

.contact_form textarea {padding:8px; width:300px;}
.contact_form button {margin-left:156px;}

.form_hint {
    background: #d45252;
    border-radius: 3px 3px 3px 3px;
    color: white;
    margin-left:8px;
    padding: 1px 6px;
    z-index: 999; /* hints stay above all other elements */
    position: absolute; /* allows proper formatting if hint is two lines */
    display: none;
}

.form_hint::before {
    content: "\25C0"; /* left point triangle in escaped unicode */
    color:#d45252;
    position: absolute;
    top:1px;
    left:-6px;
}

.contact_form input:focus + .form_hint {display: inline;}
.contact_form input:required:valid + .form_hint {background: #28921f;} /* change form hint color when valid */
.contact_form input:required:valid + .form_hint::before {color:#28921f;} /* change form hint arrow color when valid */

</style>