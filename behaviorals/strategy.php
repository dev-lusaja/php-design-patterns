<?php 


/**
* This pattern uses an interface to define how to create other classes
*/

interface HeroInterface
{
	public function Attack($target);
	public function Defense();
}

/**
* 
*/
class Hero
{
	private $hero;

	public function setHero(HeroInterface $heroInterface)
	{
		$this->hero = $heroInterface;
	}

	public function Attack($target)
	{
		return $this->hero->Attack($target);
	}

	public function Defense()
	{
		return $this->hero->Defense();
	}
}

/**
* 
*/
class Mage implements HeroInterface
{
	public $type;

	function __construct()
	{
		$this->type = 'Mage';
	}

	public function Attack($target)
	{
		return "The " . $this->type . " attack to: $target";
	}

	public function Defense()
	{
		return "The " . $this->type . " use defense";
	}
}

/**
* 
*/
class Warrior implements HeroInterface
{
	public $type;

	function __construct()
	{
		$this->type = 'Warrior';
	}

	public function Attack($target)
	{
		return "The " . $this->type . " attack to: $target";
	}

	public function Defense()
	{
		return "The " . $this->type . " use defense";
	}
}

$hero = new Hero();

$hero->setHero(new Warrior());
echo $hero->Attack('Mage') . PHP_EOL;
// The Warrior attack to: Mage
echo $hero->Defense() . PHP_EOL;
// The Warrior use defense

$hero->setHero(new Mage());
echo $hero->Attack('Warrior') . PHP_EOL;
// The Mage attack to: Warrior
echo $hero->Defense() . PHP_EOL;
// The Mage use defense
?>