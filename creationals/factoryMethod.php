<?php 

/*
It provides a way to delegate the instantiation logic to child classes. For each hero we need a HeroManager.
*/

interface HeroInterface
{
	public function getType(): string;
	public function getSkills(): array;
}


class Human implements HeroInterface
{
	
	protected $type;
	protected $skills;


	/**
	 * @param string $type
	 * @param array $skills
	 */
	public function __construct($type, $skills)
	{
		$this->type = $type;
		$this->skills = $skills;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return array
	 */
	public function getSkills(): array

	{
		return $this->skills;
	}
}


class Elf implements HeroInterface
{
	
	protected $type;
	protected $skills;


	/**
	 * @param string $type
	 * @param array $skills
	 */
	public function __construct($type, $skills)
	{
		$this->type = $type;
		$this->skills = $skills;
	}

	/**
	 * @return string
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return array
	 */
	public function getSkills(): array

	{
		return $this->skills;
	}
}


abstract class HeroManager
{
	
	abstract public function makeHero($type, $skills): HeroInterface;
}


class HumanManager extends HeroManager
{
	
	public function makeHero($type, $skills): HeroInterface
	{
		return new Human($type, $skills);
	}
}

class ElfManager extends HeroManager
{
	
	public function makeHero($type, $skills): HeroInterface
	{
		return new Elf($type, $skills);
	}
}


$human = new HumanManager();
$humanHero = $human->makeHero('warrior', ['slash', 'berseker']);
var_dump($humanHero);
/* 
object(Human)#2 (2) {
  ["type":protected]=>
  string(7) "warrior"
  ["skills":protected]=>
  array(2) {
    [0]=>
    string(5) "slash"
    [1]=>
    string(8) "berseker"
  }
}
*/

$elf = new ElfManager();
$elfHero = $elf->makeHero('mage', ['solarBean', 'shadows']);
var_dump($elfHero);
/*
object(Elf)#4 (2) {
  ["type":protected]=>
  string(4) "mage"
  ["skills":protected]=>
  array(2) {
    [0]=>
    string(9) "solarBean"
    [1]=>
    string(7) "shadows"
  }
}

*/
?>