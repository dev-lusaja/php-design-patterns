<?php 

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

	public function __construct(HeroInterface $heroInterface)
	{
		$this->hero = $heroInterface;
	}

	public function setAttack($target)
	{
		return $this->hero->Attack($target);
	}

	public function setDefense()
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
		return "The hero attack to: $target";
	}

	public function Defense()
	{
		return "The hero use defense";
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
		return "The hero attack to: $target";
	}

	public function Defense()
	{
		return "The hero use defense";
	}
}

$warrior = new Hero(new Warrior());
echo $warrior->setAttack('Orc') . PHP_EOL;

$mage = new Hero(new Mage('Troll'));
echo $mage->setDefense() . PHP_EOL;

?>