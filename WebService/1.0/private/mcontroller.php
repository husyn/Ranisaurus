<?php
require_once 'db_handler.php';
//use $conn variable to use for querying database.

/*
 * CODE = 9:	Some parameter is wrong
 * CODE = 1:	Everything is correct
 * CODE = -1:	Error occured
 * 
 * msg:			A human readable error message
 * */

class modelControllerClass {
	private $conn;

	function __construct() {
		$this->conn = $_SESSION['connectionVariable'];
	}

	/**
	 * This function will not take input
	 * */
	function getcategories($param) {		
		$sql_selectCategories = "SELECT id,category FROM jos_wshusyn_category where published = 1 order by category";
		$result = mysql_query($sql_selectCategories,$this->conn);
		if($result)
		{
			$categories = array();
			$categories['code'] = '1';
			$categories['msg'] = 'Success';
			while($row = mysql_fetch_assoc($result))
			{
				$category_array[] = $row; 
			}
			$categories['categories'] = $category_array;
			self::showSimpleObject($categories);
		}
		else
			echo self::showArray('-1', 'Database didn\'t returned anything');
	}
	
	/**
	 * This function will take input categoryid as input
	 * will return first 50 taglines
	 * if 'warak' provided it will show next 50 taglines and so on
	 * */
	function gettagline($param) {
		$categoryid = $param['categoryid'];
		if(!isset($categoryid))
		{
			self::showArray('9', 'categoryid is required');
			die();
		}
		if(!is_numeric($categoryid) || $categoryid <= 0)
		{
			self::showArray('9', 'Invalid categoryid');
			die();
		}
		$sql_getTagline = 'select id,tagline,howTo from jos_wshusyn where published=1 and category = '.mysql_escape_string(trim($categoryid)).' order by tagline';		
		$result = mysql_query($sql_getTagline,$this->conn);
		if($result)
		{
			$categories = array();
			$categories['code'] = '1';
			$categories['msg'] = 'Success';
			$tagline_array = array();			
			while($row = mysql_fetch_assoc($result))
			{
				$tagline_array[] = $row; 
			}
			$categories['taglines'] = $tagline_array;
			self::showSimpleObject($categories);
		}
		else
			echo self::showArray('-1', 'Empty');
		
	}
	
	/**
	 * This function will take categoryid(optional),tagline, and howto(optional) as input
	 * will not return anything
	 * */
	function addtagline($param) {
		$tagline = $param['tagline'];		
		$howto = "";		
		if(isset($param['howto'])){
			$howto = $param['howto'];			
		}
				
		if(!isset($tagline)){
			self::showArray('9', 'tagline is required');
			die();
		}
		//echo $tagline;
		
		$sql_insertTagline = "insert into jos_wshusyn values (null,0,'".mysql_escape_string($tagline)."','". mysql_escape_string($howto)."',0)";
		if(mysql_query($sql_insertTagline,$this->conn))
		{
			echo self::showArray('1', 'Successful');
		}
		else 
		{
			echo self::showArray('-1', 'Unsuccessful');
		}
		
	}
	
	function showSimpleObject($object) {
		if($object) {
	
			header('Content-Type: application/json');
			echo json_encode($object);
		}
		else
		{
			$aray = array("code"=>"9","msg"=>"service error");
		}
	}
	
	function showArray($code,$msg){
		header('Content-Type: application/json');
		$temparray = array('code'=>$code,'msg'=>$msg);
		echo json_encode($temparray);
	}
	
	/**
	* This function will return all the categories and its tagline in single request
	* */	
	function getAllData($param) {

		$sql_selectCategories = "SELECT id,category FROM jos_wshusyn_category where published = 1 order by category";
		$result = mysql_query($sql_selectCategories,$this->conn);
		if($result)
		{
			$responseObject = array();
			$responseObject['code'] = '1';
			$responseObject['msg'] = 'Success';
			while($row = mysql_fetch_assoc($result))
			{
				$data = (object)$row;
				$data->taglines = self::getTaglineDataAsArray($row['id']);
				$category_array[] = $data;
			}
			$responseObject['categories'] = $category_array;
  			self::showSimpleObject($responseObject);
//			self::zipDataAndSend($responseObject);
		}
		else
			echo self::showArray('-1', 'Database didn\'t returned anything');
	}
	
	function getTaglineDataAsArray($categoryId) {
	
		//fetching taglines data of category
		$sql_getTagline = 'select id,tagline,howTo from jos_wshusyn where published=1 and category = '.$categoryId.' order by tagline';		
		$result = mysql_query($sql_getTagline,$this->conn);
		$tagline_array = array();
		if($result)
		{
			$tagline_array = array();
			while($rowTagline = mysql_fetch_assoc($result))
			{
				$tagline_array[] = $rowTagline;
			}	
		}
		return $tagline_array;
	} 
	
	function zipDataAndSend($data) {
	
		if(function_exists('ob_gzhandler')) 
			ob_start('ob_gzhandler');
		else ob_start();

		echo json_encode($data);
		ob_end_flush();
	}
}
?>