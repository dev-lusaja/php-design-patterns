<?php 

interface QuestInterface
{
	function finish();
}


/**
* 
*/
class Quest implements QuestInterface
{
	
	public $dificulty;
	public $hero;

	public function __construct($dificulty)
	{
		$this->dificulty = $dificulty;
		$this->hero = null;
	}

	public function finish()
	{
		$this->hero->exp += $this->calculate_experience();
	}

	private function calculate_experience(){
		return $this->dificulty * 50 / $this->hero->level;
	}
}

/**
* 
*/
class Hero
{
	public $level;
	public $exp;
	public $quests;

	public function __construct()
	{
		$this->level = 1;
		$this->exp = 0;
		$this->quests = array();
	}

	public function take_quest($quest)
	{
		$quest->hero = $this;
		array_push($this->quests, $quest->hero);
	}

	public function finish_quest($quest)
	{
		$quest->finish();
		$key = array_search($quest, $this->quests);
		unset($this->quests[$key]);
	}

}


/**
* 
*/
class OldQuest
{
	
	public $dificulty;
	public $experience;

	function __construct($dificulty = 3, $experience = 10)
	{
		$this->dificulty = $dificulty;
		$this->experience = $experience;
	}

	public function done()
	{
		return $this->dificulty *  $this->experience;
	}
}


/**
* 
*/
class QuestAdapter implements QuestInterface
{
	
	public $hero;
	private $old_quest;

	function __construct($old_quest, $dificulty)
	{
		$this->old_quest = $old_quest;
		$this->old_quest->dificulty = $dificulty;
		$this->hero = null;
	}

	public function finish()
	{
		$this->hero->exp += $this->old_quest->done();
	}
}


$hero = new Hero();
$quest = new Quest(5);
$hero->take_quest($quest);
$hero->finish_quest($quest);
echo $hero->exp . PHP_EOL;

$old_quest = new OldQuest(5);
$quest_adapter = new QuestAdapter($old_quest, 5	);
$hero->take_quest($quest_adapter);
$hero->finish_quest($quest_adapter);
echo $hero->exp . PHP_EOL;
?>