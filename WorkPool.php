<?php
	class Test {
		public function print() {
			echo "Hello world";
		}
	}
	
	class WorkPool implements Countable {
		private $occupieWorks = [];

		private $freeWorks = [];

		public function get():Test
		{
			if (empty($this->freeWorks)) {
				$obj = new Test();
			} else {
				$obj = array_pop($this->freeWorks);
			}

			$this->occupieWorks[spl_object_hash($obj)] = $obj;

			return $obj;
		}

		public function free(Test $obj) {
			if (isset($this->occupieWorks[spl_object_hash($obj)])) {
				unset($this->occupieWorks[spl_object_hash($obj)]);
				$this->freeWorks[spl_object_hash($obj)] = $obj;
			}


		}

		public function count() {
			//return count($this->occupieWorks) + count($this->freeWorks);
			printf("occupieWorks is %d\n", count($this->occupieWorks));
			printf("freeWorks is %d\n", count($this->freeWorks));
		}
	
	}

	$work = new WorkPool();
	$test = $work->get();
	$test2 = $work->get();
	$work->free($test);
	$work->free($test2);
	$test = $work->get();
	count($work);

		
