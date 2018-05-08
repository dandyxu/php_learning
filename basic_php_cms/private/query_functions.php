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