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

/**
 *
 */
function error_404() {
	header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
	exit();
}

function error_500() {
	header($_SERVER["SERVER_PROTOCOL"] . " 500 Internal Server Error");
	exit();
}

function redirect_to($location) {
	header("Location: " . $location);
	exit();
}

/**
 * @return bool
 */
function is_post_request() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * @return bool
 */
function is_get_request(){
	return $_SERVER['REQUEST_METHOD'] == 'GET';
}

function display_errors($errors=array()) {
	$output = '';
	if(!empty($errors)) {
		$output .= "<div class=\"errors\">";
		$output .= "Please fix the following errors:";
		$output .= "<ul>";
		foreach ($errors as $error) {
			$output .= "<li>" . h($error) . "</li>";
		}
		$output .= "</ul>";
		$output .= "</div>";
	}

	return $output;
}