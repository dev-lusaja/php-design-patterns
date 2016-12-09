<?php 

/**
* Separate the construction of a complex object from its representation so that
* The same construction process can create different representations
*/

class BoardBuilder
{
	private $board;

	public function __construct($width, $height)
	{
		$this->board = new Board();
		$this->board->width = $width;
		$this->board->height = $height;
		$this->board->tiles = array();
		$this->board->monsters = array();
	}

	public function add_tiles($cant)
	{
		for ($i=0; $i < $cant; $i++) { 
			array_push($this->board->tiles, new Tile());
		}
	}

	public function add_monsters($cant)
	{
		for ($i=0; $i < $cant; $i++) { 
			array_push($this->board->monsters, new Monster());
		}
	}

	public function Board()
	{
		return $this->board;
	}
}

/**
* 
*/
class Board
{
	public $width;
	public $height;
	public $tiles;
	public $monsters;
}

class Tile{}

class Monster{}

$builder = new BoardBuilder(2, 3);
var_dump($builder);
// object(BoardBuilder)

$board = $builder->board();
var_dump($board->width);
// int(2)

$builder->add_tiles(3);
$builder->add_monsters(2);

var_dump(count($board->tiles));
// int(3)
var_dump(count($board->monsters));
// int(2)
?>