<?php
require_once("Ingredient.php");

class ingredientComment{
	public $commentTitle;
	public $commentDescription;
	public $ingredientID;
	public $id;
	
	public static function makeComment($row){
		$comment = new ingredientComment();
		$comment->title = $row['commentTitle'];
		$comment->description = $row['commentDescription'];
		$comment->id = $row['comment_id'];
		$comment->ingredientID = $row['ingredientID'];
	
		return $comment;
	}
	
	function __toString(){
		// return $this->title . '(' . $this->year . ')';
	}
}