<?php
class Ingredient{
	
	public $id;
	public $ingredientTitle;
	public $description;
	public $image;
	public $comment;
	
	
	function __construct($ingredientTitle="",$id=0,$description="",$image=""){
		
		$this->id = $id;
		$this->title = $ingredientTitle;
		$this->description = $description;
		$this->image = $image;
	}
	
	function __toString(){
		return $this->name;
	}
	
}