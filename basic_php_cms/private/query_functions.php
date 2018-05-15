<?php
/**
 * Created by PhpStorm.
 * User: Wenqian
 * Date: 5/7/2018
 * Time: 4:07 PM
 */

 function find_all_subjects() {
 	 global $db;

	 $sql = "SELECT * FROM subjects ";
	 $sql .= "ORDER BY position ASC";
//	 echo $sql; only for trouble shooting
	 $result = mysqli_query($db, $sql);
	 //Error handling for Database Query Failure
	 confirm_result_set($result);
	 return $result;
 }

/**
 * @param $id
 *
 * @return array|null
 */
 function find_subject_by_id($id) {
 	 global $db;

	 $sql = "SELECT * FROM subjects ";
	 $sql .= "WHERE id='" . db_escape($db, $id) . "'";
	 $result = mysqli_query($db, $sql);
	 confirm_result_set($result);

	 $subject = mysqli_fetch_assoc($result);
	 mysqli_free_result($result);

	 return $subject; // return a assoc array
 }

/**
 * @param $subject
 *
 * @return array
 */
 function validate_subject($subject) {

 	 $errors = [];

 	 // menu_name
	 if(is_blank($subject['menu_name'])) {
	 	$errors[] = "Name cannot be blank.";
	 } elseif(!has_length($subject['menu_name'], ['min' => 2, 'max' => 255])) {
	 	$errors[] = "Name must be between 2 and 255 characters.";
	 }

	 // position
	 // Make sure we are working with an integer
	 $position_int = (int) $subject['position'];
	 if($position_int <= 0) {
	 	$errors[] = "Position must be greater than zero.";
	 }
	 if($position_int > 999) {
	 	$errors[] = "Position must be less than 999.";
	 }

	 // visible
	 // Make sure we are working with a string
	 $visible_str = (string) $subject['visible'];
	 if(!has_inclusion_of($visible_str, ["0", "1"])) {
	 	$errors[] = "Visible must be true or false.";
	 }

	 return $errors;
 }

/**
 * @param $subject
 *
 * @return bool
 */
 function insert_subject($subject) {
 	global $db;

	 $errors = validate_subject($subject);
	 if(!empty($errors)) {
		 return $errors;
	 }

	 $sql = "INSERT INTO subjects ";
	 $sql .= "(menu_name, position, visible) ";
	 $sql .= "VALUES (";
	 $sql .= "'" . db_escape($db, $subject['menu_name']) . "',";
	 $sql .= "'" . db_escape($db, $subject['position']) . "',";
	 $sql .= "'" . db_escape($db, $subject['visible']) . "'";
	 $sql .= ")";

	 $result = mysqli_query($db, $sql);
	 // For INSERT statements, $result is true/false

	 if ($result) {
		 return true;
	 }else {
		 // INSERT Failed
		 echo mysqli_error($db);
		 db_disconnect($db);
		 exit;
	 }
 }

/**
 * @param $subject
 *
 * @return bool
 */
 function update_subject($subject) {
 	global $db;

 	 $errors = validate_subject($subject);
 	 if(!empty($errors)) {
 	 	return $errors;
     }

	 $sql = "UPDATE subjects SET ";
	 $sql .= "menu_name='" . db_escape($db, $subject['menu_name']) . "', ";
	 $sql .= "position='" . db_escape($db, $subject['position']) . "', ";
	 $sql .= "visible='" . db_escape($db, $subject['visible']) . "' ";
	 $sql .= "WHERE id='" . db_escape($db, $subject['id']) . "' ";
	 $sql .= "LIMIT 1";

	 $result = mysqli_query($db, $sql);
	 // For UPDATE statements, $result is true/false
	 if ($result) {
		 return true;
	 }else {
		 // UPDATE Failed
		 echo mysqli_error($db);
		 db_disconnect($db);
		 exit;
	 }
 }

/**
 * @param $subject
 *
 * @return bool
 */
 function delete_subject($id) {
 	global $db;

	 $sql = "DELETE FROM subjects ";
	 $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
	 $sql .= "LIMIT 1";

	 $result = mysqli_query($db, $sql);

	 // For DELETE statements, $result is true/false
	 if($result) {
		 return true;
	 }else {
		 // DELETE Failed
		 echo mysqli_error($db);
		 db_disconnect($db);
		 exit;
	 }
 }