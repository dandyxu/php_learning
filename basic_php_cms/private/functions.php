<?php

/**
 * Function to add the leading '/'(forward slash) if not existed
 * @param $script_path
 *
 * @return string
 */

function url_for($script_path) {
//	add the leading '/' if not present
	if ($script_path[0] != '/') {
		$script_path = "/" . $script_path;
	}
	return WWW_ROOT . $script_path;
}


/**
 * @param string $string
 *
 * @return string
 */
function u($string="") {
	return urlencode($string);
}

/**
 * @param string $string
 *
 * @return string
 */
function raw_u($string="") {
	return urlencode($string);
}

/**
 * @param string $string
 *
 * @return string
 */
function h($string="") {
	return htmlspecialchars($string);
}