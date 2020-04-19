<?php

require_once 'inc/bootstrap.inc.php';

use Entities\Region;
use Entities\Kategorie;

$schemaTool = new \Doctrine\ORM\Tools\SchemaTool($em);

$factory = $em->getMetadataFactory();
$metadata = $factory->getAllMetadata();

try {

    $schemaTool->updateSchema($metadata);

    //Beispiel Regionen anlegen
    $regionenList = array(  ['name' => 'müll'],
                        ['name' => 'Südhessen'],
                     ['name' => 'test']);

    foreach($regionenList AS $key => $regionData) {
        $regionObj = new Region($regionData);

        $exists = !empty($em->getRepository('Entities\Region')->findByName($regionObj->getName()));
        
        if(!$exists) $em->persist($regionObj);
    }

     //Beispiel Kategorien anlegen
    $kategorienList = array(  ['name' => 'Wanderurlaub'],
                        ['name' => 'Zelten'],
                     ['name' => 'Action']);

     foreach($kategorienList AS $key => $kategorieData) {
        $kategorieObj = new Kategorie($kategorieData);

        $exists = !empty($em->getRepository('Entities\Kategorie')->findByName($kategorieObj->getName()));
        
        if(!$exists) $em->persist($kategorieObj);
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
