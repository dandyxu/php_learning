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
	 $sql .= "WHERE id='" . $id . "'";
	 $result = mysqli_query($db, $sql);
	 confirm_result_set($result);

	 $subject = mysqli_fetch_assoc($result);
	 mysqli_free_result($result);

	 return $subject; // return a assoc array
 }

/**
 * @param $subject
 *
 * @return bool
 */
 function insert_subject($subject) {
 	global $db;

	 $sql = "INSERT INTO subjects ";
	 $sql .= "(menu_name, position, visible) ";
	 $sql .= "VALUES (";
	 $sql .= "'" . $subject['menu_name'] . "',";
	 $sql .= "'" . $subject['position'] . "',";
	 $sql .= "'" . $subject['visible'] . "'";
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

	 $sql = "UPDATE subjects SET ";
	 $sql .= "menu_name='" . $subject['menu_name'] . "', ";
	 $sql .= "position='" . $subject['position'] . "', ";
	 $sql .= "visible='" . $subject['visible'] . "' ";
	 $sql .= "WHERE id='" . $subject['id'] . "' ";
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