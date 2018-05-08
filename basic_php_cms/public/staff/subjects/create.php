<?php

require_once('../../../private/initialize.php');

if (is_post_request()) {
	// Handle from values sent by new.php

	$menu_name = $_POST['menu_name'] ?? '';
	$position = $_POST['position'] ?? '';
	$visible = $_POST['visible'] ?? '';

//	echo "Form parameter<br />";
//	echo "Menu name: " . $menu_name . "<br />";
//	echo "Position: " . $position . "<br />";
//	echo "Visible: " . $visible . "<br />";

	$result = insert_subject($menu_name, $position, $visible);
	// Return the id used in the last query
	$new_id = mysqli_insert_id($db);
	redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));

} else {
	redirect_to(url_for('/staff/subjects/new.php'));
}

?>