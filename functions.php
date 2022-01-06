<?php


function isAvailable(array $book): string {
	if (!$book['avilable']) {
		$result = ' <b> False </b>';
	}
	else{
		$result = ' <b> True </b>';
	}
	return $result;
}
?>