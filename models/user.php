<?php
	require('../core/database.php');

	class User extends DB{
		function getAll(){
			$result = $this->select("SELECT * FROM users");
			return $result;
		}

		function findById($id){
			$result = $this->select("SELECT * FROM users WHERE id='$username' LIMIT 1");
			return $result;
		}

		function register($firstName, $lastName, $email, $password){
			// strip slashes from all data
			$firstName = stripslashes($firstName);
			$lastName = stripslashes($lastName);
			$email = stripslashes($email);
			$password = stripslashes($password);
			// hash the password
			$hashed_password = password_hash($password, PASSWORD_BCRYPT);
			// set joined date
			$joinedDate = date();
			// insert the data
			$result = $this->insert("INSERT INTO users (first_name, last_name, email, `password`, `joined`) VALUES ('$firstName', '$lastName', '$email', '$password', '$joinedDate')");
			return $result;
		}

		function login(){

		}

		function update(){

		}

		function delete(){

		}
	}