<?php 

class Get5FromPoker
{
	/**
     * @var array 数据
     */
	private $poker = [];

	/**
     * @var array 五张随机的扑克
     */
	private $five = [];

	private $num = 5;


	/**
     * 构造函数
     * @access public
     */
	public function __construct() 
	{
		for ($i=0; $i<4; $i++) {
			for ($n=1; $n<14; $n++) {
				array_push($this->poker, $n);
			}
		}
		
		shuffle($this->poker);
	}


	/**
     * 得到随机五张牌
     * @access public
     * @param int $num default 5 发牌个数 
     * @return this 
     */
	public function getFive()
	{
		$five_keys = array_rand($this->poker, $this->num);

		foreach ($five_keys as $key => $val) {
			array_push($this->five, $this->poker[$val]);
		}

		//print_r($this->five);

		return $this;
	}

	/**
     * 判断是否连续
     * @access public
     * @return bool 
     */
	public function isContinuity()
	{
		
		if (count(array_unique($this->five)) < $this->num) {
			return false;
		}

		sort($this->five);

		$last_key = $this->num - 1;

		if (($this->five[0] + $last_key) == $this->five[$last_key]) {
			return true;
		} else {
			return false;
		}

	}


}

$obj = new Get5FromPoker();
var_dump($obj->getFive()->isContinuity());





