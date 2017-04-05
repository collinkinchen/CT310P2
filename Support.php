<?php

require_once "./assets/passwordLib.php";


class User {
	public $id = ''; /* promary key ID */
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
	$users [$i ++] = makeNewUser ( '1', 'cokin', password_hash('cokin'), 'collinkinchen@gmail.com' );
	$users [$i ++] = makeNewUser ( '1', 'lyzhu', password_hash('lyzhu'), 'lyzhu@rams.colostate.edu' );
	$users [$i ++] = makeNewUser ( '2', 'ct310', password_hash('ct310'), 'nspatil@colostate.edu' );
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

function makeNewUser($id, $username, $h, $email) {
	$u = new User ();
	$u->id = $id;
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

function changePassword($username, $new_password){
	// code referenced: http://stackoverflow.com/questions/27767406/how-do-i-replace-1-value-within-a-row-in-a-csv-file-using-php
	$input = fopen('user.csv', 'r');  //open for reading
	$output = fopen('temporary.csv', 'w'); //open for writing
	
	while( false !== ( $data = fgetcsv($input) ) ){  //read each line as an array
	// print_r ($data);
	
	
		if ($data[1] == $username) {
			// echo $data[1] . "<br>";
			// echo $data[2] . "<br>";
			$data[2] = password_hash($new_password);
			// echo $data[2] . "<br>";
		 
		}
	
	
   //modify data here
   // if ($data[4] == $_POST['oldPassword'] && $data[1] == $_SESSION['username']) {
      //Replace line here
      // $data[4] = $_POST['newPassword'];
      // echo("SUCCESS|Password changed!");
   // }

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