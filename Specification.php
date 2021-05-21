<?php

interface SpecificationInterface
{
	public function isSatisfiedBy(): bool;
}

class LoginSpecification implements SpecificationInterface
{
	private $compare_a;
	
	private $compare_b;
	
	
	public function __construct($compare_a, $compare_b) 
	{
		$this->compare_a = $compare_a;
		$this->compare_b = $compare_b;
	}
	
	public function isSatisfiedBy(): bool
	{
		return $this->compare_a >= $this->compare_b;
	}
}

class ZanSpecification implements SpecificationInterface
{
	private $num;
	
	public function __construct($num)
	{
		$this->num = $num;
	}
	
	public function isSatisfiedBy(): bool
	{
		return $this->num == 10;
	}
	
}

abstract class AbstractSpecification implements SpecificationInterface
{
	protected $specifications;
	
	public function __construct(SpecificationInterface ...$specifications)
	{
		$this->specifications = $specifications;
	}
}

class AndSpecification extends  AbstractSpecification
{
	
	public function isSatisfiedBy(): bool
	{
		foreach ($this->specifications as $item) {
			if (! $item->isSatisfiedBy()) {
				return false;
			}
		}
		
		return true;
	}
}

class OrSpecification extends AbstractSpecification
{
	
	public function isSatisfiedBy(): bool
	{
		foreach ($this->specifications as $item) {
			if ($item->isSatisfiedBy()) {
				return true;
			}
		}
		
		return false;
	}
}

$obj1 = new LoginSpecification(10, 12);

$obj2 = new ZanSpecification(10);

var_dump((new AndSpecification($obj1, $obj2))->isSatisfiedBy()); 


