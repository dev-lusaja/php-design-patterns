<?php 


/**
* 
*/
class HeroFactory
{
	public static $instance;

	public static function instance()
	{
		self::$instance = self::$instance == null ? new self():self::$instance;
		return self::$instance;
	}


	public function create_warrior()
	{
		return new Warrior();
	}


	public function create_mage()
	{
		return new Mage();
	}

	/*
	* Protected methods
	*/

	private function __construct()
	{
		// Print once
		echo "Im a Singleton" . PHP_EOL;
	}

	private function __clone()
	{
		# code...
	}

	private function __wakeup()
	{
		# code...
	}

}


class Warrior
{
	
	public $type;
	function __construct()
	{
		$this->type = 'Warrior';
	}
}


class Mage
{
	
	public $type;
	function __construct()
	{
		$this->type = 'Mage';
	}
}

$factory = HeroFactory::instance();
$warrior = $factory->create_warrior();

$factory2 = HeroFactory::instance();
$mage = $factory2->create_mage();

var_dump($warrior);
var_dump($mage);

?>