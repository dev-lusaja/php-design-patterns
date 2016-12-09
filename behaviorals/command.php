<?php 
/**
* Encapsulate a request as an object, thereby letting you parameterize clients
* with different requests, queue or log requests, and support undoable operations
*/

class Turn
{
	private $commands;

	public function __construct()
	{
		$this->commands = array();
	}

	public function run_command($command)
	{
		$command->execute();
		array_push($this->commands, $command);
	}

	public function undo_command()
	{
		// Is a ctrl + z command xD
		$cmd = array_pop($this->commands);
		$cmd->unexecute();
	}
}

class Hero
{
	public $money;	
	public $health;	

	function __construct()
	{
		$this->money = 0;
		$this->health = 100;
	}
}

class GetMoneyCommand
{
	private $hero;

	public function __construct($hero)
	{
		$this->hero = $hero;
	}

	public function execute()
	{
		$this->hero->money += 10;
	}

	public function unexecute()
	{
		$this->hero->money -= 10;
	}
}

class HealCommand
{
	private $hero;

	public function __construct($hero)
	{
		$this->hero = $hero;
	}

	public function execute()
	{
		$this->hero->health += 10;
	}

	public function unexecute()
	{
		$this->hero->health -= 10;
	}
}

$hero = new Hero();
$get_money = new GetMoneyCommand($hero);
$heal = new HealCommand($hero);
$turn = new Turn();

$turn->run_command($heal);
echo "Hero add health" . PHP_EOL;
var_dump($hero->health);
// int(110)

$turn->run_command($get_money);
echo "Hero add money" . PHP_EOL;
var_dump($hero->money);
// int(10)

$turn->undo_command();
echo "Hero undo money" . PHP_EOL;
var_dump($hero->money);
// int(0)

$turn->undo_command();
echo "Hero undo health" . PHP_EOL;
var_dump($hero->health);
// int(100)

?>