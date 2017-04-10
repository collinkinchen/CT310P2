<?php

require_once "./assets/passwordLib.php";


class User {
	public $group = ''; /* promary key ID */
	public $username = ''; /* Username */
	public $password = ''; /* hashed password */
	public $email = ''; /* email */
}

function readUsers() {
	if (! file_exists ( 'user.csv' )) {
		setupDefaultUsers ();
	}
	$users = array ();
	$fh = fopen ( 'user.csv', 'r' ) or die ( "Can't open file" );
	$keys = fgetcsv ( $fh );
	while ( ($vals = fgetcsv ( $fh )) != FALSE ) {
		if (count ( $vals ) > 1) {
			$u = new User ();
			for($k = 0; $k < count ( $vals ); $k ++) {
				$u->$keys [$k] = $vals [$k];
			}
			$users [] = $u;
		}
	}
	fclose ( $fh );
	return $users;
}

function setupDefaultUsers() {
	$users = array ();
	$i = 0;
	$users [$i ++] = makeNewUser ( 'Administrator', 'cokin', password_hash('cokin'), 'collinkinchen@gmail.com' );
	$users [$i ++] = makeNewUser ( 'Administrator', 'lyzhu', password_hash('lyzhu'), 'lyzhu@rams.colostate.edu' );
	$users [$i ++] = makeNewUser ( 'Administrator', 'ct310', password_hash('ct310'), 'nspatil@colostate.edu' );
	$users [$i ++] = makeNewUser ( 'Customer', 'ct310', password_hash('ct310'), 'nspatil@colostate.edu' );
	writeUsers ( $users );
}

function writeUsers($users) {
	$fh = fopen ( 'user.csv', 'w+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $users [0] ) ) );
	for($i = 0; $i < count ( $users ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $users [$i] ) );
	}
	fclose ( $fh );
}

function makeNewUser($group, $username, $h, $email) {
	$u = new User ();
	$u->group = $group;
	$u->username = $username;
	$u->password = $h;
	$u->email = $email;
	return $u;
}

function userHashByName($users, $username) {
	$res = '';
	foreach ( $users as $u ) {
		if ($u->username == $username) {
			$res = $u->password;
		}
	}
	return $res;
}

function getGroup($users, $username){
        $res = "";
	foreach ( $users as $u ) {
		if ($u->username == $username){
			if ($u->group == 'Administrator') {
				$res = 'Administrator';
			}
			if ($u->group == 'Customer') {
				$res = 'Customer';
			}
		}
	}
	return $res;
}

function changePassword($username, $new_password){
	// code referenced: http://stackoverflow.com/questions/27767406/how-do-i-replace-1-value-within-a-row-in-a-csv-file-using-php
	$input = fopen('user.csv', 'r');  //open for reading
	$output = fopen('temporary.csv', 'w'); //open for writing
	
	while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array

		if ($data[1] == $username) {
			$data[2] = password_hash($new_password);
		}

   //write modified data to new file
    fputcsv( $output, $data);
}

	//close both files
	fclose( $input );
	 fclose( $output );

	//clean up
	 unlink('user.csv');// Delete obsolete BD
	 rename('temporary.csv', 'user.csv'); //Rename temporary to new
	
	// foreach ( $users as $u ) {
		// if ($u->username == $username) {
			// $u->password = password_hash($new_password);
		// }
	// }
}


class Ingredient {
	public $ingredientName = '';   
	public $pictureSource = '';
	public $text = '';
	public $textSource = '';
	public $pictureName = '';
	public $price = 0;
}

function getIngres() {
	if (! file_exists ( 'ingredients.csv' )) {
		setupDefaultIngredients ();
	}
	$ingres = array ();
	$fh = fopen ( 'ingredients.csv', 'r' ) or die ( "Can't open file" );
	$keys = fgetcsv ( $fh );
	while ( ($vals = fgetcsv ( $fh )) != FALSE ) {
		if (count ( $vals ) > 1) {
			$u = new Ingredient ();
			for($k = 0; $k < count ( $vals ); $k ++) {
				$u->$keys [$k] = $vals [$k];
			}
			$ingres [] = $u;
		}
	}
	fclose ( $fh );
	return $ingres;
}

function setupDefaultIngredients() {
	$ingres = array ();
	$i = 0;
	$ingres [$i ++] = makeNewIngredient ( 'vanilla', 'Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Vanilla_chamissonis_habitat.JPG">Vanilla chamissonis habitat</a>', 'Vanilla is a flavoring derived from orchids of the genus Vanilla, primarily from the Mexican species, flat-leaved vanilla (V. planifolia). The word vanilla, derived from the diminutive of the Spanish word vaina (vaina itself meaning sheath or pod), is translated simply as "little pod". Pre-Columbian Mesoamerican people cultivated the vine of the vanilla orchid, called tlilxochitl by the Aztecs. Spanish conquistador Hernán Cortés is credited with introducing both vanilla and chocolate to Europe in the 1520s.', '<a href="https://en.wikipedia.org/wiki/Vanilla">Vanilla</a>. Wikipedia. Retrieved March 05, 2017. <br/>','./assets/img/vanilla.jpg' ,8 );
	$ingres [$i ++] = makeNewIngredient ( 'kale', 'Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Starr_081031-0376_Brassica_oleracea.jpg">Starr 081031-0376 Brassica oleracea</a>','Kale (English IPA /keɪl/) or leaf cabbage refers to certain vegetable cultivars of the plant species Brassica oleracea. A kale plant has green or purple leaves and the central leaves do not form a head (as with headed cabbages). Kales are considered to be closer to wild cabbage than most domesticated forms of Brassica oleracea.', '<a href="https://en.wikipedia.org/wiki/Kale">Kale</a>. Wikipedia. Retrieved March 05, 2017. <br/>','./assets/img/kale.jpg',5 );
	$ingres [$i ++] = makeNewIngredient ( 'pumpkin','Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Pumpkins_1.JPG">Pumpkins 1</a>', 'A pumpkin is a cultivar of a squash plant, most commonly of Cucurbita pepo, that is round, with smooth, slightly ribbed skin, and deep yellow to orange coloration. The thick shell contains the seeds and pulp. Some exceptionally large cultivars of squash with similar appearance have also been derived from Cucurbita maxima. Specific cultivars of winter squash derived from other species, including C. argyrosperma, and C. moschata, are also sometimes called "pumpkin". In New Zealand and Australian English, the term pumpkin generally refers to the broader category called winter squash elsewhere.', '<a href="https://en.wikipedia.org/wiki/Pumpkin">Pumpkin</a>. Wikipedia. Retrieved March 05, 2017. <br/>','./assets/img/pumpkin.jpg',9);
	$ingres [$i ++] = makeNewIngredient ( 'tomato','Wikimedia, <a href="https://commons.wikimedia.org/wiki/File:Tomate_2008-2-20.JPG">Tomate 2008-2-20</a>', 'The tomato is the edible fruit of Solanum lycopersicum, commonly known as a tomato plant, which belongs to the nightshade family, Solanaceae.<br/>The species originated in Central and South America. The Nahuatl (Aztec language) word tomatl gave rise to the Spanish word "tomate", from which the English word tomato originates.<br/> Numerous varieties of tomato are widely grown in temperate climates across the world, with greenhouses allowing its production throughout the year and in cooler areas. The plants typically grow to 1–3 meters (3–10 ft) in height and have a weak stem that often sprawls over the ground and vines over other plants. It is a perennial in its native habitat, and grown as an annual in temperate climates. An average common tomato weighs approximately 100 grams (4 oz). ', '<a href="https://en.wikipedia.org/wiki/Tomato">Tomato</a>. Wikipedia. Retrieved March 05, 2017. <br/>','./assets/img/tomato.jpg',7 );
	writeIngredients ( $ingres );
}

function makeNewIngredient($ingreName, $picSource, $descrip, $descripSource, $picName, $p){
        $u = new Ingredient ();
	$u->ingredientName = $ingreName;
	$u->pictureSource = $picSource;
	$u->text = $descrip;
	$u->textSource = $descripSource;
	$u->pictureName = $picName;
	$u->price = $p;
	$ingres[0] = $u;
	addToIngredients($ingres);
}

function addToIngredients($ingres){
        $fh = fopen ( 'ingredients.csv', 'r+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $ingres [0] ) ) );
	for($i = 0; $i < count ( $ingres ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $ingres [$i] ) );
	}
	fclose ( $fh );
}

function writeIngredients($ingres){
        $fh = fopen ( 'ingredients.csv', 'w+' ) or die ( "Can't open file" );
	fputcsv ( $fh, array_keys ( get_object_vars ( $ingres [0] ) ) );
	for($i = 0; $i < count ( $ingres ); $i ++) {
		fputcsv ( $fh, get_object_vars ( $ingres [$i] ) );
	}
	fclose ( $fh );
}

function getName($ingre){
    $res = '';
	$res = $ingre->ingredientName;
	return $res;
}

function displayPicSource($ingres, $ingName){
    $res = '';
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = $u->pictureSource;
		}
	}
	return $res;
}

function displayIngredientDescription($ingres, $ingName){
    $res = '';
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = $u->text;
		}
	}
	return $res;
}

function displayIngredientDescriptionSource($ingres, $ingName){
    $res = '';
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = $u->textSource;
		}
	}
	return $res;
}

function getPicName($ingres,$ingName){
    $res = '';
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = $u->pictureName;
		}
	}
	return $res;
}

function getPrice($ingres, $ingName){
    $res = '';
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = $u->price;
		}
	}
	return $res;
}

function ingredientExist($ingres, $ingName){
	$res = FALSE;
	foreach ( $ingres as $u ) {
		if ($u->ingredientName == $ingName) {
			$res = TRUE;
		}
	}
	return $res;
}
