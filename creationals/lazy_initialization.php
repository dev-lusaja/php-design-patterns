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
// array(3) {
//   ["Merchant"]=>
//   object(NoPlayerCharacter)#1 (1) {
//     ["type":"NoPlayerCharacter":private]=>
//     string(8) "Merchant"
//   }
//   ["Personal Assistant"]=>
//   object(NoPlayerCharacter)#2 (1) {
//     ["type":"NoPlayerCharacter":private]=>
//     string(18) "Personal Assistant"
//   }
//   ["Guard"]=>
//   object(NoPlayerCharacter)#3 (1) {
//     ["type":"NoPlayerCharacter":private]=>
//     string(5) "Guard"
//   }
// }

?>