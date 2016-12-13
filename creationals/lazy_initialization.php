<?php 

/**
* Tactic of delaying the creation of an object, the calculation of a value, or some other expensive process until * the first time it is needed.
*/

class NoPlayerCharacter
{
	private $type;
	private static $types;

	private function __construct($type)
	{
		$this->type = $type;
	}

	public static function getNPC($type)
	{
		if (!self::$types[$type]) {
			self::$types[$type] = new NoPlayerCharacter($type);
		}
		return self::$types[$type];
	}

	public static function currentNPCTypes()
	{
		return self::$types;
	}
}

NoPlayerCharacter::getNPC('Merchant');

NoPlayerCharacter::getNPC('Personal Assistant');

NoPlayerCharacter::getNPC('Guard');

var_dump(NoPlayerCharacter::currentNPCTypes());

?>