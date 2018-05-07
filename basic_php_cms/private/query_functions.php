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
	 $result = mysqli_query($db, $sql);
	 return $result;
 }