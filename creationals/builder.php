<?php 


interface IntenInterface
{
	public function getName(): string;
	public function getSize(): int;
	public function getPower(): float; 
}

class Sword implements IntenInterface
{
	
	/**
	 * @var string $name
	 */
	private $name;


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
		$this->setName($builder->name);
		$this->setSize($builder->size);
		$this->setPower($builder->power);
	}

	
	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
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
     * Sets the value of name.
     *
     * @param string $name $name the name
     *
     * @return self
     */
    private function setName(string $name)
    {
        $this->name = $name;

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


abstract class ItemBuilder
{
	abstract public function build();
}
 

class SwordBuilder extends ItemBuilder
{

	public $name;
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
	public function name(string $name)
	{
		$this->name = $name;
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

$sword = (new SwordBuilder())->name('Lusaja')->size(10)->power(20.5)->build();
var_dump($sword);

?>