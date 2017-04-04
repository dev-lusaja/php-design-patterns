<?php 


/**
 * PRODUCT INTERFACE
 */
interface IntenInterface
{
	public function getBlade(): string;
	public function getSize(): int;
	public function getPower(): float;
}

/**
 * PRODUCT
 */
class Sword implements IntenInterface
{
	
	/**
	 * @var string $blade
	 */
	private $blade;


	/**
	 * @var string #size
	 */
	private $size;

	/**
	 * @var float $power
	 */
	private $power;



	/**
	 * @param ItemBuilder $builder
	 */
	public function __construct(ItemBuilder $builder)
	{
		$this->setBlade($builder->blade);
		$this->setSize($builder->size);
		$this->setPower($builder->power);
	}

	
	/**
	 * @return string
	 */
	public function getBlade(): string
	{
		return $this->blade;
	}


	/**
	 * @return string 
	 */
	public function getSize(): int
	{
		return $this->size;
	}


	public function getPower(): float
	{
		return $this->power;
	}


    /**
     * Sets the value of blade.
     *
     * @param string $blade $blade the blade
     *
     * @return self
     */
    private function setBlade(string $blade)
    {
        $this->blade = $blade;

        return $this;
    }

    /**
     * Sets the value of size.
     *
     * @param int #size $size the size
     *
     * @return self
     */
    private function setSize(int $size) 
    {
        $this->size = $size;

        return $this;
    }

    /**
     * Sets the value of power.
     *
     * @param float $power $power the power
     *
     * @return self
     */
    private function setPower(float $power)
    {
        $this->power = $power;

        return $this;
    }
}

/**
 * BUILDER
 */
abstract class ItemBuilder
{
	abstract public function build();
}


/**
 * CONCRETE BUILDER
 */
class SwordConcreteBuilder extends ItemBuilder
{

	public $blade;
	public $size;
	public $power;

	/**
	 * @param  int $size
	 * @return self
	 */
	public function size(int $size)
	{
		$this->size = $size;
		return $this;
	}

	/**
	 * @param string
	 * @return self
	 */
	public function blade(string $blade)
	{
		$this->blade = $blade;
		return $this;
	}


	/**
	 * @param  float $power
	 * @return self
	 */
	public function power(float $power)
	{
		$this->power = $power;
		return $this;
	}

	/**
	 * @return ItemInterface
	 */
	public function build()
	{
		$sword = new Sword($this);
		return $sword;
	}
}


/**
* DIRECTOR
*/
class ItemDirector
{
	
	/**
	 * @var ItemBuilder
	 */
	public $builder;

	/**
	 * @param ItemBuilder $builder
	 */
	public function __construct($builder)
	{
		$this->builder = $builder;
	}
}


$concreteBuilder = new SwordConcreteBuilder();
$itemDirector = (new ItemDirector($concreteBuilder));
$sword = $itemDirector->builder->blade('iron')->size(10)->power(20.5)->build();
var_dump($sword);

?>