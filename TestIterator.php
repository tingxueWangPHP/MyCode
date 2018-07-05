<?php

/**
 *step:
 *1、rewind()
 *2、valid()
 *3、current()
 *4、key()
 *5、next()
 * 迭代器
 */
class TestIterator implements Iterator
{
	private $arr = [1,2];
	
	public function rewind() 
	{
		reset($this->arr);
	}
	
	public function valid() 
	{
		return isset($this->arr[$this->key()]);
	}
	
	public function next() 
	{
		next($this->arr);
	}
	
	public function current() 
	{
		return current($this->arr);
	}
	
	public function key() 
	{
		return key($this->arr);
	}
	
}

$obj = new TestIterator();

var_dump($obj instanceof Iterator);

foreach($obj as $key=>$val) {
	echo $key . '----' . $val;
	echo '<br/>';
}

