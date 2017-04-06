<?php
/***************
 * create.php
 * Creates the database we will be using for this example.
 * 
 * Jaime Ruiz 		  initial	 March 2, 2015
 * Ross Beveridge     updated     March 21, 2017
 */
//require_once "./inc/page_setup.php";

 if (!$dbh = setupIngredientConnection()) { die; }
?>
<?php
/* Here are functions encapsulating patterns utilized above */
function setupIngredientConnection() {
	try {
		$dbh = new PDO ( "sqlite:./ingredient.db" );
		echo '<pre class="bg-success">';
		echo 'Connection successful.';
		echo '</pre>';
		return $dbh;
	} catch ( PDOException $e ) {
		echo '<pre class="bg-danger">';
		echo 'Connection failed (Help!): ' . $e->getMessage ();
		echo '</pre>';
		return FALSE;
	}
}
// function dropTableByName($tname) {
	// global $dbh;
	// $sql = "DROP TABLE IF EXISTS $tname";
	// $status = $dbh->exec ( $sql );
	// if ($status === FALSE) {
		// echo '<pre class="bg-danger">';
		// print_r ( $dbh->errorInfo () );
		// echo '</pre>';
	// } else {
		// echo '<pre class="bg-success">';
		// echo 'Number of rows effected: ' . $status;
		// echo '</pre>';
	// }
// }





function createTableArtist() {
	$sql = "CREATE TABLE artist (
            artist_id INTEGER PRIMARY KEY ASC,
            artist_name varchar(50))";
	createTableGeneric ( $sql );
}

function createTableAlbum() {
	$sql = "CREATE TABLE album (
			   album_id INTEGER PRIMARY KEY ASC, 
			   artist_id int(5), 
			   title varchar(255), 
			   year int(4), 
			   rank int(5),
			   FOREIGN KEY (artist_id) REFERENCES artist(artist_id))";
	createTableGeneric ( $sql );
}

function createTableGeneric($sql) {
	global $dbh;
	$status = $dbh->exec ( $sql );
	if ($status === FALSE) {
		echo '<pre class="bg-danger">';
		print_r ( $dbh->errorInfo () );
		echo '</pre>';
	} else {
		echo '<pre class="bg-success">';
		echo 'Number of rows effected: ' . $status;
		echo '</pre>';
	}
}
function loadMusicIntoEmptyDatabase() {
	global $dbh;
	require "source_file/list.php";
	$albums = getAlbumsFromFile ();
	$artists_ids = array (); // Stores artists and SQL index
	$sql_artist = "INSERT INTO artist (artist_name) VALUES (?)";
	$sql_album = "INSERT INTO album (artist_id, title, year, rank)
									 VALUES (:artist_id, :title, :year, :rank)";
	// This allows caching of statements and optimized queries
	$artist_stm = $dbh->prepare ( $sql_artist );
	$album_stm = $dbh->prepare ( $sql_album );
	foreach ( $albums as $current_album ) {
		// 1. Check to make sure artist hasn't already been added
		if (key_exists ( $current_album ['Band'], $artists_ids )) {
			$artist_id = $artists_ids [$current_album ['Band']];
		} else {
			testedInsertArtistName ( $current_album ['Band'], $artist_stm );
			$artist_id = $dbh->lastInsertId ( 'artist_id' );
			$artists_ids [$current_album ['Band']] = $artist_id;
		}
		testedInsertAlbum ( $current_album, $artist_id, $album_stm );
	}
}
function testedInsertArtistName($name, $stmt) {
	global $dbh;
	if (! $stmt->execute ( array ( $name  ) )) {
		echo '<pre class="bg-danger">';
		print_r ( $dbh->errorInfo () );
		echo '</pre>';
	}
}
function testedInsertAlbum($album, $aid, $stmt) {
	global $dbh;
	if (! $stmt->execute ( array (
			':artist_id' => $aid,
			':title' => $album ['Title'],
			':year' => $album ['Year'],
			':rank' => $album ['Rank'] 
	) )) {
		echo '<pre class="bg-danger">';
		print_r ( $dbh->errorInfo () );
		echo '</pre>';
	}
}
?>

