<?php 

/* Simple factory simply generates an instance for client without exposing any instantiation logic to the client */

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
	 * @params array $skills
	 */
	public function __construct($type, $skills)
	{
		$this->type = $type;
		$this->skills = $skills;
	}

	/**
	 * @return string $this->type
	 */
	public function getType(): string
	{
		return $this->type;
	}

	/**
	 * @return array $this->skills
	 */
	public function getSkills(): array
	{
		
		return $this->skills;
	}

}


class HeroFactory
{
	
	/**
	 * @param string $type
	 * @param array $skills
	 */
	public static function makeHuman($type, $skills): HeroInterface
	{
		return new Human($type, $skills);
	}
}

$humanHero = HeroFactory::makeHuman('warrior', ['slash', 'berseker']);
var_dump($humanHero->getType());
/* string(7) "warrior" */

var_dump($humanHero->getSkills())
/*array(2) {
  [0]=>
  string(5) "slash"
  [1]=>
  string(8) "berseker"
}
*/

?>