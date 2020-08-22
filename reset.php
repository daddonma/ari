<?php

require_once 'inc/bootstrap.inc.php';

use Entities\Region;
use Entities\Kategorie;
use Entities\Benutzer;
use Entities\Anrede;

try {

    //Beispiel Regionen anlegen
    $regionenList = array(  
                            ['name' => 'Europa'],
                            ['name' => 'Amerika'],
                            ['name' => 'Asien'],
                            ['name' => 'Afrika'],
                            ['name' => 'Südamerika'],
                            ['name' => 'Mongolei'],
                            ['name' => 'Allgäu'],
                            ['name' => 'Baltikum'],
                            ['name' => 'Iberische Halbinseln'],
                            ['name' => 'Pyrenäen'],
                            ['name' => 'Sizillien'],
                        );

    foreach($regionenList AS $key => $regionData) {
        $regionObj = new Region($regionData);

        $exists = !empty($em->getRepository('Entities\Region')->findByName($regionObj->getName()));
       
        if(!$exists) $em->persist($regionObj);
    }

     //Beispiel Kategorien anlegen
    $kategorienList = array(  
                            ['name' => 'Aktivurlaub'],
                            ['name' => 'Erkundungen'],
                            ['name' => 'Familienspass'],
                            ['name' => 'Wandern']
                        );

     foreach($kategorienList AS $key => $kategorieData) {
        $kategorieObj = new Kategorie($kategorieData);

        $exists = !empty($em->getRepository('Entities\Kategorie')->findByName($kategorieObj->getName()));
        
        if(!$exists) $em->persist($kategorieObj);
    }

    //Beispiel Benutzer anlegen
    $benutzerList = array(
                            ['benutzername' => 'gastUser', 'passwortHash' => sha1("gast")],
                            ['benutzername' => 'admin', 'passwortHash' => sha1("admin123")]
                        );

    foreach($benutzerList AS $key => $benutzerData) {
        $benutzerObj = new Benutzer($benutzerData);

        $exists = !empty($em->getRepository('Entities\Benutzer')->findByBenutzername($benutzerObj->getBenutzername()));

        if(!$exists) $em->persist($benutzerObj);
    }

    //Anredenanlegen
    $anredenList = array(
                            ['bezeichnung' => 'Herr'],
                            ['bezeichnung' => 'Frau'],
                            ['bezeichnung' => 'Firma'],
                            ['bezeichnung' => 'Sonstiges / Divers']
                        );

    foreach($anredenList AS $key => $anredeData) {
        $anredeObj = new Anrede($anredeData);

        $exists = !empty($em->getRepository('Entities\Anrede')->findByBezeichnung($anredeObj->getBezeichnung()));

        if(!$exists) $em->persist($anredeObj);
    }

    $em->flush();

} catch (PDOException $e) {
    echo 'ACHTUNG: Bei der Aktualisierung des Schemas gab es ein Problem: ' . $e->getMessag();

}

echo "Die Einträge wurden erfolgreich angelegt.";

?>
