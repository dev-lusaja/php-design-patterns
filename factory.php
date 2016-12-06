<?php 

/**
* This pattern uses a class to create new objects
*/

class Party
{
	private $factory;
	public $members;
	
	function __construct($factory)
	{
		$this->factory = $factory;
		$this->members = array();
	}

	public function add_warriors($cant)
	{
		for ($i=0; $i < $cant; $i++) { 
			array_push($this->members, $this->factory->create_warrior());
		}
	}


	public function add_mages($cant)
	{
		for ($i=0; $i < $cant; $i++) { 
			array_push($this->members, $this->factory->create_mage());
		}
	}
}

/**
* 
*/
class HeroFactory
{
	
	public function create_warrior()
	{
		return new Warrior();
	}


	public function create_mage()
	{
		return new Mage();
	}
}


/**
* 
*/
class Warrior
{
	
	public $type;
	function __construct()
	{
		$this->type = 'Warrior';
	}
}

/**
* 
*/
class Mage
{
	
	public $type;
	function __construct()
	{
		$this->type = 'Mage';
	}
}

$party = new Party(new HeroFactory());
$party->add_warriors(2);
$party->add_mages(2);

echo "Members: " . count($party->members) . PHP_EOL;
var_dump($party);

?>