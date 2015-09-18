<?php

ini_set('precision', 33);

include_once 'Classloader.php';

$loader = new Classloader(dirname(__FILE__)."/src/");
$loader->register();

use Communiverse\Genesis\Atoms\Particles\Electron;
use Communiverse\Genesis\Atoms\Particles\Neutron;
use Communiverse\Genesis\Atoms\Particles\Proton;
use Communiverse\Genesis\Atoms\Series\SeriesCollection;
use Communiverse\Genesis\Atoms\AtomCollection;
use Communiverse\Genesis\Physics\Units\SI\SIUnitCollection;
use Communiverse\Genesis\Physics\Units\UnitCollection;
use Communiverse\Tools\Stopwatch;
use Communiverse\Environment\Simpliverse;
use Communiverse\Environment\Influence\InputManager;
use Communiverse\Environment\Influence\InputEventListener;
use Communiverse\Environment\Influence\StdInKeys;

$sw = new Stopwatch();
$sw->start();

$ac = new AtomCollection(
	new Proton(), 
	new Electron(), 
	new Neutron(), 
	new SeriesCollection()
);

$uc = new UnitCollection(
	new SIUnitCollection()
);

// $element = $ac->get(AtomCollection::MOLYBDENUM);
// echo "weight of ".$element->getName()." (".$element->getSymbol()."): " . $element->getUnitWeight() . PHP_EOL;

// $unit = $uc->get(UnitCollection::JOULE);
// echo "unit of " . $unit->getName() . " (".$unit->getUnit()."): " . (method_exists($unit, "buildUnit") ? $unit->buildUnit() : "") . PHP_EOL;

// $sw->end();
// echo "time elapsed: " . $sw->getTimeElapsed() . "ms" . PHP_EOL;

$creator = new Simpliverse(
	new InputManager(new InputEventListener(new StdInKeys()))
);
$creator->run();

?>