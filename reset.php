<?php

require_once 'inc/bootstrap.inc.php';

use Entities\Region;
use Entities\Kategorie;
use Entities\Benutzer;
use Entities\Anrede;

$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);

$factory = $em->getMetadataFactory();
$metadata = $factory->getAllMetadata();

try {

    $schemaTool->updateSchema($metadata);

    //Beispiel Regionen anlegen
    $regionenList = array(  
                            ['name' => 'Südtirol'],
                            ['name' => 'Kapverden'],
                            ['name' => 'Mongolei']
                        );

    foreach($regionenList AS $key => $regionData) {
        $regionObj = new Region($regionData);

        $exists = !empty($em->getRepository('Entities\Region')->findByName($regionObj->getName()));
        
        if(!$exists) $em->persist($regionObj);
    }

     //Beispiel Kategorien anlegen
    $kategorienList = array(  
                            ['name' => 'Wanderurlaub'],
                            ['name' => 'Zelten'],
                            ['name' => 'Action'],
                            ['name' => 'Paragliding'],
                            ['name' => 'Seeschifffahrt']
                        );

     foreach($kategorienList AS $key => $kategorieData) {
        $kategorieObj = new Kategorie($kategorieData);

        $exists = !empty($em->getRepository('Entities\Kategorie')->findByName($kategorieObj->getName()));
        
        if(!$exists) $em->persist($kategorieObj);
    }

    //Beispiel Benutzer anlegen
    $benutzerList = array(
                            ['benutzername' => 'testUser', 'passwortHash' => sha1("test")],
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
    echo 'ACHTUNG: Bei der Aktualisierung des Schemas gab es ein Problem: ';
    echo $e->getMessage() . "<br />";
    if (preg_match("/Unknown database '(.*)'/", $e->getMessage(), $matches)) {
        die(
            sprintf(
                'Erstellen Sie die Datenbank %s mit der Kollation utf8_general_ci!',
                $matches[1]
            )
        );
    }
}

?>
Das Schema-Tool wurde durchlaufen.
