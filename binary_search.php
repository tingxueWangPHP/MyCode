<?php
	function binary_search_recursion(&$arr, $number, $lower, $high) {
		echo "55\n";
		if ($lower > $high) {
			return -1;
		}

		$middle = intval(($lower+$high)/2);

		if ($arr[$middle] == $number) {
			return $middle;
		} else if ($arr[$middle] > $number) {
			return binary_search_recursion($arr, $number, $lower, $middle-1);

		} else {
			return binary_search_recursion($arr, $number, $middle+1, $high);
		}
	}

	$arr = [1, 2, 3, 4, 5, 6];

	echo binary_search_recursion($arr, 6, 0, count($arr) - 1);
