<section>
<div id="tabpanel">
  <ul role="tablist" id="tablist">
    <li id="linkReiseInfos" class="tab <?php if(empty($errorArray)) echo 'disabled' ?>" role="tab" aria-controls="content-reiseInfos" aria-selected="<?php if(empty($errorArray)) echo 'true'; else echo 'false';?>" >1 - Informationen zur Reise</li>
    
    <li id="linkPersoenlicheDaten"  class="tab <?php if(empty($errorArray)) echo 'disabled' ?>" role="tab" aria-controls="content-persoenlicheDaten" aria-selected="<?php if(empty($errorArray))echo 'false'; else echo 'true'; ?>">2 - Ihre Persönliche Daten</li>
  </ul>

  <form id="buchung" action="<?= $currentUrl ?>" method="post" >
      <div id="tabcontent">

        <div id="content-reiseInfos" role="tabpanel" class="tab-content" aria-labelledby="linkReiseInfos" aria-hidden="<?php if(empty($errorArray)) echo 'false'; else echo 'true'; ?>">
          <h3><?= $reise->getTitel()?></h3>
          
            <p>
              vielen Dank für das Interesse an unserer Reise.
            </p>

            <p>
              Die Reise findet statt vom <b><?= $reise->getBeginn()->format('d.m.Y') ?></b> bis  zum <b> <?= $reise->getEnde()->format('d.m.Y') ?></b>.
            </p>

            <p>
              Die Kosten belaufen sich auf <b><span id="kosten"> <?= $reise->getPreis() ?></span> Euro </b> pro Person. <br>
              Die Gesamtkosten unter Beachtung der gennanten Personenzahl listen wir Ihnen im letztem Schritt dieses Buchungsprozesses auf.
            </p>

            <p>
              <fieldset>

                <div id="errorRequiredCheckboxes" class="flashMessage error hidden">
                  Zum Fortfahren müssen Sie die Datenschutzerklärung und die Reisebedingungen akzeptieren.
                </div>
                <input class="required" type="checkbox" id="datenschutz" <?php if(!empty($errorArray)) echo 'checked' ?> >
                <label for="datenschutz">Die <a href="#">Datenschutzerklärung</a> habe ich gelesen und stimme dieser zu.</label>
                <br><br>
                <input class="required" type="checkbox" id="reisebedingungen" <?php if(!empty($errorArray)) echo 'checked' ?>>
                <label for="reisebedingungen">Die <a href="#">Reisebedingungen</a> habe ich gelesen und stimme diesen zu.</label>
              </fieldset>
            </p>
      
        
        <p class="clearfix">
          <button class="tab-next <?php if(empty($errorArray)) echo 'disabled' ?>" data-next="linkPersoenlicheDaten" type="button">Weiter</button>
        </p>
        </div>
        <div id="content-persoenlicheDaten" role="tabpanel" class="tab-content" aria-labelledby="linkPersoenlicheDaten" aria-hidden="<?php if(empty($errorArray)) echo 'true'; else echo 'false'; ?>">
            

          <fieldset>
            <legend><?= $reise->getTitel()?></legend>
            <label for="personenanzahl">Für wieviele Personen möchten Sie die Reise buchen?</label><br>
            <input type="number" id="personenanzahl" min=1 name="personenanzahl" placeholder="Anzahl"><br>

          </fieldset>

          <fieldset>
            <legend>Informationen zu Ihrer Person</legend>
            
            <label for="vorname" class="person">Anrede</label>
            <select name="anredeID" class=person>
              <?= $anredeOptionList ?>
            </select>

            <label for="titel" class="person">Titel</label>
            <input type="text" id="titel" name="titel" class="person" placeholder="Titel" value=<?= $person->getTitel()?>>

            <label for="vorname" class="person">Vorname</label>
            <input type="text" id="vorname" name="vorname" class="person" placeholder="Ihr Vorname" value=<?= $person->getVorname()?>>
            
            <label for="nachname" class="person">Nachname</label>
            <input type="text" id="nachname" name="nachname" class="person" placeholder="Ihr Nachname" value="<?= $person->getNachname()?>">
            
            <label for="geburtsdatum" class="person">Geburtsdatum</label>
            <input type="date" id="geburtsdatum" name="geburtsdatum" class="person" value="<?= $person->getGeburtsdatum()->format('Y-m-d')?>">

            <label for="strasse" class="person">Straße</label>
            <input type="text" id="strasse" name="strasse" class="person" placeholder="Ihre Straße" value="<?= $person->getStrasse()?>">

            <label for="hausnummer" class="person">Hausnummer</label>
            <input type="text" id="hausnummer" name="hausnummer" class="person" maxlength=5 placeholder="Hausnummer" value="<?= $person->getHausnummer()?>">

            <label for="plz" class="person">Postleitzahl</label>
            <input type="text" id="plz" name="plz" class="person" maxlength=5 placeholder="Postleitzahl" value="<?= $person->getPlz()?>">

            <label for="ort" class="person">Ort</label>
            <input type="text" id="ort" name="ort" class="person" placeholder="Wohnort" value="<?= $person->getOrt()?>">

          </fieldset>

          <fieldset>
            <legend>Weitere Kontaktmöglichkeiten</legend>
            <label for="email" class="person">E-Mail</label>
            <input type="text" id="email" name="email" class="person" placeholder="bsp. name@domain.de" value="<?= $person->getEmail()?>">
            <label for="telefonnummer" class="person">Telefon</label>
            <input type="tel" id="telefonnummer" name="telefonnummer" class="person" placeholder="0615112589564" value="<?= $person->getTelefonnummer()?>">
          </fieldset>

          <p>Sie haben im nächstem Schritt nochmal die Möglichkeit, die Daten zu überprüfen </p>

          <input type="submit" value="Weiter">
          
        </div>
        
      </div>
  </form>
</div>  
</section>

<style>
	p {
		font-size: large;

	}

	fieldset {
		margin: 1rem 0 1rem 0;
	}

	.tab-next {
		float: right;
	}
</style>
