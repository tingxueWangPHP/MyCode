<?php
	class node {
		public $num;
		public $next;

		public static function init(int $n):self
		{
			$head = new self();
			$head->num = 1;
			$head->next = null;

			$temp = $head;
			for($i=2;$i<=$n;$i++) {
				$o = new self();
				$o->num = $i;
				$o->next = null;
				
				$temp->next = $o;
				$temp = $temp->next;
			}
			$temp->next = $head;

			return $head;	
		}

		public static function findAndKill(self $obj, int $k, int $m) :void
		{
			$m_obj = null;
			$tail = self::getTail($obj);
			while (true) {
				if ($tail->next->num == $k) {
					$m_obj = $tail->next;
					break;	
				}
				$tail = $tail->next;
			}
			while($tail->next->num != $tail->num) {
				for ($i=2;$i<=$m;$i++) {
					$m_obj = $m_obj->next;
					$tail = $tail->next;
				}

				echo "num is " . $m_obj->num . "\n";
				$tail->next = $m_obj->next;
				$m_obj = $m_obj->next;
			}

			echo "winner is " . $tail->num . "\n";

		}

		public static function getTail(self $obj) :self
		{
			$temp = $obj;
			while($temp->next->num != $obj->num) {
				$temp = $temp->next;
			}

			return $temp;
		}
	}

	
	
	node::findAndKill(node::init(5), 3, 2);


	
