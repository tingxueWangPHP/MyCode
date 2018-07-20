<?php
/*
 *------------------------
 * 适配器模式
 *------------------------
 */
Interface Adapter
{
	public function set();
	
	public function get();
}

class A_Adapter implements Adapter
{
	private $variable;
	
	public function personal_a()
	{
		$this->variable = 'A_Adapter';
		
		return true;
	}
	
	public function set()
	{
		return $this->personal_a();
	}
	
	public function get()
	{
		if (is_null($this->variable)) {
			$this->personal_a();
		}
		
		return $this->variable;
	}
}

class B_Adapter implements Adapter
{
	private $variable;
	
	public function personal_b()
	{
		$this->variable = 'B_Adapter';
		
		return true;
	}
	
	public function set()
	{
		return $this->personal_b();
	}
	
	public function get()
	{
		if (is_null($this->variable)) {
			$this->personal_b();
		}
		
		return $this->variable;
	}
}

//委托模式
class Work
{
	private $adapter;
	
	public function __construct(Adapter $obj)
	{
		$this->adapter = $obj;
	}
	
	public function set()
	{
		return $this->adapter->set();
	}
	
	public function get()
	{
		return $this->adapter->get();
	}
	
	public function __call($func, $args)
	{
		return call_user_func_array(array($this->adapter, $func),$args);
	}
}





