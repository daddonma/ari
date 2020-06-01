<section>
<div id="tabpanel">
  <ul role="tablist" id="tablist">
    <li id="linkReiseInfos" class="tab" role="tab" aria-controls="content-reiseInfos" aria-selected="<?php if(empty($errorArray)) echo 'true'; else echo 'false';?>" >1 - Informationen zur Reise</li>
    <li id="linkPersoenlicheDaten"  class="tab" role="tab" aria-controls="content-persoenlicheDaten" aria-selected="<?php if(empty($errorArray))echo 'false'; else echo 'true'; ?>">2 - Ihre Persönliche Daten</li>
    <li id="linkBuchungAbschliessen"  class="tab" role="tab" aria-controls="content-buchungAbschliessen" aria-selected="false">3 - Buchung abschließen</li>
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
                <input type="checkbox" id="datenschutz">
              <label for="datenschutz">Die <a href="#">Datenschutzerklärung</a> habe ich gelesen und stimme dieser zu.</label>
              <br><br>
              <input type="checkbox" id="reisebedingungen">
              <label for="reisebedingungen">Die <a href="#">Reisebedingungen</a> habe ich gelesen und stimme diesen zu.</label>
              </fieldset>
            </p>
      
        
        <p class="clearfix">
          <button class="tab-next" data-next="linkPersoenlicheDaten" type="button">Weiter</button>
        </p>
        </div>
        <div id="content-persoenlicheDaten" role="tabpanel" class="tab-content" aria-labelledby="linkPersoenlicheDaten" aria-hidden="<?php if(empty($errorArray)) echo 'true'; else echo 'false'; ?>">
            

          <fieldset>
            <legend><?= $reise->getTitel()?></legend>
            <label for="personenanzahl">Für wieviele Personen möchten Sie die Reise buchen?</label><br>
            <input type="number" id="personenanzahl" min=1 name="personenanzahl" data-output-target="abschlussPersonenanzahl"><br>

          </fieldset>

          <fieldset>
            <legend>Informationen zu Ihrer Person</legend>
            
            <label for="vorname" class="person">Anrede</label>
            <select name="anredeID" class=person>
              <?= $anredeOptionList ?>
            </select>

            <label for="titel" class="person">Titel</label>
            <input type="text" id="titel" name="titel" class="person" placeholder="Titel" data-output-target="abschlussTitel" value=<?= $person->getTitel()?>>

            <label for="vorname" class="person">Vorname</label>
            <input type="text" id="vorname" name="vorname" class="person" placeholder="Ihr Vorname" data-output-target="abschlussVorname" value=<?= $person->getVorname()?>>
            
            <label for="nachname" class="person">Nachname</label>
            <input type="text" id="nachname" name="nachname" class="person" placeholder="Ihr Nachname" data-output-target="abschlussNachname" value="<?= $person->getNachname()?>">
            
            <label for="geburtsdatum" class="person">Geburtsdatum</label>
            <input type="date" id="geburtsdatum" name="geburtsdatum" class="person" data-output-target="abschlussGeburtsdatum" value="<?= $person->getGeburtsdatum()->format('Y-m-d')?>">

            <label for="strasse" class="person">Straße</label>
            <input type="text" id="strasse" name="strasse" class="person" placeholder="Ihre Straße" data-output-target="abschlussStrasse" value="<?= $person->getStrasse()?>">

            <label for="hausnummer" class="person">Hausnummer</label>
            <input type="text" id="hausnummer" name="hausnummer" class="person" maxlength=5 placeholder="Hausnummer" data-output-target="abschlussHausnummer" value="<?= $person->getHausnummer()?>">

            <label for="plz" class="person">Postleitzahl</label>
            <input type="text" id="plz" name="plz" class="person" maxlength=5 placeholder="Postleitzahl" data-output-target="abschlussPlz" value="<?= $person->getPlz()?>">

            <label for="ort" class="person">Ort</label>
            <input type="text" id="ort" name="ort" class="person" placeholder="Wohnort" data-output-target="abschlussOrt" value="<?= $person->getOrt()?>">

          </fieldset>

          <fieldset>
            <legend>Weitere Kontaktmöglichkeiten</legend>
            <label for="email" class="person">E-Mail</label>
            <input type="text" id="email" name="email" class="person" placeholder="bsp. name@domain.de" data-output-target="abschlussEmail" value="<?= $person->getEmail()?>">
            <label for="telefonnummer" class="person">Telefon</label>
            <input type="tel" id="telefonnummer" name="telefonnummer" class="person" placeholder="0615112589564" data-output-target="abschlussTelefonnummer" value="<?= $person->getTelefonnummer()?>">
          </fieldset>

          <p class="clearfix">
            <button class="tab-next" data-next="linkBuchungAbschliessen" type="button">Weiter</button>
          </p>

        </div>
        <div id="content-buchungAbschliessen" role="tabpanel" class="tab-content" aria-labelledby="linkBuchungAbschliessen" aria-hidden="true">
            <p>
              Wir haben folgende Daten von Ihnen aufgenommen. Bitte überprüfen Sie diese und nehmen eventuelle Änderungen vor:
            </p>

            <div id="überprüfung">
              <p>
                <h3>Ihre Reise</h5>
                <span id="abschlussTitel">
                    <?= $reise->getTitel()?>
                </span>
              </p>
              <p>
                <h3>Reisezeitraum</h5>
                <span id="abschlussZeitraum">
                  <?= $reise->getBeginn()->format('d.m.Y') ?> - <?= $reise->getEnde()->format('d.m.Y') ?>
                </span>
                
              </p>
              <p>
                <h3>Kostenaufstellung </h5>
                Kosten / Person: <span id="abschlussPreis"><?= $reise->getPreis()?></span><br>
                x  <span id="abschlussPersonenanzahl"> <?= $buchung->getPersonenanzahl(); ?> </span> Person(en)<br>
                incl. gesetzlicher Mwst.<br>
                <b>= <span id="abschlussGesamtkosten"></span> EUR.</b>
              
              </p>
               <p>
                <h3>Ihre Angaben</h5>
                <span id="abschlussTitel"><?= $person->getTitel(); ?></span>
                <span id="abschlussVorname"><?= $person->getVorname(); ?></span>  <span id="abschlussNachname"><?= $person->getNachname(); ?></span> 
                <br>
                <span id="abschlussStrasse"><?= $person->getStrasse() ?></span> <span id="abschlussHausnummer"><?= $person->getHausnummer() ?></span>
                <br>
                <span id="abschlussPlz"><?=  $person->getPlz() ?></span> <span id="abschlussOrt"><?= $person->getOrt() ?></span>
              </p>
              <p>
                  <h3>Geboren am</h5>
                  <span id="abschlussGeburtsdatum"><?= $person->getGeburtsdatum()->format('d.m.Y') ?></span>
              </p>

              <p>
                  <h3>E-Mail Adresse:</h5>
                  <span id="abschlussEmail"><?= $person->getEmail() ?></span>
                   <h3>Telefon:</h5>
                  <span id="abschlussTelefonnummer"><?= $person->getTelefonnummer() ?></span>
              </p>

            
            </div>
           
           <input type="submit" value="Buchung abschliessen">
        </div>
      </div>
  </form>
</div>  
</section>

<style>
	p {
		font-size: large;
		margin-bottom: .5rem;
	}

	fieldset {
		margin: 1rem 0 1rem 0;
	}

	.tab-next {
		float: right;
	}
</style>
