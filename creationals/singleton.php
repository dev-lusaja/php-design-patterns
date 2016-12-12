<?php 

/**
* his pattern is used when you only need to create a single instance
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
// Im a Singleton
// object(Warrior)#2 (1) {
//   ["type"]=>
//   string(7) "Warrior"
// }

var_dump($mage);
// object(Mage)#3 (1) {
//   ["type"]=>
//   string(4) "Mage"
// }

?>