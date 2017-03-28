<?php 

/**
 * A factory of factories; a factory that groups the individual but related/dependent factories together without specifying their concrete classes.
 */

interface HeroRaceInterface
{
	public function getRace(): string;
}


class HumanRace implements HeroRaceInterface
{
	
	protected $race = 'Human';
	public $class;	


	/**
	 * @param string $class
	 * @param array $skills
	 */
	public function __construct($class)
	{
		$this->class = $class;
	}


	/**
	 * @return string
	 */
	public function getRace(): string
	{
		return $this->race;
	}

}

interface HeroClassInterface
{
	public function getClass(): string;
	public function getSkills(): array;
}


class WarriorClass implements HeroClassInterface
{
	protected $class = 'Warrior';
	protected $skills = ['Berseker', 'Slash'];


	/**
	 * @return array
	 */
	public function getSkills(): array
	{
		return $this->skills;	
	}

	/**
	 * @return string
	 */
	public function getClass(): string
	{
		return $this->class;
	}
}


/**
 * ABSTRACT FACTORY
 */

interface HeroFactory
{
	public function create(): HeroRaceInterface;
}


class HumanWarrior implements HeroFactory
{
	
	/**
	 * @return HeroRaceInterface
	 */
	public function create(): HeroRaceInterface
	{
		$class = new WarriorClass();
		return new HumanRace($class);
	}
}

$humanWarrior = new HumanWarrior();
var_dump($humanWarrior->create());

/*
object(HumanRace)#3 (2) {
  ["race":protected]=>
  string(5) "Human"
  ["class"]=>
  object(WarriorClass)#2 (2) {
    ["class":protected]=>
    string(7) "Warrior"
    ["skills":protected]=>
    array(2) {
      [0]=>
      string(8) "Berseker"
      [1]=>
      string(5) "Slash"
    }
  }
}
*/


?>